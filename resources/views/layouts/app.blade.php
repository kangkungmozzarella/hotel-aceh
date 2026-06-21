<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <link rel="icon" type="image/svg+xml"
        href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><rect width='100' height='100' rx='20' fill='%230a2463'/><text y='72' x='50' text-anchor='middle' font-size='60' fill='%2364ffda'>📍</text></svg>">
    <title>@yield('title', 'Dashboard') - SIG Hotel Banda Aceh</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@latest/dist/css/tabler.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    <style>
        :root {
            --sidebar-width: 260px;
            --sidebar-bg: #0a2463;
            --sidebar-active: rgba(100, 255, 218, 0.12);
            --sidebar-active-text: #64ffda;
            --topbar-height: 64px;
        }

        body {
            background: #f0f4f8;
        }

        /* Topbar */
        .topbar {
            position: fixed;
            top: 0;
            left: var(--sidebar-width);
            right: 0;
            height: var(--topbar-height);
            background: #fff;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 1.5rem;
            z-index: 100;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.06);
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: var(--sidebar-width);
            background: var(--sidebar-bg);
            z-index: 200;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
        }

        .sidebar-brand {
            padding: 1.2rem 1.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }

        .sidebar-brand-icon {
            width: 36px;
            height: 36px;
            background: linear-gradient(135deg, #64ffda, #0097a7);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            color: #0a2463;
            flex-shrink: 0;
        }

        .sidebar-brand-text {
            font-weight: 800;
            color: #fff;
            font-size: 0.95rem;
            line-height: 1.2;
        }

        .sidebar-brand-text span {
            color: #64ffda;
        }

        .sidebar-section {
            padding: 1rem 0;
            flex: 1;
        }

        .sidebar-label {
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: rgba(255, 255, 255, 0.35);
            padding: 0.5rem 1.5rem 0.3rem;
            margin-top: 0.5rem;
        }

        .sidebar-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 1.5rem;
            color: rgba(255, 255, 255, 0.65);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.2s;
            border-left: 3px solid transparent;
            margin: 2px 0;
        }

        .sidebar-item:hover {
            background: rgba(255, 255, 255, 0.06);
            color: #fff;
        }

        .sidebar-item.active {
            background: var(--sidebar-active);
            color: var(--sidebar-active-text);
            border-left-color: #64ffda;
            font-weight: 600;
        }

        .sidebar-item i {
            font-size: 1.2rem;
            width: 22px;
            text-align: center;
            flex-shrink: 0;
        }

        .sidebar-footer {
            padding: 1rem 1.5rem;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
        }

        .sidebar-user {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sidebar-avatar {
            width: 36px;
            height: 36px;
            background: linear-gradient(135deg, #64ffda, #0097a7);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            color: #0a2463;
            font-size: 0.9rem;
            flex-shrink: 0;
        }

        .sidebar-user-info {
            flex: 1;
            min-width: 0;
        }

        .sidebar-user-name {
            color: #fff;
            font-weight: 600;
            font-size: 0.85rem;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .sidebar-user-role {
            color: rgba(255, 255, 255, 0.45);
            font-size: 0.75rem;
        }

        .sidebar-logout {
            color: rgba(255, 255, 255, 0.4);
            font-size: 1.1rem;
            text-decoration: none;
            transition: color 0.2s;
            flex-shrink: 0;
        }

        .sidebar-logout:hover {
            color: #ff6b6b;
        }

        /* Main content */
        .main-content {
            margin-left: var(--sidebar-width);
            padding-top: var(--topbar-height);
            min-height: 100vh;
        }

        .page-header {
            background: #fff;
            border-bottom: 1px solid #e5e7eb;
            padding: 1.2rem 1.5rem;
        }

        .page-header h2 {
            margin: 0;
            font-size: 1.3rem;
            font-weight: 800;
            color: #0a2463;
        }

        .breadcrumb-item {
            font-size: 0.85rem;
        }

        .page-body {
            padding: 1.5rem;
        }

        /* Cards */
        .stat-card {
            border: none;
            border-radius: 16px;
            padding: 1.5rem;
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: -20px;
            right: -20px;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            opacity: 0.1;
        }

        footer {
            background: #fff;
            border-top: 1px solid #e5e7eb;
            padding: 1rem 1.5rem;
            text-align: center;
            color: #9ca3af;
            font-size: 0.85rem;
        }

        /* Alert */
        .alert {
            border-radius: 12px;
            border: none;
        }
    </style>
    @stack('styles')
</head>

<body>

    {{-- Sidebar --}}
    <aside class="sidebar">
        <a href="{{ route('dashboard') }}" class="sidebar-brand">
            <div class="sidebar-brand-icon">
                <i class="ti ti-map-pin"></i>
            </div>
            <div class="sidebar-brand-text">
                SIG Hotel<br><span>Banda Aceh</span>
            </div>
        </a>

        <div class="sidebar-section">
            <div class="sidebar-label">Menu Utama</div>

            <a href="{{ route('dashboard') }}"
                class="sidebar-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="ti ti-layout-dashboard"></i>
                Dashboard
            </a>

            <div class="sidebar-label">Data Master</div>

            <a href="{{ route('hotels.index') }}"
                class="sidebar-item {{ request()->routeIs('hotels.*') ? 'active' : '' }}">
                <i class="ti ti-building"></i>
                Data Hotel
            </a>

            <a href="{{ route('criterias.index') }}"
                class="sidebar-item {{ request()->routeIs('criterias.*') ? 'active' : '' }}">
                <i class="ti ti-list-check"></i>
                Data Kriteria
            </a>

            <a href="{{ route('alternatives.index') }}"
                class="sidebar-item {{ request()->routeIs('alternatives.*') ? 'active' : '' }}">
                <i class="ti ti-table"></i>
                Data Alternatif
            </a>

            <a href="{{ route('matriks.index') }}"
                class="sidebar-item {{ request()->routeIs('matriks.*') ? 'active' : '' }}">
                <i class="ti ti-layout-grid"></i>
                Matriks Keputusan
            </a>

            <div class="sidebar-label">Sistem</div>

            <a href="{{ route('maut.index') }}"
                class="sidebar-item {{ request()->routeIs('maut.*') ? 'active' : '' }}">
                <i class="ti ti-calculator"></i>
                Perhitungan MAUT
            </a>

            <a href="{{ route('route.index') }}"
                class="sidebar-item {{ request()->routeIs('route.*') ? 'active' : '' }}">
                <i class="ti ti-map-2"></i>
                Rute Terpendek
            </a>

            <div class="sidebar-label">Manajemen Sistem</div>
            <a href="{{ route('tentang') }}" class="sidebar-item {{ request()->routeIs('tentang') ? 'active' : '' }}">
                <i class="ti ti-info-circle"></i>
                Tentang
            </a>

            <a href="{{ route('users.index') }}"
                class="sidebar-item {{ request()->routeIs('users.*') ? 'active' : '' }}">
                <i class="ti ti-users"></i>
                Manajemen User
            </a>
        </div>

        <div class="sidebar-footer">
            <div class="sidebar-user">
                <div class="sidebar-avatar">{{ substr(Auth::user()->name, 0, 1) }}</div>
                <div class="sidebar-user-info">
                    <div class="sidebar-user-name">{{ Auth::user()->name }}</div>
                    <div class="sidebar-user-role">Administrator</div>
                </div>
                <a href="{{ route('logout') }}" class="sidebar-logout" title="Logout"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="ti ti-logout"></i>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </aside>

    {{-- Topbar --}}
    <header class="topbar">
        <div>
            <h5 class="mb-0 fw-bold text-dark">@yield('page-title', 'Dashboard')</h5>
        </div>
        <div class="d-flex align-items-center gap-3">
            <span class="text-muted" style="font-size:0.85rem;">
                <i class="ti ti-calendar me-1"></i>
                {{ now()->translatedFormat('d F Y') }}
            </span>
        </div>
    </header>

    {{-- Main --}}
    <div class="main-content">
        <div class="page-body">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show shadow-sm mb-3" role="alert">
                    <i class="ti ti-circle-check me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show shadow-sm mb-3" role="alert">
                    <i class="ti ti-alert-circle me-2"></i>{{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>

        <footer>
            SIG Hotel Banda Aceh &copy; {{ date('Y') }} — Universitas Malikussaleh
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@tabler/core@latest/dist/js/tabler.min.js"></script>
    @stack('scripts')
</body>

</html>
