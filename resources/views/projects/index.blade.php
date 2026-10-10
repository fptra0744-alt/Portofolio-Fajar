<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Projects | Admin</title>
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
        .container { max-width: 1000px; margin: 0 auto; }
        .topbar {
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
            letter-spacing: -0.5px;
        }
        .topbar-right { display: flex; gap: 12px; align-items: center; }
        .btn {
            padding: 12px 24px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border: none;
            cursor: pointer;
            transition: all 0.3s;
            font-family: inherit;
        }
        .btn-primary { background: #2563eb; color: white; }
        .btn-primary:hover { background: #1d4ed8; transform: translateY(-2px); }
        .btn-logout { background: #f3f4f6; color: #4b5563; }
        .btn-logout:hover { background: #e5e7eb; }
        .btn-view { background: rgba(37, 99, 235, 0.1); color: #2563eb; padding: 10px 16px; font-size: 13px; }
        .btn-view:hover { background: rgba(37, 99, 235, 0.2); }
        .btn-edit { background: rgba(251, 191, 36, 0.15); color: #d97706; padding: 10px 16px; font-size: 13px; }
        .btn-edit:hover { background: rgba(251, 191, 36, 0.3); }
        .btn-delete { background: rgba(239, 68, 68, 0.1); color: #dc2626; padding: 10px 16px; font-size: 13px; }
        .btn-delete:hover { background: rgba(239, 68, 68, 0.2); }
        .alert-success {
            background: #d1fae5;
            color: #065f46;
            padding: 16px 20px;
            border-radius: 12px;
            margin-bottom: 24px;
            border-left: 4px solid #10b981;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .card {
            background: white;
            border-radius: 16px;
            padding: 24px;
            margin-bottom: 16px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.04);
            display: flex;
            gap: 20px;
            align-items: center;
            transition: all 0.3s;
        }
        .card:hover { transform: translateY(-2px); box-shadow: 0 10px 30px rgba(0,0,0,0.08); }
        .card img {
            width: 120px;
            height: 80px;
            object-fit: cover;
            border-radius: 12px;
            flex-shrink: 0;
            background: #f3f4f6;
        }
        .card-content { flex: 1; min-width: 0; }
        .card h3 { margin-bottom: 4px; color: #1e3a8a; font-size: 18px; }
        .card p {
            color: #6b7280;
            font-size: 14px;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
        }
        .badge {
            display: inline-block;
            padding: 2px 10px;
            border-radius: 50px;
            font-size: 11px;
            font-weight: 600;
            margin-bottom: 6px;
        }
        .badge-publish { background: #d1fae5; color: #065f46; }
        .badge-draft { background: #fef3c7; color: #92400e; }
        .actions { display: flex; gap: 8px; flex-shrink: 0; }
        .actions form { display: inline; }
        .empty {
            background: white;
            border-radius: 16px;
            padding: 60px 40px;
            text-align: center;
            box-shadow: 0 4px 20px rgba(0,0,0,0.04);
        }
        .empty i { font-size: 48px; color: #d1d5db; margin-bottom: 16px; }
        .empty p { color: #6b7280; margin-bottom: 20px; }
        @media (max-width: 640px) {
            .card { flex-direction: column; align-items: stretch; }
            .card img { width: 100%; height: 150px; }
            .actions { justify-content: flex-end; }
            h1 { font-size: 24px; }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="topbar">
            <h1>📁 Manage Projects</h1>
            <div class="topbar-right">
                <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah
                </a>
                <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                    @csrf
                    <button type="submit" class="btn btn-logout">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </div>

        @if(session('success'))
            <div class="alert-success">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        @forelse($projects as $project)
            <div class="card">
                @if($project->thumbnail)
                    <img src="{{ Storage::url($project->thumbnail) }}" alt="{{ $project->title }}">
                @endif
                <div class="card-content">
                    <span class="badge {{ $project->status == 'Publish' ? 'badge-publish' : 'badge-draft' }}">
                        {{ $project->status }}
                    </span>
                    <h3>{{ $project->title }}</h3>
                    <p>{{ $project->subtitle }}</p>
                </div>
                <div class="actions">
                    <a href="{{ route('projects.show', $project) }}" class="btn btn-view" title="Lihat" target="_blank">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-edit" title="Edit">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST"
                          onsubmit="return confirm('Yakin hapus project {{ $project->title }}?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-delete" title="Hapus">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="empty">
                <i class="fas fa-folder-open"></i>
                <p>Belum ada project.</p>
                <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Project Pertama
                </a>
            </div>
        @endforelse
    </div>
</body>
</html>