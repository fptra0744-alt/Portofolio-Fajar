<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolio | Fajar Putra Eswan</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #fafafa;
            color: #1a1a1a;
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* ===== NAVBAR ===== */
        .navbar {
            position: sticky;
            top: 0;
            width: 100%;
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(37, 99, 235, 0.08);
            z-index: 100;
        }

        .nav-inner {
            max-width: 1200px;
            margin: 0 auto;
            padding: 16px 24px;
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

        .brand-logo {
            width: 44px;
            height: 44px;
            object-fit: contain;
            transition: transform 0.3s ease;
        }

        .brand-logo:hover {
            transform: scale(1.1) rotate(-5deg);
        }

        .brand-text {
            display: flex;
            flex-direction: column;
            line-height: 1.1;
        }

        .brand-name {
            font-family: 'Outfit', sans-serif;
            font-size: 20px;
            font-weight: 800;
            color: #1e3a8a;
            letter-spacing: -0.5px;
        }

        .brand-sub {
            font-size: 11px;
            font-weight: 500;
            color: #6b7280;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .nav-links {
            display: flex;
            gap: 8px;
            list-style: none;
            align-items: center;
        }

        .nav-links a {
            text-decoration: none;
            color: #4b5563;
            font-weight: 600;
            font-size: 15px;
            padding: 10px 20px;
            border-radius: 50px;
            transition: all 0.3s ease;
            cursor: pointer;
            display: inline-block;
        }

        .nav-links a:hover {
            color: #2563eb;
            background: rgba(37, 99, 235, 0.06);
        }

        .nav-links a.active {
            color: #2563eb;
            background: rgba(37, 99, 235, 0.1);
        }

        /* ===== HERO ===== */
        .hero {
            padding: 80px 0 60px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
            min-height: 80vh;
            background: 
                radial-gradient(circle at 20% 30%, rgba(37, 99, 235, 0.06) 0%, transparent 50%),
                radial-gradient(circle at 80% 70%, rgba(124, 58, 237, 0.06) 0%, transparent 50%),
                #ffffff;
            border-radius: 32px;
            margin-top: 20px;
            position: relative;
            overflow: hidden;
        }

        .hero-content h1 {
            font-family: 'Outfit', sans-serif;
            font-weight: 800;
            font-size: 52px;
            line-height: 1.1;
            letter-spacing: -1.5px;
            margin-bottom: 20px;
            background: linear-gradient(135deg, #2563eb, #7c3aed);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-content p {
            font-size: 18px;
            color: #6b7280;
            margin-bottom: 32px;
            max-width: 480px;
        }

        .btn-group {
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
        }

        .btn {
            padding: 14px 32px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 15px;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }

        .btn-primary {
            background: #2563eb;
            color: white;
            border: 2px solid #2563eb;
        }

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

        .btn-outline:hover {
            border-color: #2563eb;
            color: #2563eb;
            transform: translateY(-2px);
        }

        .hero-image {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .avatar-wrapper {
            width: 400px;
            height: 400px;
            border-radius: 50%;
            background: linear-gradient(135deg, #2563eb20, #7c3aed20);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .avatar-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid white;
            box-shadow: 0 20px 60px rgba(0,0,0,0.1);
        }

        .floating-badge {
            position: absolute;
            background: white;
            padding: 12px 20px;
            border-radius: 50px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            font-size: 14px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .badge-1 { bottom: 20px; right: -20px; }
        .badge-2 { top: 20px; left: -20px; }
        .badge-1 i, .badge-2 i { color: #2563eb; }

        /* ===== STATS ===== */
        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            padding: 60px 0;
            border-top: 1px solid #e5e7eb;
            margin-top: 20px;
        }

        .stat-item { text-align: center; }
        .stat-number {
            font-size: 36px;
            font-weight: 700;
            color: #2563eb;
        }
        .stat-label {
            color: #6b7280;
            font-weight: 500;
            margin-top: 4px;
        }

    /* ===== SKILLS ===== */
    .skills-section {
        padding: 80px 0;
        background:
        radial-gradient(circle at 20% 30%, rgba(37, 99, 235, 0.08) 0%, transparent 50%),
        radial-gradient(circle at 80% 70%, rgba(124, 58, 237, 0.08) 0%, transparent 50%),
        #ffffff;
            }

            /* Category wrapper */
            .skill-category {
                margin-bottom: 48px;
            }

            .skill-category:last-child {
                margin-bottom: 0;
            }

            .skill-category-header {
                display: flex;
                align-items: center;
                justify-content: center;   /* 👈 judul kategori ke tengah */
                gap: 12px;
                margin-bottom: 24px;
                padding-bottom: 12px;
                border-bottom: 2px dashed #e5e7eb;
            }

            .skill-category-header i {
                width: 40px;
                height: 40px;
                border-radius: 12px;
                background: linear-gradient(135deg, #2563eb, #7c3aed);
                color: white;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 18px;
                box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25);
                flex-shrink: 0;
            }

            .skill-category-header h3 {
                font-family: 'Outfit', sans-serif;
                font-size: 20px;
                font-weight: 700;
                color: #1e3a8a;
                letter-spacing: -0.3px;
                text-align: center;
            }

            /* Grid */
            .skills-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
                gap: 20px;
            }

            .skill-card {
                background: white;
                padding: 26px 16px;
                border-radius: 16px;
                text-align: center;
                transition: all 0.3s;
                border: 1px solid #f3f4f6;
            }

            .skill-card:hover {
                transform: translateY(-6px);
                box-shadow: 0 20px 40px rgba(0,0,0,0.06);
                border-color: #2563eb;
            }

            .skill-card i {
                font-size: 36px;
                color: #2563eb;
                margin-bottom: 12px;
                display: block;
            }

            .skill-card h4 {
                font-weight: 600;
                margin-bottom: 6px;
                font-size: 15px;
                color: #1e3a8a;
            }

            .skill-card p {
                color: #6b7280;
                font-size: 13px;
                font-weight: 500;
            }

        /* Warna icon brand */
        .skill-card .fa-laravel { color: #FF2D20; }
        .skill-card .fa-html5 { color: #E34F26; }
        .skill-card .fa-css3-alt { color: #1572B6; }
        .skill-card .fa-php { color: #777BB4; }
        .skill-card .fa-database { color: #00758F; }
        .skill-card .fa-js { color: #F7DF1E; }
        .skill-card .fa-file-excel { color: #217346; }
        .skill-card .fa-file-word { color: #2B579A; }
        .skill-card .fa-file-powerpoint { color: #D24726; }
        .skill-card .fa-palette { color: #00C4CC; }
        .skill-card .fa-google { color: #4285F4; }
        .skill-card .fa-comments { color: #f59e0b; }
        .skill-card .fa-clock { color: #8b5cf6; }
        .skill-card .fa-users { color: #10b981; }
        .skill-card .fa-lightbulb { color: #eab308; }   

         /* ===== PROJECTS ===== */
        .projects-section {
            padding: 80px 0;
            background: white;
        }

        .projects-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

        .project-card {
            text-decoration: none;
            color: inherit;
            display: block;
            background: #fafafa;
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.3s;
            border: 1px solid #f3f4f6;
        }

        .project-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.08);
        }

        .project-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            background: linear-gradient(135deg, #2563eb, #7c3aed);
            display: block;
        }

        .project-card .content {
             padding: 24px; 
             text-align: left;
            }

        .project-card h4 {
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 18px;
            color: #1e3a8a;
        }

        .project-card p {
            color: #6b7280;
            font-size: 14px;
            margin-bottom: 16px;
        }

        .project-tags {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .project-tags span {
            background: #e5e7eb;
            padding: 4px 12px;
            border-radius: 50px;
            font-size: 12px;
            font-weight: 500;
            color: #374151;
        }

        /* ===== CONTACT ===== */
        .contact-section {
            padding: 80px 0;
        }

        .contact-wrapper {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            background: white;
            padding: 60px;
            border-radius: 24px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.04);
        }

        .contact-info h3 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .contact-info p {
            color: #6b7280;
            margin-bottom: 32px;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 20px;
        }

        .contact-item i {
            width: 48px;
            height: 48px;
            background: #f3f4f6;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #2563eb;
            font-size: 18px;
            flex-shrink: 0;
        }

        .contact-item div strong {
            display: block;
            font-weight: 600;
        }

        .contact-item div span,
        .contact-item div a {
            color: #6b7280;
            font-size: 14px;
            text-decoration: none;
        }

        .contact-item div a:hover {
            color: #2563eb;
        }

        /* ===== FOOTER ===== */
        .footer {
            padding: 40px 0;
            text-align: center;
            border-top: 1px solid #e5e7eb;
            margin-top: 40px;
            color: #6b7280;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 16px;
        }

        .social-links a {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: #f3f4f6;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #1a1a1a;
            text-decoration: none;
            transition: all 0.3s;
        }

        .social-links a:hover {
            background: #2563eb;
            color: white;
            transform: translateY(-2px);
        }

        /* ===== ANIMASI ===== */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .hero-content { animation: fadeInUp 0.8s ease; }
        .hero-image { animation: fadeInUp 0.8s ease 0.2s both; }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .hero {
                grid-template-columns: 1fr;
                text-align: center;
                padding: 40px 0;
            }
            .hero-content p { margin: 0 auto 32px; }
            .btn-group { justify-content: center; }
            .avatar-wrapper { width: 280px; height: 280px; }
            .floating-badge { font-size: 12px; padding: 8px 16px; }
            .badge-1 { bottom: 0px; right: 0px; }
            .badge-2 { top: 0px; left: 0px; }
            .stats { grid-template-columns: 1fr; gap: 20px; }
            .skills-grid { grid-template-columns: repeat(2, 1fr); }
            .projects-grid { grid-template-columns: 1fr; }
            .contact-wrapper { grid-template-columns: 1fr; padding: 30px; }
            .nav-links { gap: 8px; }
            .hero-content h1 { font-size: 36px; }
            .navbar { padding: 12px 0; }
            .nav-inner { flex-direction: column; gap: 12px; }
        }

        @media (max-width: 480px) {
            .skills-grid { grid-template-columns: 1fr; }
            .nav-links {
                gap: 4px;
                font-size: 13px;
                flex-wrap: wrap;
                justify-content: center;
            }
            .nav-links a { padding: 8px 14px; }
            .hero-content h1 { font-size: 32px; }
        }
/* ===== EDUCATION ===== */
.education-section {
    padding: 80px 0;
    position: relative;
    background:
        radial-gradient(circle at 20% 30%, rgba(37, 99, 235, 0.06) 0%, transparent 50%),
        radial-gradient(circle at 80% 70%, rgba(124, 58, 237, 0.06) 0%, transparent 50%),
        #ffffff;
}

.education-single-card {
    max-width: 900px;
    margin: 0 auto;
    background: white;
    border-radius: 24px;
    padding: 0;
    border: 1px solid #f3f4f6;
    display: grid;
    grid-template-columns: 180px 1fr;
    gap: 0;
    overflow: hidden;
    transition: all 0.4s;
    box-shadow: 0 4px 20px rgba(0,0,0,0.04);
    position: relative;
}

.education-single-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 6px;
    height: 100%;
    background: linear-gradient(180deg, #2563eb, #7c3aed);
    z-index: 2;
}

.education-single-card:hover {
    box-shadow: 0 20px 50px rgba(37, 99, 235, 0.15);
    border-color: #93c5fd;
    transform: translateY(-6px);
}

/* ===== ICON COLUMN ===== */
.education-icon-big {
    background: linear-gradient(160deg, #2563eb, #7c3aed);
    color: white;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 12px;
    padding: 40px 20px;
    position: relative;
    overflow: hidden;
    text-align: center;
}

.education-icon-big::before {
    content: '';
    position: absolute;
    top: -40px;
    right: -40px;
    width: 120px;
    height: 120px;
    background: rgba(255,255,255,0.1);
    border-radius: 50%;
}

.education-icon-big::after {
    content: '';
    position: absolute;
    bottom: -50px;
    left: -50px;
    width: 140px;
    height: 140px;
    background: rgba(255,255,255,0.08);
    border-radius: 50%;
}

.education-icon-big i {
    position: relative;
    z-index: 1;
    font-size: 56px;
    filter: drop-shadow(0 4px 12px rgba(0,0,0,0.15));
}

.education-icon-big span {
    position: relative;
    z-index: 1;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 2px;
    text-transform: uppercase;
    opacity: 0.9;
    color: rgba(255,255,255,0.9);
}

/* ===== CONTENT COLUMN ===== */
.education-single-content {
    padding: 36px 40px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.education-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 11px;
    font-weight: 700;
    color: #2563eb;
    background: rgba(37, 99, 235, 0.1);
    padding: 6px 14px;
    border-radius: 50px;
    width: fit-content;
    margin-bottom: 12px;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.education-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 8px;
    flex-wrap: wrap;
    gap: 12px;
}

.education-header h3 {
    font-family: 'Outfit', sans-serif;
    font-size: 26px;
    font-weight: 800;
    color: #1e3a8a;
    letter-spacing: -0.5px;
    line-height: 1.2;
}

.education-year {
    font-size: 13px;
    font-weight: 700;
    color: #2563eb;
    background: rgba(37, 99, 235, 0.1);
    padding: 6px 16px;
    border-radius: 50px;
    white-space: nowrap;
}

.education-major {
    font-size: 15px;
    font-weight: 600;
    color: #7c3aed;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.education-major::before {
    content: '';
    width: 20px;
    height: 2px;
    background: linear-gradient(90deg, #2563eb, #7c3aed);
    border-radius: 2px;
}

.education-desc {
    font-size: 15px;
    color: #6b7280;
    line-height: 1.8;
    margin-bottom: 20px;
}

/* ===== INFO GRID ===== */
.education-info {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    padding-top: 20px;
    border-top: 1px dashed #e5e7eb;
}

.education-info-item {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: 13px;
    color: #4b5563;
    background: #f9fafb;
    padding: 8px 14px;
    border-radius: 10px;
    font-weight: 500;
    transition: all 0.3s;
}

.education-info-item:hover {
    background: rgba(37, 99, 235, 0.08);
    color: #2563eb;
}

.education-info-item i {
    color: #2563eb;
    font-size: 14px;
}

/* ===== RESPONSIVE ===== */
@media (max-width: 768px) {
    .education-single-card {
        grid-template-columns: 1fr;
    }

    .education-icon-big {
        padding: 30px 20px;
        flex-direction: row;
        gap: 16px;
    }

    .education-icon-big i {
        font-size: 40px;
    }

    .education-single-content {
        padding: 28px 24px;
    }

    .education-header h3 {
        font-size: 20px;
    }

    .education-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 8px;
    }
}    </style>
</head>
<body>

    <!-- ===== NAVBAR ===== -->
    <nav class="navbar">
        <div class="nav-inner">
            <a href="/" class="brand">
                <img src="{{ asset('logo-saya-png.png') }}" alt="logo" class="brand-logo">
                <div class="brand-text">
                    <span class="brand-name">Fajar</span>
                    <span class="brand-sub">Fresh Graduate</span>
                </div>
            </a>

            <ul class="nav-links">
                <li><a href="#home" class="active">Home</a></li>
                <li><a href="#skills">Skills</a></li>
                <li><a href="#projects">Projects</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </div>
    </nav>

    <!-- ===== HERO ===== -->
    <section class="hero container" id="home">
        <div class="hero-content">
            <h1>Fajar Putra Eswan</h1>
            <p>Fresh graduate web developer. Terbiasa membuat website sederhana dengan HTML, CSS, JavaScript, dan Laravel. Cepat belajar & siap berkembang.</p>
            <div class="btn-group">
                <a href="#projects" class="btn btn-primary">Lihat Proyek <i class="fas fa-arrow-right"></i></a>
                <a href="#contact" class="btn btn-outline">Hubungi Saya</a>
            </div>
        </div>
        <div class="hero-image">
            <div class="avatar-wrapper">
                <div class="floating-badge badge-1">
                    <i class="fas fa-code"></i> 3 Tahun
                </div>
                <div class="floating-badge badge-2">
                    <i class="fas fa-rocket"></i> 1 Proyek
                </div>
                <img src="{{ asset('foto-saya.jpeg.jpeg') }}" alt="Profile">
            </div>
        </div>
    </section>

    <!-- ===== STATS ===== -->
    <div class="container">
        <div class="stats">
            <div class="stat-item">
                <div class="stat-number">{{ \App\Models\Project::where('status', 'Publish')->count() }}</div>
                <div class="stat-label">Proyek Selesai</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">3</div>
                <div class="stat-label">Tahun Pengalaman</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">100%</div>
                <div class="stat-label">Siap Belajar</div>
            </div>
        </div>
    </div>

<!-- ===== SKILLS ===== -->
<section class="skills-section" id="skills">
    <div class="container">
  <div style="text-align: center; margin-bottom: 48px;">
    <h2 class="section-title">⚡ Keahlian</h2>
    <p class="section-subtitle">Tools & teknologi yang saya kuasai</p>
    
    </div>
    {{-- KATEGORI 1: TECHNICAL SKILLS --}}
    <div class="skill-category">
        <div class="skill-category-header">
            <i class="fas fa-laptop-code"></i>
            <h3>Technical Skills</h3>
        </div>
        <div class="skills-grid">
            <div class="skill-card">
                <i class="fab fa-laravel"></i>
                <h4>Laravel</h4>
                <p>Beginner</p>
            </div>
            <div class="skill-card">
                <i class="fab fa-html5"></i>
                <h4>HTML & CSS</h4>
                <p>Beginner</p>
            </div>
            <div class="skill-card">
                <i class="fab fa-php"></i>
                <h4>PHP</h4>
                <p>Beginner</p>
            </div>
            <div class="skill-card">
                <i class="fas fa-database"></i>
                <h4>MySQL</h4>
                <p>Beginner</p>
            </div>
        </div>
    </div>

    {{-- KATEGORI 2: TOOLS & SOFT SKILLS --}}
    <div class="skill-category">
        <div class="skill-category-header">
            <i class="fas fa-tools"></i>
            <h3>Tools & Soft Skills</h3>
        </div>
        <div class="skills-grid">
            <div class="skill-card">
                <i class="fas fa-file-excel"></i>
                <h4>MS Excel</h4>
                <p>Beginner</p>
            </div>
            <div class="skill-card">
                <i class="fas fa-file-word"></i>
                <h4>MS Word</h4>
                <p>Menengah</p>
            </div>
            <div class="skill-card">
                <i class="fas fa-palette"></i>
                <h4>Canva</h4>
                <p>Beginner</p>
            </div>
            <div class="skill-card">
                <i class="fas fa-comments"></i>
                <h4>Komunikasi</h4>
                <p>Baik</p>
            </div>
            <div class="skill-card">
                <i class="fas fa-users"></i>
                <h4>Kerja Tim</h4>
                <p>Baik</p>
            </div>
             <div class="skill-card">
            <i class="fas fa-folder-open"></i>
            <h4>Administrasi</h4>
            <p>Baik</p>
        </div>
        <div class="skill-card">
            <i class="fas fa-headset"></i>
            <h4>Pelayanan Pelanggan</h4>
            <p>Baik</p>
        </div>
    </div>

</section>

    <!-- ===== PROJECTS ===== -->
    <section class="projects-section" id="projects">
        <div class="container">
            <div style="text-align: center; margin-bottom: 100px;">
            <h2 class="section-title">🚀 Proyek Terbaru</h2>
            <p class="section-subtitle">Beberapa karya yang pernah saya buat</p>
            <div class="projects-grid">
                @forelse(\App\Models\Project::where('status', 'Publish')->latest()->take(6)->get() as $project)
                    <a href="{{ route('projects.show', $project) }}" class="project-card">
                        @if($project->thumbnail)
                            <img src="{{ Storage::url($project->thumbnail) }}" alt="{{ $project->title }}">
                        @else
                            <img src="https://picsum.photos/seed/{{ $project->id }}/600/400" alt="{{ $project->title }}">
                        @endif
                        <div class="content">
                            <h4>{{ $project->title }}</h4>
                            <p>{{ $project->subtitle }}</p>
                            @if($project->tech_stack && count($project->tech_stack) > 0)
                                <div class="project-tags">
                                    @foreach($project->tech_stack as $key => $value)
                                        <span>{{ $value }}</span>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </a>
                @empty
                    <div style="grid-column: 1 / -1; text-align: center; padding: 60px 20px; color: #6b7280;">
                        <i class="fas fa-folder-open" style="font-size: 48px; margin-bottom: 16px; opacity: 0.3;"></i>
                        <p>Belum ada project yang dipublish.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- ===== CONTACT (TOMBOL LINK, BUKAN FORM) ===== -->
    <section class="contact-section container" id="contact">
        <div class="contact-wrapper">

            {{-- KIRI: Info kontak --}}
            <div class="contact-info">
                <h3>📬 Hubungi Saya</h3>
                <p>Ada pertanyaan atau ingin kerjasama? Silakan hubungi saya lewat salah satu opsi di samping.</p>

                <div class="contact-item">
                    <i class="fas fa-envelope"></i>
                    <div>
                        <strong>Email</strong>
                        <a href="mailto:fptra0744@gmail.com">fptra0744@gmail.com</a>
                    </div>
                </div>

                <div class="contact-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <div>
                        <strong>Lokasi</strong>
                        <span>Kampung Lebak Sirna, Desa Karacak, Kecamatan Leuwiliang, Kabupaten Bogor</span>
                    </div>
                </div>

                <div class="contact-item">
                    <i class="fab fa-whatsapp" style="color: #25D366;"></i>
                    <div>
                        <strong>WhatsApp</strong>
                        <a href="https://wa.me/6285218206892" target="_blank">+62 852-1820-6892</a>
                    </div>
                </div>
            </div>

            {{-- KANAN: Card ajakan + tombol --}}
          <div style="background: linear-gradient(135deg, #2563eb, #7c3aed); border-radius: 24px; padding: 48px; color: white; display: flex; flex-direction: column; justify-content: center;">
                <h3 style="font-size: 28px; font-weight: 700; margin-bottom: 16px; font-family: 'Outfit', sans-serif;">
                    🚀 Ayo Kerjasama!
                </h3>
                <p style="margin-bottom: 32px; opacity: 0.9; line-height: 1.6; font-size: 15px;">
                    Saya terbuka untuk peluang kerja, freelance, atau kolaborasi project.
                </p>

                <div style="display: flex; flex-direction: column; gap: 12px;">
                    <a href="{{ asset('CV-Fajar.pdf') }}" download
                       style="background: white; color: #2563eb; padding: 16px 24px; border-radius: 50px; text-decoration: none; font-weight: 700; display: inline-flex; align-items: center; justify-content: center; gap: 10px; transition: all 0.3s; box-shadow: 0 4px 15px rgba(0,0,0,0.15);"
                       onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 10px 25px rgba(0,0,0,0.25)';"
                       onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(0,0,0,0.15)';">
                        <i class="fas fa-download"></i> Download CV
                    </a>

                    <a href="mailto:fptra0744@gmail.com"
                       style="background: rgba(255,255,255,0.15); color: white; padding: 16px 24px; border-radius: 50px; text-decoration: none; font-weight: 600; display: inline-flex; align-items: center; justify-content: center; gap: 10px; border: 2px solid rgba(255,255,255,0.3); transition: all 0.3s;"
                       onmouseover="this.style.background='rgba(255,255,255,0.25)'; this.style.transform='translateY(-2px)';"
                       onmouseout="this.style.background='rgba(255,255,255,0.15)'; this.style.transform='translateY(0)';">
                        <i class="fas fa-envelope"></i> Kirim Email
                    </a>

                    <a href="https://wa.me/6285218206892?text=Halo%20Fajar,%20saya%20tertarik%20kerjasama"
                       target="_blank"
                       style="background: rgba(255,255,255,0.15); color: white; padding: 16px 24px; border-radius: 50px; text-decoration: none; font-weight: 600; display: inline-flex; align-items: center; justify-content: center; gap: 10px; border: 2px solid rgba(255,255,255,0.3); transition: all 0.3s;"
                       onmouseover="this.style.background='rgba(255,255,255,0.25)'; this.style.transform='translateY(-2px)';"
                       onmouseout="this.style.background='rgba(255,255,255,0.15)'; this.style.transform='translateY(0)';">
                        <i class="fab fa-whatsapp"></i> Chat WhatsApp
                    </a>

                    <a href="https://www.linkedin.com/in/fajar-putra-b81b65363"
                       target="_blank"
                       style="background: rgba(255,255,255,0.15); color: white; padding: 16px 24px; border-radius: 50px; text-decoration: none; font-weight: 600; display: inline-flex; align-items: center; justify-content: center; gap: 10px; border: 2px solid rgba(255,255,255,0.3); transition: all 0.3s;"
                       onmouseover="this.style.background='rgba(255,255,255,0.25)'; this.style.transform='translateY(-2px)';"
                       onmouseout="this.style.background='rgba(255,255,255,0.15)'; this.style.transform='translateY(0)';">
                        <i class="fab fa-linkedin-in"></i> LinkedIn
                    </a>
                </div>
            </div>

        </div>
    </section>

    <!-- ===== FOOTER ===== -->
    <footer class="footer container">
        <div class="social-links">
            <a href="https://github.com/usernamekamu" target="_blank" title="GitHub"><i class="fab fa-github"></i></a>
            <a href="https://linkedin.com/in/usernamekamu" target="_blank" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
            <a href="mailto:fptra0744@gmail.com" title="Email"><i class="fas fa-envelope"></i></a>
            <a href="https://wa.me/6285218206892" target="_blank" title="WhatsApp"><i class="fab fa-whatsapp"></i></a>
        </div>
    </footer>

    <!-- ===== SCRIPT ===== -->
    <script>
        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    const navHeight = 80;
                    const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - navHeight;
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Auto-highlight menu
        const sections = document.querySelectorAll('section[id]');
        const navLinks = document.querySelectorAll('.nav-links a');

        function highlightNav() {
            let current = '';
            const scrollPos = window.scrollY + 150;

            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.offsetHeight;
                if (scrollPos >= sectionTop && scrollPos < sectionTop + sectionHeight) {
                    current = section.getAttribute('id');
                }
            });

            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === '#' + current) {
                    link.classList.add('active');
                }
            });
        }

        window.addEventListener('scroll', highlightNav);
        window.addEventListener('load', highlightNav);
    </script>

</body>
</html>