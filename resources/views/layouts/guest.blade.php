<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Restoran Sunda Nusantara - Sajian Autentik Indonesia Terbaik">
    <title>@yield('title', 'Restoran Sunda Nusantara')</title>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        :root {
            --primary: #E67E22;
            --primary-dark: #D35400;
            --primary-light: #F39C12;
            --secondary: #2C3E50;
            --accent: #E74C3C;
            --bg-warm: #FFF8F0;
            --bg-card: #FFFFFF;
            --text-dark: #1a1a2e;
            --text-muted: #6c757d;
            --shadow-sm: 0 2px 8px rgba(0,0,0,0.06);
            --shadow-md: 0 4px 20px rgba(0,0,0,0.08);
            --shadow-lg: 0 8px 40px rgba(0,0,0,0.12);
            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 16px;
            --radius-xl: 24px;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--text-dark);
            background-color: var(--bg-warm);
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* Navbar */
        .navbar-guest {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            box-shadow: var(--shadow-sm);
            padding: 0.8rem 0;
            transition: var(--transition);
        }

        .navbar-guest.scrolled {
            box-shadow: var(--shadow-md);
            padding: 0.5rem 0;
        }

        .navbar-brand-custom {
            font-weight: 800;
            font-size: 1.5rem;
            color: var(--primary) !important;
            letter-spacing: -0.5px;
        }

        .navbar-brand-custom i {
            color: var(--accent);
        }

        .nav-link-custom {
            font-weight: 600;
            color: var(--secondary) !important;
            padding: 0.5rem 1rem !important;
            border-radius: var(--radius-sm);
            transition: var(--transition);
            position: relative;
        }

        .nav-link-custom:hover,
        .nav-link-custom.active {
            color: var(--primary) !important;
            background: rgba(230, 126, 34, 0.08);
        }

        .btn-login-nav {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: #fff !important;
            font-weight: 600;
            padding: 0.5rem 1.5rem !important;
            border-radius: 50px;
            border: none;
            transition: var(--transition);
        }

        .btn-login-nav:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(230, 126, 34, 0.4);
            color: #fff !important;
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, var(--secondary) 0%, #1a252f 100%);
            min-height: 85vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(230, 126, 34, 0.15);
            color: var(--primary-light);
            padding: 0.5rem 1.2rem;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            border: 1px solid rgba(230, 126, 34, 0.25);
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            color: #fff;
            line-height: 1.15;
            margin-bottom: 1.5rem;
            letter-spacing: -1px;
        }

        .hero-title span {
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-subtitle {
            font-size: 1.15rem;
            color: rgba(255,255,255,0.7);
            max-width: 540px;
            margin-bottom: 2rem;
            line-height: 1.8;
        }

        .btn-hero {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: #fff;
            font-weight: 700;
            padding: 0.9rem 2.2rem;
            border-radius: 50px;
            border: none;
            font-size: 1rem;
            transition: var(--transition);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-hero:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(230, 126, 34, 0.4);
            color: #fff;
        }

        .hero-stats {
            display: flex;
            gap: 2.5rem;
            margin-top: 3rem;
        }

        .hero-stat-number {
            font-size: 2rem;
            font-weight: 800;
            color: var(--primary-light);
        }

        .hero-stat-label {
            font-size: 0.85rem;
            color: rgba(255,255,255,0.5);
            font-weight: 500;
        }

        .hero-image-wrapper {
            position: relative;
        }

        .hero-image-card {
            background: rgba(255,255,255,0.08);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: var(--radius-xl);
            padding: 2rem;
            backdrop-filter: blur(10px);
        }

        .hero-emoji {
            font-size: 5rem;
            display: block;
            text-align: center;
            margin-bottom: 1rem;
        }

        .hero-food-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
        }

        .hero-food-item {
            background: rgba(255,255,255,0.06);
            border-radius: var(--radius-md);
            padding: 1.2rem;
            text-align: center;
            border: 1px solid rgba(255,255,255,0.08);
            transition: var(--transition);
        }

        .hero-food-item:hover {
            background: rgba(255,255,255,0.1);
            transform: translateY(-3px);
        }

        .hero-food-item .emoji {
            font-size: 2.5rem;
            display: block;
            margin-bottom: 0.5rem;
        }

        .hero-food-item .label {
            color: rgba(255,255,255,0.8);
            font-size: 0.8rem;
            font-weight: 600;
        }

        /* Menu Section */
        .section-title {
            font-size: 2.2rem;
            font-weight: 800;
            color: var(--secondary);
            letter-spacing: -0.5px;
        }

        .section-subtitle {
            color: var(--text-muted);
            font-size: 1rem;
            max-width: 500px;
        }

        /* Menu Cards */
        .menu-card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
            border: 1px solid rgba(0,0,0,0.04);
            height: 100%;
        }

        .menu-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-lg);
        }

        .menu-card-img-wrapper {
            position: relative;
            overflow: hidden;
            height: 200px;
        }

        .menu-card-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .menu-card:hover .menu-card-img {
            transform: scale(1.08);
        }

        .menu-card-badge {
            position: absolute;
            top: 12px;
            left: 12px;
            background: rgba(255,255,255,0.95);
            color: var(--primary);
            padding: 0.3rem 0.8rem;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 700;
            backdrop-filter: blur(10px);
        }

        .menu-card-body {
            padding: 1.2rem 1.5rem;
        }

        .menu-card-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--secondary);
            margin-bottom: 0.3rem;
        }

        .menu-card-desc {
            font-size: 0.85rem;
            color: var(--text-muted);
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            margin-bottom: 1rem;
            line-height: 1.6;
        }

        .menu-card-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 1.5rem 1.2rem;
        }

        .menu-card-price {
            font-size: 1.2rem;
            font-weight: 800;
            color: var(--primary);
        }

        .btn-detail {
            background: rgba(230, 126, 34, 0.1);
            color: var(--primary);
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.8rem;
            transition: var(--transition);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
        }

        .btn-detail:hover {
            background: var(--primary);
            color: #fff;
        }

        /* Search Bar */
        .search-wrapper {
            position: relative;
        }

        .search-wrapper .form-control {
            border-radius: 50px;
            padding: 0.75rem 1.2rem 0.75rem 3rem;
            border: 2px solid rgba(0,0,0,0.06);
            font-size: 0.95rem;
            background: #fff;
            transition: var(--transition);
        }

        .search-wrapper .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(230, 126, 34, 0.1);
        }

        .search-wrapper .search-icon {
            position: absolute;
            left: 1.1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
        }

        /* Filter Pills */
        .filter-pill {
            background: #fff;
            color: var(--secondary);
            border: 2px solid rgba(0,0,0,0.06);
            padding: 0.5rem 1.2rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.85rem;
            transition: var(--transition);
            cursor: pointer;
            text-decoration: none;
        }

        .filter-pill:hover,
        .filter-pill.active {
            background: var(--primary);
            color: #fff;
            border-color: var(--primary);
        }

        /* Footer */
        .footer-section {
            background: var(--secondary);
            color: rgba(255,255,255,0.7);
            padding: 3rem 0 1.5rem;
        }

        .footer-brand {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--primary-light);
            margin-bottom: 0.5rem;
        }

        .footer-links a {
            color: rgba(255,255,255,0.6);
            text-decoration: none;
            transition: var(--transition);
            font-size: 0.9rem;
        }

        .footer-links a:hover {
            color: var(--primary-light);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 1.5rem;
            margin-top: 2rem;
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease-out forwards;
        }

        .animate-delay-1 { animation-delay: 0.1s; }
        .animate-delay-2 { animation-delay: 0.2s; }
        .animate-delay-3 { animation-delay: 0.3s; }
        .animate-delay-4 { animation-delay: 0.4s; }

        /* Pagination */
        .pagination .page-link {
            border-radius: var(--radius-sm);
            margin: 0 3px;
            border: none;
            color: var(--secondary);
            font-weight: 600;
            padding: 0.5rem 0.9rem;
            transition: var(--transition);
        }

        .pagination .page-link:hover {
            background: rgba(230, 126, 34, 0.1);
            color: var(--primary);
        }

        .pagination .page-item.active .page-link {
            background: var(--primary);
            border-color: var(--primary);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.2rem;
            }
            .hero-stats {
                gap: 1.5rem;
            }
            .hero-stat-number {
                font-size: 1.5rem;
            }
            .section-title {
                font-size: 1.6rem;
            }
        }
    </style>

    @stack('styles')
</head>
<body>


    <nav class="navbar navbar-expand-lg navbar-guest fixed-top" id="mainNavbar">
        <div class="container">
            <a class="navbar-brand navbar-brand-custom" href="{{ route('home') }}">
                <i class="bi bi-fire"></i> Sunda Nusantara
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center gap-1">
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                            <i class="bi bi-house-door"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom" href="{{ route('home') }}#menu">
                            <i class="bi bi-grid"></i> Menu
                        </a>
                    </li>
                    <li class="nav-item ms-2">
                        @auth
                            <a class="btn btn-login-nav" href="{{ route('admin.dashboard') }}">
                                <i class="bi bi-speedometer2"></i> Dashboard
                            </a>
                        @else
                            <a class="btn btn-login-nav" href="{{ route('login') }}">
                                <i class="bi bi-box-arrow-in-right"></i> Login Admin
                            </a>
                        @endauth
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <main>
        @yield('content')
    </main>


    <footer class="footer-section">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="footer-brand"><i class="bi bi-fire"></i> Sunda Nusantara</div>
                    <p class="mb-0" style="font-size:0.9rem;">Menyajikan cita rasa autentik masakan Indonesia dengan bahan-bahan segar berkualitas tinggi.</p>
                </div>
                <div class="col-lg-4">
                    <h6 class="text-white fw-bold mb-3">Navigasi</h6>
                    <div class="footer-links d-flex flex-column gap-2">
                        <a href="{{ route('home') }}"><i class="bi bi-chevron-right"></i> Home</a>
                        <a href="{{ route('home') }}#menu"><i class="bi bi-chevron-right"></i> Menu</a>
                        <a href="{{ route('login') }}"><i class="bi bi-chevron-right"></i> Login Admin</a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <h6 class="text-white fw-bold mb-3">Kontak</h6>
                    <div class="footer-links d-flex flex-column gap-2">
                        <span><i class="bi bi-geo-alt-fill text-warning"></i> Jl. Sunda Nusantara No. 123, Jakarta</span>
                        <span><i class="bi bi-telephone-fill text-warning"></i> +62 812-3456-7890</span>
                        <span><i class="bi bi-envelope-fill text-warning"></i> info@nusantara.com</span>
                    </div>
                </div>
            </div>
            <div class="footer-bottom text-center">
                <small>&copy; {{ date('Y') }} Restoran Sunda Nusantara. Dibuat oleh <strong>Rifki Firmansyah - 241011750022</strong></small>
            </div>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('mainNavbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    </script>

    @stack('scripts')
</body>
</html>
