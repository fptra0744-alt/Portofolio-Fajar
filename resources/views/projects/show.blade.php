<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $project->title }} | Fajar Fresh Graduate</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Inter', sans-serif;
            background: #fafafa;
            color: #1a1a1a;
            line-height: 1.7;
        }
        .container { max-width: 900px; margin: 0 auto; padding: 0 24px; }

        /* ===== NAVBAR ===== */
        .navbar {
            position: sticky;
            top: 0;
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(37, 99, 235, 0.08);
            padding: 16px 0;
            z-index: 100;
        }
        .nav-inner {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: inherit;
        }
        .brand-logo { width: 44px; height: 44px; object-fit: contain; }
        .brand-text { display: flex; flex-direction: column; line-height: 1.1; }
        .brand-name {
            font-family: 'Outfit', sans-serif;
            font-size: 20px;
            font-weight: 800;
            color: #1e3a8a;
        }
        .brand-sub {
            font-size: 11px;
            font-weight: 500;
            color: #6b7280;
            letter-spacing: 2px;
            text-transform: uppercase;
        }
        .back-link {
            color: #2563eb;
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
        .back-link:hover { background: rgba(37, 99, 235, 0.08); }

        /* ===== HERO ===== */
        .project-hero { padding: 60px 0 40px; text-align: center; }
        .project-title {
            font-family: 'Outfit', sans-serif;
            font-size: 52px;
            font-weight: 800;
            letter-spacing: -2px;
            line-height: 1.1;
            margin-bottom: 16px;
            background: linear-gradient(135deg, #2563eb, #7c3aed);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .project-subtitle {
            font-size: 20px;
            color: #6b7280;
            max-width: 600px;
            margin: 0 auto 32px;
        }
        .project-meta {
            display: flex;
            justify-content: center;
            gap: 40px;
            flex-wrap: wrap;
            margin-bottom: 40px;
        }
        .meta-item { text-align: center; }
        .meta-label {
            font-size: 12px;
            color: #9ca3af;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 4px;
        }
        .meta-value { font-weight: 700; color: #1e3a8a; }
        .meta-value.status-publish { color: #065f46; }
        .meta-value.status-draft { color: #92400e; }

        .project-thumbnail {
            width: 100%;
            border-radius: 24px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.1);
            margin-bottom: 60px;
            object-fit: contain;
        }

        /* ===== SECTION ===== */
        .section { margin-bottom: 60px; }
        .section-title {
            font-family: 'Outfit', sans-serif;
            font-size: 28px;
            font-weight: 700;
            color: #1e3a8a;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .section-title i { color: #2563eb; }
        .section p {
            font-size: 16px;
            color: #4b5563;
            line-height: 1.8;
            white-space: pre-line;
        }

        /* ===== FEATURES ===== */
        .features-list { list-style: none; display: grid; gap: 12px; }
        .features-list li {
            padding: 16px 20px;
            background: white;
            border-radius: 12px;
            border: 1px solid #f3f4f6;
            display: flex;
            align-items: center;
            gap: 12px;
            color: #374151;
        }
        .features-list li::before {
            content: '✓';
            color: #2563eb;
            font-weight: 800;
            font-size: 18px;
        }

        /* ===== TECH STACK ===== */
        .tech-stack {
            background: white;
            border-radius: 16px;
            padding: 24px;
            border: 1px solid #f3f4f6;
        }
        .tech-item {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid #f3f4f6;
            gap: 20px;
        }
        .tech-item:last-child { border-bottom: none; }
        .tech-key {
            font-weight: 600;
            color: #6b7280;
            flex-shrink: 0;
            min-width: 120px;
        }
        .tech-value {
            font-weight: 600;
            color: #1e3a8a;
            text-align: right;
            word-break: break-word;
        }

        /* ===== DOKUMENTASI GRID ===== */
        .screenshots {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 16px;
        }
        .screenshot-item {
            position: relative;
            background: #f3f4f6;
            border-radius: 16px;
            overflow: hidden;
            cursor: zoom-in;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(0,0,0,0.06);
        }
        .screenshot-item:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 30px rgba(37, 99, 235, 0.2);
        }
        .screenshot-item img {
            width: 100%;
            height: auto;
            max-height: 400px;
            object-fit: contain;
            display: block;
            background: #f3f4f6;
            transition: transform 0.5s;
        }
        .screenshot-item:hover img { transform: scale(1.03); }
        .screenshot-item::after {
            content: '\f00e';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0.8);
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: rgba(37, 99, 235, 0.9);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            opacity: 0;
            transition: all 0.3s;
            pointer-events: none;
        }
        .screenshot-item:hover::after {
            opacity: 1;
            transform: translate(-50%, -50%) scale(1);
        }

        /* ===== LIGHTBOX MODAL ===== */
        .lightbox {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.92);
            z-index: 9999;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
            opacity: 0;
            transition: opacity 0.3s;
        }
        .lightbox.active {
            display: flex;
            opacity: 1;
        }
        .lightbox-img {
            max-width: 95%;
            max-height: 90vh;
            object-fit: contain;
            border-radius: 12px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.5);
            animation: zoomIn 0.3s ease;
        }
        @keyframes zoomIn {
            from { transform: scale(0.9); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
        }
        .lightbox-close {
            position: absolute;
            top: 24px;
            right: 24px;
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border: none;
            color: white;
            font-size: 20px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
            z-index: 10000;
        }
        .lightbox-close:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: rotate(90deg);
        }
        .lightbox-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 56px;
            height: 56px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border: none;
            color: white;
            font-size: 20px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
            z-index: 10000;
        }
        .lightbox-nav:hover { background: rgba(255, 255, 255, 0.3); }
        .lightbox-prev { left: 24px; }
        .lightbox-next { right: 24px; }
        .lightbox-counter {
            position: absolute;
            bottom: 24px;
            left: 50%;
            transform: translateX(-50%);
            color: white;
            font-size: 14px;
            font-weight: 600;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            padding: 8px 20px;
            border-radius: 50px;
        }

        @media (max-width: 640px) {
            .lightbox-nav { width: 44px; height: 44px; font-size: 16px; }
            .lightbox-prev { left: 12px; }
            .lightbox-next { right: 12px; }
            .lightbox-close { top: 12px; right: 12px; width: 40px; height: 40px; font-size: 16px; }
        }

        /* ===== LINKS ===== */
        .project-links {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 40px;
        }
        .btn {
            padding: 14px 28px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 15px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
            font-family: inherit;
        }
        .btn-primary { background: #2563eb; color: white; }
        .btn-primary:hover {
            background: #1d4ed8;
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(37, 99, 235, 0.3);
        }
        .btn-outline {
            border: 2px solid #e5e7eb;
            color: #1a1a1a;
            background: transparent;
        }
        .btn-outline:hover { border-color: #2563eb; color: #2563eb; }

        .footer {
            text-align: center;
            padding: 40px 0;
            border-top: 1px solid #e5e7eb;
            margin-top: 80px;
            color: #6b7280;
        }

        @media (max-width: 640px) {
            .project-title { font-size: 32px; letter-spacing: -1px; }
            .project-subtitle { font-size: 16px; }
            .project-meta { gap: 20px; }
            .screenshots { grid-template-columns: 1fr; }
            .tech-item { flex-direction: column; gap: 4px; }
            .tech-value { text-align: left; }
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="nav-inner">
            <a href="/" class="brand">
                <img src="{{ asset('logo-saya-png.png') }}" alt="logo" class="brand-logo">
                <div class="brand-text">
                    <span class="brand-name">Fajar</span>
                    <span class="brand-sub">Fresh Graduate</span>
                </div>
            </a>
            <a href="/#projects" class="back-link">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </nav>

    <div class="container">

        <div class="project-hero">
            <h1 class="project-title">{{ $project->title }}</h1>
            <p class="project-subtitle">{{ $project->subtitle }}</p>

            <div class="project-meta">
                @if($project->project_date)
                    <div class="meta-item">
                        <div class="meta-label">Tanggal</div>
                        <div class="meta-value">{{ $project->project_date->format('d M Y') }}</div>
                    </div>
                @endif
                @if($project->status)
                    <div class="meta-item">
                        <div class="meta-label">Status</div>
                        <div class="meta-value {{ $project->status == 'Publish' ? 'status-publish' : 'status-draft' }}">
                            {{ $project->status == 'Publish' ? '✅ Publish' : '📝 Draft' }}
                        </div>
                    </div>
                @endif
            </div>
        </div>

        @if($project->thumbnail)
            <img src="{{ Storage::url($project->thumbnail) }}" alt="{{ $project->title }}" class="project-thumbnail">
        @endif

        @if($project->description)
            <div class="section">
                <h2 class="section-title"><i class="fas fa-info-circle"></i> Tentang Project</h2>
                <p>{{ $project->description }}</p>
            </div>
        @endif

        @if($project->features && count($project->features) > 0)
            <div class="section">
                <h2 class="section-title"><i class="fas fa-star"></i> Fitur Utama</h2>
                <ul class="features-list">
                    @foreach($project->features as $feature)
                        <li>{{ $feature }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if($project->tech_stack && count($project->tech_stack) > 0)
            <div class="section">
                <h2 class="section-title"><i class="fas fa-code"></i> Teknologi</h2>
                <div class="tech-stack">
                    @foreach($project->tech_stack as $key => $value)
                        <div class="tech-item">
                            <span class="tech-key">{{ $key }}</span>
                            <span class="tech-value">{{ $value }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        @if($project->screenshots && count($project->screenshots) > 0)
            <div class="section">
                <h2 class="section-title">
                    <i class="fas fa-images"></i> Dokumentasi
                    <span style="font-size: 14px; font-weight: 500; color: #9ca3af; margin-left: 8px;">
                        ({{ count($project->screenshots) }} gambar)
                    </span>
                </h2>
                <div class="screenshots" id="screenshotsGrid">
                    @foreach($project->screenshots as $index => $screenshot)
                        <div class="screenshot-item" data-index="{{ $index }}">
                            <img src="{{ Storage::url($screenshot) }}" alt="Dokumentasi {{ $index + 1 }}" loading="lazy">
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="lightbox" id="lightbox">
                <button class="lightbox-close" id="lightboxClose" title="Tutup (Esc)">
                    <i class="fas fa-times"></i>
                </button>
                <button class="lightbox-nav lightbox-prev" id="lightboxPrev" title="Sebelumnya (←)">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <img src="" alt="Zoom" class="lightbox-img" id="lightboxImg">
                <button class="lightbox-nav lightbox-next" id="lightboxNext" title="Selanjutnya (→)">
                    <i class="fas fa-chevron-right"></i>
                </button>
                <div class="lightbox-counter" id="lightboxCounter"></div>
            </div>
        @endif

        <div class="project-links">
            @if($project->github_url)
                <a href="{{ $project->github_url }}" target="_blank" class="btn btn-primary">
                    <i class="fab fa-github"></i> Lihat di GitHub
                </a>
            @endif

            <a href="/#projects" class="btn btn-outline">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>

    </div>

    <footer class="footer">
    </footer>

    @if($project->screenshots && count($project->screenshots) > 0)
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const images = [
                @foreach($project->screenshots as $screenshot)
                    "{{ Storage::url($screenshot) }}",
                @endforeach
            ];

            let currentIndex = 0;
            const lightbox = document.getElementById('lightbox');
            const lightboxImg = document.getElementById('lightboxImg');
            const lightboxCounter = document.getElementById('lightboxCounter');
            const btnClose = document.getElementById('lightboxClose');
            const btnPrev = document.getElementById('lightboxPrev');
            const btnNext = document.getElementById('lightboxNext');

            // Sembunyiin nav kalau cuma 1 gambar
            if (images.length <= 1) {
                btnPrev.style.display = 'none';
                btnNext.style.display = 'none';
            }

            function updateCounter() {
                lightboxCounter.textContent = (currentIndex + 1) + ' / ' + images.length;
            }

            function openLightbox(index) {
                currentIndex = index;
                lightboxImg.src = images[currentIndex];
                updateCounter();
                lightbox.classList.add('active');
                document.body.style.overflow = 'hidden';
            }

            function closeLightbox() {
                lightbox.classList.remove('active');
                document.body.style.overflow = '';
            }

            function nextImage() {
                currentIndex = (currentIndex + 1) % images.length;
                lightboxImg.src = images[currentIndex];
                updateCounter();
            }

            function prevImage() {
                currentIndex = (currentIndex - 1 + images.length) % images.length;
                lightboxImg.src = images[currentIndex];
                updateCounter();
            }

            document.querySelectorAll('.screenshot-item').forEach(item => {
                item.addEventListener('click', function() {
                    openLightbox(parseInt(this.getAttribute('data-index')));
                });
            });

            btnClose.addEventListener('click', closeLightbox);
            btnNext.addEventListener('click', function(e) { e.stopPropagation(); nextImage(); });
            btnPrev.addEventListener('click', function(e) { e.stopPropagation(); prevImage(); });

            lightbox.addEventListener('click', function(e) {
                if (e.target === lightbox) closeLightbox();
            });

            document.addEventListener('keydown', function(e) {
                if (!lightbox.classList.contains('active')) return;
                if (e.key === 'Escape') closeLightbox();
                if (e.key === 'ArrowRight') nextImage();
                if (e.key === 'ArrowLeft') prevImage();
            });
        });
    </script>
    @endif

</body>
</html>