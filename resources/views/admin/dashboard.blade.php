@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
@endsection

@section('content')
    <div class="page-header">
        <div>
            <h4>Dashboard</h4>
            <p class="text-muted mb-0">Ringkasan data menu restoran Anda</p>
        </div>
        <a href="{{ route('admin.menus.create') }}" class="btn btn-primary-custom">
            <i class="bi bi-plus-circle me-1"></i> Tambah Menu Baru
        </a>
    </div>


    <div class="row g-4 mb-4">
        <div class="col-xl-4 col-md-6">
            <div class="stat-card">
                <div class="d-flex align-items-center gap-3">
                    <div class="stat-icon" style="background: rgba(230, 126, 34, 0.1); color: var(--primary);">
                        <i class="bi bi-card-list"></i>
                    </div>
                    <div>
                        <div class="stat-label">Total Keseluruhan Menu</div>
                        <div class="stat-number">{{ $totalMenu }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8 col-md-6">
            <div class="stat-card h-100">
                <div class="d-flex flex-wrap gap-4 align-items-center h-100">
                    <div class="stat-label mb-2 w-100"><i class="bi bi-tags-fill me-1"></i> Distribusi Kategori</div>
                    @foreach($kategoris as $kat)
                        <div class="d-flex align-items-center gap-2">
                            <div style="width: 12px; height: 12px; border-radius: 50%; background: var(--primary);"></div>
                            <span style="font-weight: 600; color: var(--secondary);">{{ $kat->kategori }}</span>
                            <span class="badge bg-light text-dark border">{{ $kat->total }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="table-card">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h6 class="mb-0 fw-bold" style="color: var(--secondary);">
                        <i class="bi bi-clock-history text-warning me-2"></i>5 Menu Terakhir Ditambahkan
                    </h6>
                    <a href="{{ route('admin.menus.index') }}" class="btn btn-sm btn-outline-secondary" style="border-radius: 50px;">
                        Lihat Semua
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>Menu</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Ditambahkan Pada</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($menuTerbaru as $menu)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            <img src="{{ asset('storage/' . $menu->gambar) }}" alt="{{ $menu->nama_menu }}"
                                                 style="width: 48px; height: 48px; object-fit: cover; border-radius: 8px;">
                                            <div>
                                                <div class="fw-bold" style="color: var(--secondary);">{{ $menu->nama_menu }}</div>
                                                <div style="font-size: 0.8rem; color: var(--text-muted);">{{ $menu->id_menu }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge" style="background: rgba(230, 126, 34, 0.1); color: var(--primary);">
                                            {{ $menu->kategori }}
                                        </span>
                                    </td>
                                    <td class="fw-bold text-success">
                                        Rp {{ number_format($menu->harga, 0, ',', '.') }}
                                    </td>
                                    <td style="font-size: 0.85rem; color: var(--text-muted);">
                                        {{ $menu->created_at->diffForHumans() }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-4 text-muted">Belum ada data menu.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
