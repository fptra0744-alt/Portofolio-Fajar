<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Project | Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Outfit:wght@700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Inter', sans-serif;
            background: #fafafa;
            color: #1a1a1a;
            padding: 40px 20px;
            line-height: 1.6;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 48px;
            border-radius: 24px;
            box-shadow: 0 4px 30px rgba(0,0,0,0.06);
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 32px;
            flex-wrap: wrap;
            gap: 16px;
        }
        h1 {
            font-family: 'Outfit', sans-serif;
            font-size: 32px;
            font-weight: 800;
            color: #1e3a8a;
        }
        .back-link {
            color: #6b7280;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            border-radius: 50px;
            transition: all 0.3s;
        }
        .back-link:hover { color: #2563eb; background: rgba(37, 99, 235, 0.08); }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
            padding: 16px 20px;
            border-radius: 12px;
            margin-bottom: 24px;
            border-left: 4px solid #ef4444;
        }
        .alert-error ul { padding-left: 20px; }
        .alert-error li { margin-bottom: 4px; font-size: 14px; }

        .form-group { margin-bottom: 20px; }
        label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
            color: #374151;
            font-size: 14px;
        }
        label .required { color: #ef4444; }
        input[type="text"],
        input[type="date"],
        select,
        textarea {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            font-family: inherit;
            font-size: 14px;
            color: #1a1a1a;
            transition: all 0.3s;
            background: #fafafa;
        }
        input[type="text"]:focus,
        input[type="date"]:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #2563eb;
            background: white;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.08);
        }
        textarea { resize: vertical; min-height: 100px; }
        select { cursor: pointer; }

        input[type="file"] {
            width: 100%;
            padding: 12px 16px;
            border: 2px dashed #cbd5e1;
            border-radius: 10px;
            font-family: inherit;
            font-size: 14px;
            background: #f8fafc;
            cursor: pointer;
            transition: all 0.3s;
            color: #4b5563;
        }
        input[type="file"]:hover {
            border-color: #2563eb;
            background: #eff6ff;
            color: #2563eb;
        }
        input[type="file"]::file-selector-button {
            padding: 8px 16px;
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            margin-right: 12px;
            font-family: inherit;
            font-size: 13px;
        }
        input[type="file"]::file-selector-button:hover { background: #1d4ed8; }

        .help { font-size: 12px; color: #9ca3af; margin-top: 6px; }
        .error-msg { color: #ef4444; font-size: 13px; margin-top: 6px; }
        .row { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }

        /* ===== CURRENT FILE PREVIEW ===== */
        .current-file {
            margin-bottom: 12px;
            padding: 12px;
            background: #f9fafb;
            border-radius: 10px;
            border: 1px solid #f3f4f6;
        }
        .current-file small {
            display: block;
            color: #6b7280;
            font-size: 12px;
            margin-bottom: 8px;
            font-weight: 600;
        }
        .current-file > img {
            max-width: 200px;
            border-radius: 10px;
            display: block;
        }

        /* ===== SCREENSHOTS GRID (LAMA) ===== */
        .screenshots-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
            gap: 12px;
        }
        .screenshot-checkbox {
            position: relative;
            border-radius: 10px;
            overflow: hidden;
            background: white;
            border: 2px solid #e5e7eb;
            cursor: pointer;
            transition: all 0.3s;
        }
        .screenshot-checkbox:hover {
            border-color: #2563eb;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.15);
        }
        .screenshot-checkbox img {
            width: 100%;
            height: 100px;
            object-fit: cover;
            display: block;
        }
        .screenshot-checkbox .checkbox-overlay {
            position: absolute;
            top: 6px;
            right: 6px;
            background: white;
            border-radius: 6px;
            padding: 4px 8px;
            display: flex;
            align-items: center;
            gap: 4px;
            font-size: 11px;
            font-weight: 600;
            color: #6b7280;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .screenshot-checkbox input[type="checkbox"] {
            cursor: pointer;
            width: 16px;
            height: 16px;
            accent-color: #ef4444;
        }
        .screenshot-checkbox input[type="checkbox"]:checked ~ img {
            opacity: 0.4;
            filter: grayscale(100%);
        }
        .screenshot-checkbox input[type="checkbox"]:checked + .checkbox-overlay {
            background: #fee2e2;
            color: #991b1b;
        }

        /* ===== NEW UPLOAD PREVIEW ===== */
        .thumbnail-preview {
            max-width: 200px;
            margin-top: 12px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            display: none;
        }
        .screenshots-preview {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
            gap: 12px;
            margin-top: 12px;
        }
        .screenshots-preview img {
            width: 100%;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
            border: 2px dashed #93c5fd;
        }

        /* ===== ACTIONS ===== */
        .actions {
            display: flex;
            gap: 12px;
            margin-top: 32px;
            flex-wrap: wrap;
        }
        .btn {
            padding: 14px 32px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 15px;
            border: none;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s;
            font-family: inherit;
        }
        .btn-primary { background: #2563eb; color: white; }
        .btn-primary:hover {
            background: #1d4ed8;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(37, 99, 235, 0.3);
        }
        .btn-secondary { background: #f3f4f6; color: #4b5563; }
        .btn-secondary:hover { background: #e5e7eb; }

        @media (max-width: 640px) {
            .container { padding: 24px; }
            .row { grid-template-columns: 1fr; }
            h1 { font-size: 24px; }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>✏️ Edit Project</h1>
            <a href="{{ route('admin.projects.index') }}" class="back-link">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>

        @if($errors->any())
            <div class="alert-error">
                <strong>⚠️ Ada kesalahan:</strong>
                <ul style="margin-top: 8px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- JUDUL --}}
            <div class="form-group">
                <label>Judul Project <span class="required">*</span></label>
                <input type="text" name="title" value="{{ old('title', $project->title) }}" required>
                @error('title') <div class="error-msg">{{ $message }}</div> @enderror
            </div>

            {{-- SUBTITLE --}}
            <div class="form-group">
                <label>Subtitle <span class="required">*</span></label>
                <input type="text" name="subtitle" value="{{ old('subtitle', $project->subtitle) }}" required>
                @error('subtitle') <div class="error-msg">{{ $message }}</div> @enderror
            </div>

            {{-- THUMBNAIL --}}
            <div class="form-group">
                <label>Thumbnail</label>
                @if($project->thumbnail)
                    <div class="current-file">
                        <small>📷 Thumbnail saat ini:</small>
                        <img src="{{ Storage::url($project->thumbnail) }}" alt="Thumbnail">
                    </div>
                @endif
                <input type="file" name="thumbnail" accept="image/*" id="thumbnailInput">
                <div class="help">Kosongkan kalau gak mau ganti thumbnail. Max 2MB.</div>
                <img id="thumbnailPreview" class="thumbnail-preview" alt="Preview">
                @error('thumbnail') <div class="error-msg">{{ $message }}</div> @enderror
            </div>

            {{-- TANGGAL & STATUS --}}
            <div class="row">
                <div class="form-group">
                    <label>Tanggal Project</label>
                    <input type="date" name="project_date" value="{{ old('project_date', $project->project_date?->format('Y-m-d')) }}">
                </div>
                <div class="form-group">
                    <label>Status <span class="required">*</span></label>
                    <select name="status" required>
                        <option value="Draft" {{ old('status', $project->status) == 'Draft' ? 'selected' : '' }}>📝 Draft</option>
                        <option value="Publish" {{ old('status', $project->status) == 'Publish' ? 'selected' : '' }}>✅ Publish</option>
                    </select>
                    @error('status') <div class="error-msg">{{ $message }}</div> @enderror
                </div>
            </div>

            {{-- DESKRIPSI --}}
            <div class="form-group">
                <label>Deskripsi <span class="required">*</span></label>
                <textarea name="description" required>{{ old('description', $project->description) }}</textarea>
                @error('description') <div class="error-msg">{{ $message }}</div> @enderror
            </div>

            {{-- FITUR --}}
            <div class="form-group">
                <label>Fitur Utama</label>
                <textarea name="features" rows="5">{{ old('features', is_array($project->features) ? implode("\n", $project->features) : '') }}</textarea>
                <div class="help">💡 Satu fitur per baris.</div>
            </div>

            {{-- TECH STACK --}}
            <div class="form-group">
                <label>Tech Stack</label>
                <textarea name="tech_stack" rows="5">@if(is_array($project->tech_stack))@foreach($project->tech_stack as $k => $v){{ $k }}: {{ $v }}@if(!$loop->last)
@endif
@endforeach
@endif</textarea>
                <div class="help">💡 Format: <code>Key: Value</code> (satu per baris).</div>
            </div>

            {{-- DOKUMENTASI --}}
            <div class="form-group">
                <label>Dokumentasi (Gambar)</label>

                @if($project->screenshots && count($project->screenshots) > 0)
                    <div class="current-file">
                        <small>📸 Dokumentasi saat ini ({{ count($project->screenshots) }} gambar) — centang untuk hapus:</small>
                        <div class="screenshots-grid">
                            @foreach($project->screenshots as $index => $ss)
                                <label class="screenshot-checkbox">
                                    <input type="checkbox" name="deleted_screenshots[]" value="{{ $index }}">
                                    <span class="checkbox-overlay">
                                        <i class="fas fa-trash"></i> Hapus
                                    </span>
                                    <img src="{{ Storage::url($ss) }}" alt="Dokumentasi {{ $index + 1 }}">
                                </label>
                            @endforeach
                        </div>
                    </div>
                @endif

                <input type="file" name="screenshots[]" accept="image/*" multiple id="screenshotsInput">
                <div class="help">
                    📸 Pilih <b>beberapa gambar sekaligus</b> (tahan <b>Ctrl</b> atau <b>Shift</b> saat klik).<br>
                    ✅ Gambar baru akan <b>ditambah</b>, gambar lama <b>tetap aman</b>.<br>
                    🗑️ Mau hapus gambar lama? Centang yang mau dihapus di atas. Max 2MB per gambar.
                </div>
                <div id="screenshotsPreview" class="screenshots-preview"></div>
                @error('screenshots') <div class="error-msg">{{ $message }}</div> @enderror
                @error('screenshots.*') <div class="error-msg">{{ $message }}</div> @enderror
            </div>

            {{-- GITHUB --}}
            <div class="form-group">
                <label>GitHub URL</label>
                <input type="text" name="github_url" value="{{ old('github_url', $project->github_url) }}" placeholder="https://github.com/username/repo">
            </div>

            {{-- ACTIONS --}}
            <div class="actions">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Update Project
                </button>
                <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>

    <script>
        // Preview thumbnail
        document.getElementById('thumbnailInput').addEventListener('change', function(e) {
            const file = e.target.files[0];
            const preview = document.getElementById('thumbnailPreview');
            if (file) {
                preview.src = URL.createObjectURL(file);
                preview.style.display = 'block';
            } else {
                preview.style.display = 'none';
            }
        });

        // Preview screenshots baru
        document.getElementById('screenshotsInput').addEventListener('change', function(e) {
            const preview = document.getElementById('screenshotsPreview');
            preview.innerHTML = '';
            const files = Array.from(e.target.files);
            if (files.length > 0) {
                files.forEach(file => {
                    const img = document.createElement('img');
                    img.src = URL.createObjectURL(file);
                    img.alt = file.name;
                    preview.appendChild(img);
                });
            }
        });
    </script>
</body>
</html>