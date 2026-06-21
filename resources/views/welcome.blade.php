<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><rect width='100' height='100' rx='20' fill='%230a2463'/><text y='72' x='50' text-anchor='middle' font-size='60' fill='%2364ffda'>📍</text></svg>">
    <title>SIG Hotel Banda Aceh</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@latest/dist/css/tabler.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    <style>
        * { scroll-behavior: smooth; }

        .navbar-landing {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 100;
            padding: 1rem 0;
            transition: background 0.3s;
        }
        .navbar-landing.scrolled {
            background: rgba(10, 36, 99, 0.97);
            backdrop-filter: blur(12px);
            box-shadow: 0 2px 20px rgba(0,0,0,0.2);
        }

        .hero {
            min-height: 100vh;
            background: linear-gradient(135deg, #0a2463 0%, #1565c0 50%, #0097a7 100%);
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
        }
        .hero::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 700px;
            height: 700px;
            background: radial-gradient(circle, rgba(255,255,255,0.05) 0%, transparent 70%);
            border-radius: 50%;
        }
        .hero::after {
            content: '';
            position: absolute;
            bottom: -30%;
            left: -10%;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(0,151,167,0.2) 0%, transparent 70%);
            border-radius: 50%;
        }
        .hero-content { position: relative; z-index: 2; }
        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255,255,255,0.15);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.2);
            color: #fff;
            padding: 6px 16px;
            border-radius: 50px;
            font-size: 0.85rem;
            margin-bottom: 1.5rem;
        }
        .hero-title {
            font-size: 3.5rem;
            font-weight: 900;
            color: #fff;
            line-height: 1.15;
            margin-bottom: 1.5rem;
        }
        .hero-title span {
            background: linear-gradient(90deg, #64ffda, #80deea);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .hero-subtitle {
            font-size: 1.1rem;
            color: rgba(255,255,255,0.75);
            line-height: 1.7;
            margin-bottom: 2rem;
        }
        .btn-hero-primary {
            background: linear-gradient(135deg, #64ffda, #0097a7);
            color: #0a2463;
            font-weight: 700;
            padding: 12px 28px;
            border-radius: 50px;
            border: none;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .btn-hero-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(100,255,218,0.4);
            color: #0a2463;
        }
        .btn-hero-outline {
            background: transparent;
            color: #fff;
            font-weight: 600;
            padding: 12px 28px;
            border-radius: 50px;
            border: 2px solid rgba(255,255,255,0.4);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.2s;
        }
        .btn-hero-outline:hover {
            background: rgba(255,255,255,0.1);
            border-color: rgba(255,255,255,0.8);
            color: #fff;
        }

        .stat-card {
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.15);
            border-radius: 16px;
            padding: 20px;
            text-align: center;
            color: #fff;
        }
        .stat-number {
            font-size: 2rem;
            font-weight: 800;
            color: #64ffda;
        }
        .stat-label {
            font-size: 0.85rem;
            color: rgba(255,255,255,0.7);
            margin-top: 4px;
        }

        .wave-divider {
            width: 100%;
            overflow: hidden;
            line-height: 0;
            margin-top: -2px;
        }

        .section-badge {
            display: inline-block;
            background: #e3f2fd;
            color: #1565c0;
            font-weight: 700;
            font-size: 0.8rem;
            padding: 6px 16px;
            border-radius: 50px;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 1rem;
        }

        .feature-card {
            border: none;
            border-radius: 20px;
            padding: 2rem;
            height: 100%;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }
        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            border-radius: 20px 20px 0 0;
        }
        .feature-card.blue::before { background: linear-gradient(90deg, #1565c0, #0097a7); }
        .feature-card.green::before { background: linear-gradient(90deg, #2e7d32, #66bb6a); }
        .feature-card.orange::before { background: linear-gradient(90deg, #e65100, #ffa726); }
        .feature-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.12);
        }
        .feature-icon {
            width: 64px;
            height: 64px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            margin-bottom: 1.2rem;
        }

        .step-number {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, #1565c0, #0097a7);
            color: #fff;
            font-weight: 800;
            font-size: 1.2rem;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
        }
        .step-connector {
            position: absolute;
            top: 24px;
            left: calc(50% + 24px);
            right: calc(-50% + 24px);
            height: 2px;
            background: linear-gradient(90deg, #1565c0, #0097a7);
        }

        footer {
            background: #0a2463;
        }
    </style>
</head>
<body class="antialiased">

    {{-- Navbar --}}
    <nav class="navbar-landing" id="navbar">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center gap-2">
                    <i class="ti ti-map-pin text-white fs-3"></i>
                    <span class="fw-bold text-white fs-5">SIG Hotel <span style="color:#64ffda">Banda Aceh</span></span>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <a href="#fitur" class="text-white text-decoration-none d-none d-md-block" style="opacity:0.8">Fitur</a>
                    <a href="#cara-kerja" class="text-white text-decoration-none d-none d-md-block" style="opacity:0.8">Cara Kerja</a>
                    <a href="{{ route('login') }}" class="btn btn-sm px-4 fw-bold" style="background:#64ffda;color:#0a2463;border-radius:50px;">
                        <i class="ti ti-login me-1"></i> Login Admin
                    </a>
                </div>
            </div>
        </div>
    </nav>

    {{-- Hero --}}
    <section class="hero">
        <div class="container hero-content">
            <div class="row align-items-center g-5">
                <div class="col-lg-7">
                    <div class="hero-badge">
                        <i class="ti ti-award"></i>
                        Sistem Pendukung Keputusan & GIS
                    </div>
                    <h1 class="hero-title">
                        Temukan Penginapan <span>Terbaik</span> di Banda Aceh
                    </h1>
                    <p class="hero-subtitle">
                        Sistem cerdas berbasis GIS yang merekomendasikan penginapan terbaik menggunakan metode <strong style="color:#64ffda">MAUT</strong> dan menentukan rute terpendek dengan algoritma <strong style="color:#64ffda">A*</strong>.
                    </p>
                    <div class="d-flex flex-wrap gap-3 mb-5">
                        <a href="#fitur" class="btn-hero-primary">
                            <i class="ti ti-compass"></i> Jelajahi Fitur
                        </a>
                        <a href="{{ route('login') }}" class="btn-hero-outline">
                            <i class="ti ti-login"></i> Masuk Admin
                        </a>
                    </div>
                    <div class="row g-3">
                        <div class="col-4">
                            <div class="stat-card">
                                <div class="stat-number">10+</div>
                                <div class="stat-label">Hotel Terdaftar</div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="stat-card">
                                <div class="stat-number">4</div>
                                <div class="stat-label">Kriteria Penilaian</div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="stat-card">
                                <div class="stat-number">A*</div>
                                <div class="stat-label">Algoritma Routing</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 d-none d-lg-flex justify-content-center">
                    <div style="position:relative;">
                        <div style="width:380px;height:380px;background:rgba(255,255,255,0.05);border:2px solid rgba(255,255,255,0.1);border-radius:50%;display:flex;align-items:center;justify-content:center;">
                            <div style="width:280px;height:280px;background:rgba(255,255,255,0.07);border:2px solid rgba(255,255,255,0.15);border-radius:50%;display:flex;align-items:center;justify-content:center;">
                                <i class="ti ti-map-2" style="font-size:8rem;color:rgba(100,255,218,0.6);"></i>
                            </div>
                        </div>
                        <div style="position:absolute;top:20px;right:10px;background:rgba(255,255,255,0.15);backdrop-filter:blur(10px);border-radius:12px;padding:12px 16px;color:#fff;font-size:0.85rem;">
                            <i class="ti ti-star-filled text-warning me-1"></i> Rating Tertinggi
                        </div>
                        <div style="position:absolute;bottom:40px;left:0;background:rgba(255,255,255,0.15);backdrop-filter:blur(10px);border-radius:12px;padding:12px 16px;color:#fff;font-size:0.85rem;">
                            <i class="ti ti-route text-success me-1"></i> Rute Terpendek
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Wave --}}
    <div class="wave-divider" style="background:linear-gradient(135deg,#0a2463,#0097a7);">
        <svg viewBox="0 0 1440 60" xmlns="http://www.w3.org/2000/svg">
            <path d="M0,30 C360,60 1080,0 1440,30 L1440,60 L0,60 Z" fill="#f8fafc"/>
        </svg>
    </div>

    {{-- Fitur --}}
    <section id="fitur" class="py-6" style="background:#f8fafc;">
        <div class="container">
            <div class="text-center mb-5">
                <span class="section-badge">Fitur Sistem</span>
                <h2 class="fw-bold fs-1">Apa yang Bisa Dilakukan?</h2>
                <p class="text-muted fs-5 mt-2">Sistem terintegrasi untuk membantu wisatawan menemukan penginapan terbaik</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card feature-card blue shadow-sm">
                        <div class="feature-icon bg-blue-lt text-blue">
                            <i class="ti ti-trophy"></i>
                        </div>
                        <h3 class="fw-bold mb-2">Rekomendasi MAUT</h3>
                        <p class="text-muted">Sistem memberikan rekomendasi penginapan terbaik berdasarkan metode <strong>Multi Attribute Utility Theory</strong> dengan mempertimbangkan harga, fasilitas, rating, dan bintang hotel.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card feature-card green shadow-sm">
                        <div class="feature-icon bg-green-lt text-green">
                            <i class="ti ti-route-2"></i>
                        </div>
                        <h3 class="fw-bold mb-2">Rute Terpendek A*</h3>
                        <p class="text-muted">Algoritma <strong>A* (A-Star)</strong> menghitung rute terpendek dari posisi pengguna menuju lokasi penginapan yang direkomendasikan secara efisien.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card feature-card orange shadow-sm">
                        <div class="feature-icon bg-orange-lt text-orange">
                            <i class="ti ti-map-search"></i>
                        </div>
                        <h3 class="fw-bold mb-2">Peta Interaktif</h3>
                        <p class="text-muted">Visualisasi lokasi penginapan dan rute perjalanan secara interaktif pada peta digital berbasis <strong>Leaflet.js</strong> dan <strong>OpenStreetMap</strong>.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Cara Kerja --}}
    <section id="cara-kerja" class="py-6" style="background:#fff;">
        <div class="container">
            <div class="text-center mb-5">
                <span class="section-badge">Cara Kerja</span>
                <h2 class="fw-bold fs-1">Bagaimana Sistem Bekerja?</h2>
                <p class="text-muted fs-5 mt-2">Proses sederhana untuk mendapatkan rekomendasi terbaik</p>
            </div>
            <div class="row g-4 text-center">
                <div class="col-md-3 position-relative">
                    <div class="step-number">1</div>
                    <h5 class="fw-bold">Input Data Hotel</h5>
                    <p class="text-muted small">Admin menginput data penginapan beserta nilai setiap kriteria penilaian</p>
                </div>
                <div class="col-md-3 position-relative">
                    <div class="step-number">2</div>
                    <h5 class="fw-bold">Tentukan Kriteria</h5>
                    <p class="text-muted small">Admin menentukan kriteria dan bobot penilaian sesuai kebutuhan</p>
                </div>
                <div class="col-md-3 position-relative">
                    <div class="step-number">3</div>
                    <h5 class="fw-bold">Hitung MAUT</h5>
                    <p class="text-muted small">Sistem menghitung nilai utilitas setiap hotel dan menghasilkan ranking</p>
                </div>
                <div class="col-md-3">
                    <div class="step-number">4</div>
                    <h5 class="fw-bold">Tampilkan Rute</h5>
                    <p class="text-muted small">Algoritma A* menentukan rute terpendek menuju hotel terpilih di peta</p>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-6" style="background:linear-gradient(135deg,#0a2463,#1565c0);">
        <div class="container text-center">
            <h2 class="fw-bold text-white fs-1 mb-3">Siap Menggunakan Sistem?</h2>
            <p class="text-white mb-4" style="opacity:0.8;font-size:1.1rem;">Masuk sebagai administrator untuk mengelola data dan melihat hasil rekomendasi</p>
            <a href="{{ route('login') }}" class="btn-hero-primary" style="font-size:1rem;">
                <i class="ti ti-login"></i> Masuk Sekarang
            </a>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-white">
                    <i class="ti ti-map-pin me-1" style="color:#64ffda"></i>
                    <strong>SIG Hotel Banda Aceh</strong>
                </div>
                <div class="col-md-6 text-end text-white" style="opacity:0.6;font-size:0.85rem;">
                    &copy; {{ date('Y') }} Universitas Malikussaleh — Teknik Informatika
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@tabler/core@latest/dist/js/tabler.min.js"></script>
    <script>
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    </script>
</body>
</html>