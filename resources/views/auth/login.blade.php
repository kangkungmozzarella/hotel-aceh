<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><rect width='100' height='100' rx='20' fill='%230a2463'/><text y='72' x='50' text-anchor='middle' font-size='60' fill='%2364ffda'>📍</text></svg>">
    <title>Login - SIG Hotel Banda Aceh</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@latest/dist/css/tabler.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    <style>
        body { margin: 0; padding: 0; }

        .login-wrapper {
            min-height: 100vh;
            display: flex;
        }

        .login-left {
            flex: 1;
            background: linear-gradient(135deg, #0a2463 0%, #1565c0 50%, #0097a7 100%);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 3rem;
            position: relative;
            overflow: hidden;
        }
        .login-left::before {
            content: '';
            position: absolute;
            top: -30%;
            right: -20%;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(255,255,255,0.06) 0%, transparent 70%);
            border-radius: 50%;
        }
        .login-left::after {
            content: '';
            position: absolute;
            bottom: -20%;
            left: -10%;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(0,151,167,0.2) 0%, transparent 70%);
            border-radius: 50%;
        }
        .login-left-content {
            position: relative;
            z-index: 2;
            text-align: center;
            color: #fff;
            max-width: 420px;
        }
        .login-left-icon {
            width: 120px;
            height: 120px;
            background: rgba(255,255,255,0.1);
            border: 2px solid rgba(255,255,255,0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2rem;
            font-size: 3.5rem;
            backdrop-filter: blur(10px);
        }
        .login-left h1 {
            font-size: 2rem;
            font-weight: 900;
            margin-bottom: 1rem;
        }
        .login-left h1 span {
            background: linear-gradient(90deg, #64ffda, #80deea);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .login-left p {
            color: rgba(255,255,255,0.75);
            line-height: 1.7;
            margin-bottom: 2rem;
        }

        .feature-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255,255,255,0.12);
            border: 1px solid rgba(255,255,255,0.2);
            color: #fff;
            padding: 8px 16px;
            border-radius: 50px;
            font-size: 0.85rem;
            margin: 4px;
            backdrop-filter: blur(5px);
        }

        .login-right {
            width: 480px;
            background: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 3rem;
        }

        .login-form-header {
            margin-bottom: 2rem;
        }
        .login-form-header h2 {
            font-size: 1.8rem;
            font-weight: 800;
            color: #0a2463;
            margin-bottom: 0.5rem;
        }
        .login-form-header p {
            color: #64748b;
            font-size: 0.95rem;
        }

        .form-label {
            font-weight: 600;
            color: #374151;
            font-size: 0.9rem;
        }
        .form-control {
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            padding: 12px 16px;
            font-size: 0.95rem;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        .form-control:focus {
            border-color: #1565c0;
            box-shadow: 0 0 0 3px rgba(21,101,192,0.1);
        }

        .input-icon-wrapper {
            position: relative;
        }
        .input-icon-wrapper .ti {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            font-size: 1.1rem;
        }
        .input-icon-wrapper .form-control {
            padding-right: 42px;
        }

        .btn-login {
            background: linear-gradient(135deg, #0a2463, #1565c0);
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 13px;
            font-size: 1rem;
            font-weight: 700;
            width: 100%;
            transition: all 0.2s;
            cursor: pointer;
        }
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(21,101,192,0.4);
        }

        .back-link {
            color: #64748b;
            text-decoration: none;
            font-size: 0.9rem;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-bottom: 2rem;
            transition: color 0.2s;
        }
        .back-link:hover { color: #1565c0; }

        @media (max-width: 768px) {
            .login-left { display: none; }
            .login-right { width: 100%; padding: 2rem; }
        }
    </style>
</head>
<body>
<div class="login-wrapper">

    {{-- Left Panel --}}
    <div class="login-left">
        <div class="login-left-content">
            <div class="login-left-icon">
                <i class="ti ti-map-2" style="color:#64ffda"></i>
            </div>
            <h1>SIG Hotel <span>Banda Aceh</span></h1>
            <p>Sistem Informasi Geografis untuk rekomendasi penginapan terbaik menggunakan metode MAUT dan rute terpendek A*.</p>
            <div class="mb-3">
                <span class="feature-pill">
                    <i class="ti ti-trophy"></i> Rekomendasi MAUT
                </span>
                <span class="feature-pill">
                    <i class="ti ti-route"></i> Rute A*
                </span>
                <span class="feature-pill">
                    <i class="ti ti-map-pin"></i> Peta Interaktif
                </span>
            </div>
            <div style="border-top: 1px solid rgba(255,255,255,0.15); padding-top: 1.5rem; margin-top: 1rem;">
                <p style="font-size:0.8rem; color:rgba(255,255,255,0.5); margin:0;">
                    Universitas Malikussaleh &mdash; Teknik Informatika &copy; {{ date('Y') }}
                </p>
            </div>
        </div>
    </div>

    {{-- Right Panel --}}
    <div class="login-right">
        <a href="{{ url('/') }}" class="back-link">
            <i class="ti ti-arrow-left"></i> Kembali ke Beranda
        </a>

        <div class="login-form-header">
            <h2>Selamat Datang 👋</h2>
            <p>Masuk ke dashboard admin untuk mengelola data penginapan dan rekomendasi.</p>
        </div>

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Alamat Email</label>
                <div class="input-icon-wrapper">
                    <input type="email" name="email"
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email') }}"
                        placeholder="admin@example.com"
                        autofocus>
                    <i class="ti ti-mail"></i>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <div class="input-icon-wrapper">
                    <input type="password" name="password"
                        class="form-control @error('password') is-invalid @enderror"
                        placeholder="Masukkan password">
                    <i class="ti ti-lock"></i>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-4 d-flex align-items-center justify-content-between">
                <label class="d-flex align-items-center gap-2 cursor-pointer mb-0" style="font-size:0.9rem;color:#374151;">
                    <input type="checkbox" name="remember" class="form-check-input mt-0">
                    Ingat saya
                </label>
            </div>

            <button type="submit" class="btn-login">
                <i class="ti ti-login me-2"></i> Masuk ke Dashboard
            </button>
        </form>
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/@tabler/core@latest/dist/js/tabler.min.js"></script>
</body>
</html>