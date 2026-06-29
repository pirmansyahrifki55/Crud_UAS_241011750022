<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel') - Restoran Sunda Nusantara</title>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">


    <link href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css" rel="stylesheet">


    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

    <style>
        :root {
            --primary: #E67E22;
            --primary-dark: #D35400;
            --primary-light: #F39C12;
            --secondary: #2C3E50;
            --sidebar-bg: #1a252f;
            --sidebar-hover: #243342;
            --sidebar-active: rgba(230, 126, 34, 0.15);
            --bg-admin: #F0F2F5;
            --bg-card: #FFFFFF;
            --text-dark: #1a1a2e;
            --text-muted: #6c757d;
            --shadow-sm: 0 2px 8px rgba(0,0,0,0.06);
            --shadow-md: 0 4px 20px rgba(0,0,0,0.08);
            --shadow-lg: 0 8px 40px rgba(0,0,0,0.12);
            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 16px;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            --sidebar-width: 260px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--text-dark);
            background-color: var(--bg-admin);
            overflow-x: hidden;
        }

        /* Sidebar */
        .admin-sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: var(--sidebar-bg);
            z-index: 1040;
            transition: var(--transition);
            overflow-y: auto;
        }

        .sidebar-brand {
            padding: 1.5rem 1.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }

        .sidebar-brand a {
            color: #fff;
            text-decoration: none;
            font-size: 1.3rem;
            font-weight: 800;
            display: flex;
            align-items: center;
            gap: 0.6rem;
        }

        .sidebar-brand a i {
            color: var(--primary);
            font-size: 1.4rem;
        }

        .sidebar-menu {
            padding: 1rem 0;
        }

        .sidebar-label {
            padding: 0.8rem 1.5rem 0.4rem;
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: rgba(255,255,255,0.35);
            font-weight: 700;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            padding: 0.75rem 1.5rem;
            color: rgba(255,255,255,0.65);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: var(--transition);
            margin: 2px 0.8rem;
            border-radius: var(--radius-sm);
        }

        .sidebar-link:hover {
            color: #fff;
            background: var(--sidebar-hover);
        }

        .sidebar-link.active {
            color: var(--primary);
            background: var(--sidebar-active);
            font-weight: 700;
        }

        .sidebar-link i {
            font-size: 1.15rem;
            width: 20px;
            text-align: center;
        }

        .sidebar-link.logout-link {
            color: rgba(231, 76, 60, 0.8);
        }

        .sidebar-link.logout-link:hover {
            color: #E74C3C;
            background: rgba(231, 76, 60, 0.1);
        }

        /* Main Content */
        .admin-main {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            transition: var(--transition);
        }

        /* Top Navbar */
        .admin-topbar {
            background: var(--bg-card);
            padding: 0.8rem 2rem;
            box-shadow: var(--shadow-sm);
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 1030;
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .sidebar-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 1.3rem;
            color: var(--secondary);
            cursor: pointer;
            padding: 0.3rem;
        }

        .breadcrumb-custom {
            background: none;
            margin-bottom: 0;
            padding: 0;
            font-size: 0.85rem;
        }

        .breadcrumb-custom .breadcrumb-item a {
            color: var(--text-muted);
            text-decoration: none;
        }

        .breadcrumb-custom .breadcrumb-item.active {
            color: var(--secondary);
            font-weight: 600;
        }

        .topbar-right .admin-user {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            font-weight: 600;
            color: var(--secondary);
        }

        .admin-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.85rem;
        }

        /* Content Area */
        .admin-content {
            padding: 2rem;
        }

        /* Stat Cards */
        .stat-card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: 1.5rem;
            box-shadow: var(--shadow-sm);
            border: 1px solid rgba(0,0,0,0.04);
            transition: var(--transition);
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-md);
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 800;
            color: var(--secondary);
        }

        .stat-label {
            color: var(--text-muted);
            font-size: 0.85rem;
            font-weight: 500;
        }

        /* Tables */
        .table-card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: 1.5rem;
            box-shadow: var(--shadow-sm);
            border: 1px solid rgba(0,0,0,0.04);
        }

        .table-card .table {
            margin-bottom: 0;
        }

        .table-card .table th {
            background: var(--bg-admin);
            font-weight: 700;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: var(--text-muted);
            border: none;
            padding: 0.9rem 1rem;
        }

        .table-card .table td {
            padding: 0.8rem 1rem;
            vertical-align: middle;
            border-color: rgba(0,0,0,0.04);
            font-size: 0.9rem;
        }

        /* Form Styles */
        .form-card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: 2rem;
            box-shadow: var(--shadow-sm);
            border: 1px solid rgba(0,0,0,0.04);
        }

        .form-card .form-label {
            font-weight: 600;
            font-size: 0.9rem;
            color: var(--secondary);
            margin-bottom: 0.4rem;
        }

        .form-card .form-control,
        .form-card .form-select {
            border-radius: var(--radius-sm);
            border: 2px solid rgba(0,0,0,0.08);
            padding: 0.65rem 1rem;
            font-size: 0.9rem;
            transition: var(--transition);
        }

        .form-card .form-control:focus,
        .form-card .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(230, 126, 34, 0.1);
        }

        /* Buttons */
        .btn-primary-custom {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: #fff;
            border: none;
            font-weight: 600;
            padding: 0.6rem 1.5rem;
            border-radius: var(--radius-sm);
            transition: var(--transition);
        }

        .btn-primary-custom:hover {
            background: linear-gradient(135deg, var(--primary-dark), #c0392b);
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(230, 126, 34, 0.3);
        }

        /* Page Header */
        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .page-header h4 {
            font-weight: 800;
            color: var(--secondary);
            margin-bottom: 0;
        }

        /* Alert Flash */
        .alert-flash {
            border: none;
            border-radius: var(--radius-md);
            font-weight: 500;
            padding: 0.9rem 1.2rem;
        }

        /* Image Preview */
        .img-preview-wrapper {
            position: relative;
            display: inline-block;
        }

        .img-preview-wrapper img {
            border-radius: var(--radius-md);
            border: 2px solid rgba(0,0,0,0.08);
        }

        /* DataTables Override */
        .dataTables_wrapper .dataTables_filter input {
            border-radius: var(--radius-sm) !important;
            border: 2px solid rgba(0,0,0,0.08) !important;
            padding: 0.4rem 0.8rem !important;
        }

        .dataTables_wrapper .dataTables_filter input:focus {
            border-color: var(--primary) !important;
            box-shadow: 0 0 0 4px rgba(230, 126, 34, 0.1) !important;
            outline: none;
        }

        .dataTables_wrapper .dataTables_length select {
            border-radius: var(--radius-sm) !important;
            border: 2px solid rgba(0,0,0,0.08) !important;
            padding: 0.3rem 0.5rem !important;
        }

        /* Mobile Responsive */
        @media (max-width: 991px) {
            .admin-sidebar {
                transform: translateX(-100%);
            }

            .admin-sidebar.show {
                transform: translateX(0);
            }

            .admin-main {
                margin-left: 0;
            }

            .sidebar-toggle {
                display: block;
            }

            .sidebar-overlay {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: rgba(0,0,0,0.5);
                z-index: 1035;
                display: none;
            }

            .sidebar-overlay.show {
                display: block;
            }
        }

        @media (max-width: 576px) {
            .admin-content {
                padding: 1rem;
            }

            .admin-topbar {
                padding: 0.8rem 1rem;
            }
        }
    </style>

    @stack('styles')
</head>
<body>


    <div class="sidebar-overlay" id="sidebarOverlay"></div>


    <aside class="admin-sidebar" id="adminSidebar">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}">
                <i class="bi bi-fire"></i>
                <span>Sunda Nusantara</span>
            </a>
        </div>

        <div class="sidebar-menu">
            <div class="sidebar-label">Menu Utama</div>

            <a href="{{ route('admin.dashboard') }}"
               class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2"></i>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('admin.menus.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.menus.*') ? 'active' : '' }}">
                <i class="bi bi-grid-3x3-gap"></i>
                <span>Data Menu</span>
            </a>

            <div class="sidebar-label mt-3">Laporan</div>

            <a href="{{ route('admin.export.pdf') }}"
               class="sidebar-link">
                <i class="bi bi-file-earmark-pdf"></i>
                <span>Export PDF</span>
            </a>

            <div class="sidebar-label mt-3">Akun</div>

            <form action="{{ route('logout') }}" method="POST" id="logoutForm">
                @csrf
                <a href="#" class="sidebar-link logout-link"
                   onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">
                    <i class="bi bi-box-arrow-left"></i>
                    <span>Logout</span>
                </a>
            </form>
        </div>
    </aside>


    <div class="admin-main">

        <div class="admin-topbar">
            <div class="topbar-left">
                <button class="sidebar-toggle" id="sidebarToggle">
                    <i class="bi bi-list"></i>
                </button>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-custom mb-0">
                        @yield('breadcrumb')
                    </ol>
                </nav>
            </div>
            <div class="topbar-right">
                <div class="admin-user">
                    <div class="admin-avatar">
                        {{ strtoupper(substr(Auth::user()->username, 0, 1)) }}
                    </div>
                    <span class="d-none d-md-inline">{{ Auth::user()->username }}</span>
                </div>
            </div>
        </div>


        <div class="admin-content">
            @if(session('success'))
                <div class="alert alert-success alert-flash alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-flash alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>


    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Sidebar toggle for mobile
        const sidebarToggle = document.getElementById('sidebarToggle');
        const adminSidebar = document.getElementById('adminSidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');

        if (sidebarToggle) {
            sidebarToggle.addEventListener('click', function() {
                adminSidebar.classList.toggle('show');
                sidebarOverlay.classList.toggle('show');
            });
        }

        if (sidebarOverlay) {
            sidebarOverlay.addEventListener('click', function() {
                adminSidebar.classList.remove('show');
                sidebarOverlay.classList.remove('show');
            });
        }

        // Auto-dismiss alerts after 5 seconds
        setTimeout(function() {
            document.querySelectorAll('.alert-flash').forEach(function(el) {
                const bsAlert = new bootstrap.Alert(el);
                bsAlert.close();
            });
        }, 5000);
    </script>

    @stack('scripts')
</body>
</html>
