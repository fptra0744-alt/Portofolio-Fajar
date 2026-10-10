<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'         => 'required|string|max:150',
            'subtitle'      => 'required|string|max:255',
            'thumbnail'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'screenshots'   => 'nullable|array',
            'screenshots.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
            'project_date'  => 'nullable|date',
            'status'        => 'required|in:Draft,Publish',
            'description'   => 'required|string',
            'features'      => 'nullable|string',
            'tech_stack'    => 'nullable|string',
            'github_url'    => 'nullable|string|max:255',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['features'] = $this->toArray($validated['features'] ?? '');
        $validated['tech_stack'] = $this->parseTechStack($validated['tech_stack'] ?? '');

        // Handle thumbnail
        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('projects', 'public');
        }

        // Handle screenshots (dokumentasi)
        $screenshots = [];
        if ($request->hasFile('screenshots')) {
            foreach ($request->file('screenshots') as $file) {
                $screenshots[] = $file->store('projects', 'public');
            }
        }
        $validated['screenshots'] = $screenshots;

        Project::create($validated);

        return redirect()->route('admin.projects.index')
                         ->with('success', 'Project berhasil ditambahkan!');
    }

    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title'         => 'required|string|max:150',
            'subtitle'      => 'required|string|max:255',
            'thumbnail'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'screenshots'   => 'nullable|array',
            'screenshots.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
            'project_date'  => 'nullable|date',
            'status'        => 'required|in:Draft,Publish',
            'description'   => 'required|string',
            'features'      => 'nullable|string',
            'tech_stack'    => 'nullable|string',
            'github_url'    => 'nullable|string|max:255',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['features'] = $this->toArray($validated['features'] ?? '');
        $validated['tech_stack'] = $this->parseTechStack($validated['tech_stack'] ?? '');

        // ===== THUMBNAIL =====
        // Kalau upload thumbnail baru → ganti yang lama (hapus file lama)
        if ($request->hasFile('thumbnail')) {
            if ($project->thumbnail && Storage::disk('public')->exists($project->thumbnail)) {
                Storage::disk('public')->delete($project->thumbnail);
            }
            $validated['thumbnail'] = $request->file('thumbnail')->store('projects', 'public');
        } else {
            // Gak upload → biarin thumbnail lama
            unset($validated['thumbnail']);
        }

        // ===== SCREENSHOTS (DOKUMENTASI) =====
        // Ambil screenshots lama (yang ada di database)
        $existingScreenshots = $project->screenshots ?? [];
        if (!is_array($existingScreenshots)) {
            $existingScreenshots = [];
        }

        // Handle hapus gambar lama (yang dicentang "hapus" di form)
        $deletedIndexes = $request->input('deleted_screenshots', []);
        if (!empty($deletedIndexes)) {
            foreach ($deletedIndexes as $index) {
                if (isset($existingScreenshots[$index])) {
                    $oldFile = $existingScreenshots[$index];
                    if (Storage::disk('public')->exists($oldFile)) {
                        Storage::disk('public')->delete($oldFile);
                    }
                    unset($existingScreenshots[$index]);
                }
            }
            // Reindex array biar rapi
            $existingScreenshots = array_values($existingScreenshots);
        }

        // Handle upload gambar BARU
        $newScreenshots = [];
        if ($request->hasFile('screenshots')) {
            foreach ($request->file('screenshots') as $file) {
                if ($file->isValid()) {
                    $newScreenshots[] = $file->store('projects', 'public');
                }
            }
        }

        // GABUNGIN gambar lama + baru (JANGAN hapus yang lama!)
        $validated['screenshots'] = array_merge($existingScreenshots, $newScreenshots);

        $project->update($validated);

        return redirect()->route('admin.projects.index')
                         ->with('success', 'Project berhasil diupdate!');
    }

    public function destroy(Project $project)
    {
        if ($project->thumbnail && Storage::disk('public')->exists($project->thumbnail)) {
            Storage::disk('public')->delete($project->thumbnail);
        }

        if ($project->screenshots && is_array($project->screenshots)) {
            foreach ($project->screenshots as $file) {
                if (Storage::disk('public')->exists($file)) {
                    Storage::disk('public')->delete($file);
                }
            }
        }

        $project->delete();

        return redirect()->route('admin.projects.index')
                         ->with('success', 'Project berhasil dihapus!');
    }

    private function toArray($text)
    {
        if (empty(trim($text))) return [];
        return array_values(array_filter(array_map('trim', explode("\n", $text))));
    }

    private function parseTechStack($text)
    {
        if (empty(trim($text))) return [];
        $result = [];
        foreach (explode("\n", $text) as $line) {
            $line = trim($line);
            if (empty($line)) continue;
            if (str_contains($line, ':')) {
                [$key, $value] = explode(':', $line, 2);
                $result[trim($key)] = trim($value);
            } else {
                $result[$line] = $line;
            }
        }
        return $result;
    }
}   