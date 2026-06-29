@extends('layouts.guest')

@section('title', 'Restoran Sunda Nusantara - Sajian Autentik Indonesia')

@section('content')


    <section class="hero-section">
        <div class="container position-relative">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="animate-fade-in-up">
                        <div class="hero-badge">
                            <i class="bi bi-star-fill"></i> Restoran Terbaik 2026
                        </div>
                    </div>
                    <h1 class="hero-title animate-fade-in-up animate-delay-1">
                        Rasakan <span>Cita Rasa</span> Autentik Sunda Nusantara
                    </h1>
                    <p class="hero-subtitle animate-fade-in-up animate-delay-2">
                        Nikmati sajian masakan Indonesia terbaik yang dibuat dari bahan-bahan segar pilihan
                        dengan resep tradisional turun-temurun.
                    </p>
                    <div class="animate-fade-in-up animate-delay-3">
                        <a href="#menu" class="btn-hero">
                            <i class="bi bi-grid-3x3-gap"></i> Lihat Menu Kami
                        </a>
                    </div>
                    <div class="hero-stats animate-fade-in-up animate-delay-4">
                        <div>
                            <div class="hero-stat-number">{{ $menus->total() }}+</div>
                            <div class="hero-stat-label">Menu Tersedia</div>
                        </div>
                        <div>
                            <div class="hero-stat-number">4.9</div>
                            <div class="hero-stat-label">Rating</div>
                        </div>
                        <div>
                            <div class="hero-stat-number">10K+</div>
                            <div class="hero-stat-label">Pelanggan</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-image-wrapper animate-fade-in-up animate-delay-2">
                        <div class="hero-image-card">
                            <div class="hero-food-grid">
                                <div class="hero-food-item">
                                    <span class="emoji">🍛</span>
                                    <span class="label">Nasi Goreng</span>
                                </div>
                                <div class="hero-food-item">
                                    <span class="emoji">🍗</span>
                                    <span class="label">Ayam Bakar</span>
                                </div>
                                <div class="hero-food-item">
                                    <span class="emoji">🥘</span>
                                    <span class="label">Rendang</span>
                                </div>
                                <div class="hero-food-item">
                                    <span class="emoji">🧃</span>
                                    <span class="label">Minuman Segar</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="py-5" id="menu">
        <div class="container">

            <div class="text-center mb-4">
                <h2 class="section-title">Menu Spesial Kami</h2>
                <p class="section-subtitle mx-auto">Jelajahi berbagai pilihan menu lezat yang kami sajikan dengan penuh cinta</p>
            </div>


            <div class="row g-3 mb-4 justify-content-center">
                <div class="col-lg-5 col-md-6">
                    <form action="{{ route('home') }}" method="GET" id="searchForm">
                        <div class="search-wrapper">
                            <i class="bi bi-search search-icon"></i>
                            <input type="text" class="form-control" name="search"
                                   placeholder="Cari menu favorit Anda..."
                                   value="{{ request('search') }}"
                                   id="searchInput">
                        </div>
                    </form>
                </div>
                <div class="col-lg-5 col-md-6">
                    <div class="d-flex gap-2 flex-wrap justify-content-center">
                        <a href="{{ route('home') }}"
                           class="filter-pill {{ !request('kategori') ? 'active' : '' }}">
                            Semua
                        </a>
                        @foreach($kategoris as $kat)
                            <a href="{{ route('home', ['kategori' => $kat]) }}"
                               class="filter-pill {{ request('kategori') == $kat ? 'active' : '' }}">
                                {{ $kat }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>


            @if($menus->count() > 0)
                <div class="row g-4">
                    @foreach($menus as $index => $menu)
                        <div class="col-xl-3 col-lg-4 col-md-6 animate-fade-in-up animate-delay-{{ ($index % 4) + 1 }}">
                            <div class="menu-card">
                                <div class="menu-card-img-wrapper">
                                    <img src="{{ asset('storage/' . $menu->gambar) }}"
                                         alt="{{ $menu->nama_menu }}"
                                         class="menu-card-img"
                                         loading="lazy">
                                    <span class="menu-card-badge">{{ $menu->kategori }}</span>
                                </div>
                                <div class="menu-card-body">
                                    <h5 class="menu-card-title">{{ $menu->nama_menu }}</h5>
                                    <p class="menu-card-desc">{{ $menu->deskripsi }}</p>
                                </div>
                                <div class="menu-card-footer">
                                    <span class="menu-card-price">Rp {{ number_format($menu->harga, 0, ',', '.') }}</span>
                                    <a href="{{ route('menu.detail', $menu->id_menu) }}" class="btn-detail">
                                        Detail <i class="bi bi-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>


                <div class="d-flex justify-content-center mt-5">
                    {{ $menus->appends(request()->query())->links() }}
                </div>
            @else
                <div class="text-center py-5">
                    <i class="bi bi-search" style="font-size: 3rem; color: var(--text-muted);"></i>
                    <h5 class="mt-3 text-muted">Menu tidak ditemukan</h5>
                    <p class="text-muted">Coba cari dengan kata kunci lain</p>
                    <a href="{{ route('home') }}" class="btn btn-outline-secondary mt-2">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>
            @endif
        </div>
    </section>

@endsection

@push('scripts')
<script>
    // Debounced search
    let searchTimeout;
    document.getElementById('searchInput').addEventListener('input', function() {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(function() {
            document.getElementById('searchForm').submit();
        }, 600);
    });
</script>
@endpush
