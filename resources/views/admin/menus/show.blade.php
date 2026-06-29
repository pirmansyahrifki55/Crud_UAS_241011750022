@extends('layouts.admin')

@section('title', 'Detail Menu')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.menus.index') }}">Data Menu</a></li>
    <li class="breadcrumb-item active" aria-current="page">Detail Menu</li>
@endsection

@section('content')
    <div class="page-header">
        <div>
            <h4>Detail Menu</h4>
            <p class="text-muted mb-0">Informasi lengkap menu: {{ $menu->nama_menu }}</p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.menus.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-1"></i> Kembali
            </a>
            <a href="{{ route('admin.menus.edit', $menu->id) }}" class="btn btn-outline-warning">
                <i class="bi bi-pencil-square me-1"></i> Edit Menu
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-8 col-lg-10">
            <div class="form-card">
                <div class="row g-4">
                    <div class="col-md-5 text-center text-md-start">
                        <img src="{{ asset('storage/' . $menu->gambar) }}" alt="{{ $menu->nama_menu }}" 
                             class="img-fluid rounded" style="width: 100%; max-width: 300px; height: auto; object-fit: cover; border: 3px solid rgba(0,0,0,0.05);">
                    </div>
                    <div class="col-md-7">
                        <div class="mb-3">
                            <span class="badge" style="background: rgba(230, 126, 34, 0.1); color: var(--primary); padding: 0.5rem 1rem;">
                                {{ $menu->kategori }}
                            </span>
                            <span class="ms-2 text-muted" style="font-size: 0.9rem; font-weight: 600;">
                                ID: {{ $menu->id_menu }}
                            </span>
                        </div>

                        <h2 class="fw-bold" style="color: var(--secondary);">{{ $menu->nama_menu }}</h2>
                        <h3 class="fw-bold text-success mb-4">Rp {{ number_format($menu->harga, 0, ',', '.') }}</h3>

                        <div class="mb-4">
                            <h6 class="fw-bold" style="color: var(--secondary);">Deskripsi:</h6>
                            <p style="color: var(--text-muted); line-height: 1.8;">{{ $menu->deskripsi }}</p>
                        </div>

                        <hr class="border-light">

                        <div class="text-muted" style="font-size: 0.85rem;">
                            <div><i class="bi bi-calendar-plus me-1"></i> Ditambahkan: {{ $menu->created_at->format('d M Y H:i') }}</div>
                            <div class="mt-1"><i class="bi bi-clock-history me-1"></i> Terakhir diubah: {{ $menu->updated_at->format('d M Y H:i') }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
