<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Project | Admin</title>
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
            border: 2px solid #e5e7eb;
        }

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
            <h1>➕ Tambah Project</h1>
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

        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Judul Project <span class="required">*</span></label>
                <input type="text" name="title" value="{{ old('title') }}" placeholder="Contoh: Aplikasi Kasir" required>
                @error('title') <div class="error-msg">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label>Subtitle <span class="required">*</span></label>
                <input type="text" name="subtitle" value="{{ old('subtitle') }}" placeholder="Deskripsi singkat project" required>
                @error('subtitle') <div class="error-msg">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label>Thumbnail</label>
                <input type="file" name="thumbnail" accept="image/*" id="thumbnailInput">
                <div class="help">📷 Upload gambar thumbnail (JPG/PNG, max 2MB).</div>
                <img id="thumbnailPreview" class="thumbnail-preview" alt="Preview">
                @error('thumbnail') <div class="error-msg">{{ $message }}</div> @enderror
            </div>

            <div class="row">
                <div class="form-group">
                    <label>Tanggal Project</label>
                    <input type="date" name="project_date" value="{{ old('project_date', date('Y-m-d')) }}">
                    <div class="help">📅 Pilih tanggal project dibuat/selesai.</div>
                </div>
                <div class="form-group">
                    <label>Status <span class="required">*</span></label>
                    <select name="status" required>
                        <option value="Draft" {{ old('status') == 'Draft' ? 'selected' : '' }}>📝 Draft</option>
                        <option value="Publish" {{ old('status', 'Publish') == 'Publish' ? 'selected' : '' }}>✅ Publish</option>
                    </select>
                    @error('status') <div class="error-msg">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="form-group">
                <label>Deskripsi <span class="required">*</span></label>
                <textarea name="description" placeholder="Ceritakan tentang project ini..." required>{{ old('description') }}</textarea>
                @error('description') <div class="error-msg">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label>Fitur Utama</label>
                <textarea name="features" placeholder="Manajemen produk&#10;Transaksi penjualan&#10;Laporan harian">{{ old('features') }}</textarea>
                <div class="help">💡 Satu fitur per baris.</div>
            </div>

            <div class="form-group">
                <label>Tech Stack</label>
                <textarea name="tech_stack" placeholder="Backend: Laravel 11&#10;Frontend: Vue.js&#10;Database: MySQL">{{ old('tech_stack') }}</textarea>
                <div class="help">💡 Format: Key: Value (satu per baris).</div>
            </div>

            <div class="form-group">
                <label>Dokumentasi (Gambar)</label>
                <input type="file" name="screenshots[]" accept="image/*" multiple id="screenshotsInput">
                <div class="help">📸 Upload multiple gambar sebagai dokumentasi. Max 2MB per gambar.</div>
                <div id="screenshotsPreview" class="screenshots-preview"></div>
                @error('screenshots') <div class="error-msg">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label>GitHub URL</label>
                <input type="text" name="github_url" value="{{ old('github_url') }}" placeholder="https://github.com/...">
            </div>

            <div class="actions">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan Project
                </button>
                <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>

    <script>
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

        document.getElementById('screenshotsInput').addEventListener('change', function(e) {
            const preview = document.getElementById('screenshotsPreview');
            preview.innerHTML = '';
            Array.from(e.target.files).forEach(file => {
                const img = document.createElement('img');
                img.src = URL.createObjectURL(file);
                preview.appendChild(img);
            });
        });
    </script>
</body>
</html>