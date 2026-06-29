@extends('layouts.guest')

@section('title', $menu->nama_menu . ' - Restoran Sunda Nusantara')

@section('content')

    <div style="padding-top: 90px;"></div>

    <section class="py-5">
        <div class="container">

            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb" style="font-size: 0.9rem;">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" style="color: var(--primary); text-decoration: none;">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('home') }}#menu" style="color: var(--primary); text-decoration: none;">Menu</a></li>
                    <li class="breadcrumb-item active fw-semibold">{{ $menu->nama_menu }}</li>
                </ol>
            </nav>

            <div class="row g-5">

                <div class="col-lg-6 animate-fade-in-up">
                    <div style="border-radius: var(--radius-xl); overflow: hidden; box-shadow: var(--shadow-lg);">
                        <img src="{{ asset('storage/' . $menu->gambar) }}"
                             alt="{{ $menu->nama_menu }}"
                             class="w-100"
                             style="height: 450px; object-fit: cover;">
                    </div>
                </div>


                <div class="col-lg-6 animate-fade-in-up animate-delay-2">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <span style="background: rgba(230, 126, 34, 0.1); color: var(--primary); padding: 0.4rem 1rem; border-radius: 50px; font-size: 0.85rem; font-weight: 700;">
                            <i class="bi bi-tag-fill"></i> {{ $menu->kategori }}
                        </span>
                        <span style="background: rgba(44, 62, 80, 0.08); color: var(--secondary); padding: 0.4rem 1rem; border-radius: 50px; font-size: 0.85rem; font-weight: 600;">
                            {{ $menu->id_menu }}
                        </span>
                    </div>

                    <h1 style="font-size: 2.2rem; font-weight: 800; color: var(--secondary); margin-bottom: 1rem;">
                        {{ $menu->nama_menu }}
                    </h1>

                    <div style="font-size: 2.5rem; font-weight: 800; color: var(--primary); margin-bottom: 1.5rem;">
                        Rp {{ number_format($menu->harga, 0, ',', '.') }}
                    </div>

                    <div style="background: var(--bg-card); border-radius: var(--radius-lg); padding: 1.5rem; box-shadow: var(--shadow-sm); border: 1px solid rgba(0,0,0,0.04); margin-bottom: 1.5rem;">
                        <h6 style="font-weight: 700; color: var(--secondary); margin-bottom: 0.8rem;">
                            <i class="bi bi-journal-text text-warning"></i> Deskripsi
                        </h6>
                        <p style="color: var(--text-muted); line-height: 1.9; margin-bottom: 0; font-size: 0.95rem;">
                            {{ $menu->deskripsi }}
                        </p>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-4">
                            <div style="background: rgba(230, 126, 34, 0.06); border-radius: var(--radius-md); padding: 1rem; text-align: center;">
                                <i class="bi bi-clock" style="font-size: 1.5rem; color: var(--primary);"></i>
                                <div style="font-size: 0.8rem; color: var(--text-muted); margin-top: 0.3rem;">15-20 menit</div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div style="background: rgba(46, 204, 113, 0.06); border-radius: var(--radius-md); padding: 1rem; text-align: center;">
                                <i class="bi bi-fire" style="font-size: 1.5rem; color: #2ecc71;"></i>
                                <div style="font-size: 0.8rem; color: var(--text-muted); margin-top: 0.3rem;">Fresh</div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div style="background: rgba(155, 89, 182, 0.06); border-radius: var(--radius-md); padding: 1rem; text-align: center;">
                                <i class="bi bi-star-fill" style="font-size: 1.5rem; color: #9b59b6;"></i>
                                <div style="font-size: 0.8rem; color: var(--text-muted); margin-top: 0.3rem;">Best Seller</div>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('home') }}#menu" class="btn-hero" style="font-size: 0.9rem; padding: 0.7rem 1.8rem;">
                        <i class="bi bi-arrow-left"></i> Kembali ke Menu
                    </a>
                </div>
            </div>


            @if($relatedMenus->count() > 0)
                <div class="mt-5 pt-4">
                    <h3 style="font-weight: 800; color: var(--secondary); margin-bottom: 1.5rem;">
                        <i class="bi bi-grid-3x3-gap text-warning"></i> Menu Serupa
                    </h3>
                    <div class="row g-4">
                        @foreach($relatedMenus as $related)
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="menu-card">
                                    <div class="menu-card-img-wrapper">
                                        <img src="{{ asset('storage/' . $related->gambar) }}"
                                             alt="{{ $related->nama_menu }}"
                                             class="menu-card-img"
                                             loading="lazy">
                                        <span class="menu-card-badge">{{ $related->kategori }}</span>
                                    </div>
                                    <div class="menu-card-body">
                                        <h5 class="menu-card-title">{{ $related->nama_menu }}</h5>
                                        <p class="menu-card-desc">{{ $related->deskripsi }}</p>
                                    </div>
                                    <div class="menu-card-footer">
                                        <span class="menu-card-price">Rp {{ number_format($related->harga, 0, ',', '.') }}</span>
                                        <a href="{{ route('menu.detail', $related->id_menu) }}" class="btn-detail">
                                            Detail <i class="bi bi-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>

@endsection
