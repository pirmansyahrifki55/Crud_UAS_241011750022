@extends('layouts.admin')

@section('title', 'Edit Menu')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.menus.index') }}">Data Menu</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Menu</li>
@endsection

@section('content')
    <div class="page-header">
        <div>
            <h4>Edit Menu</h4>
            <p class="text-muted mb-0">Ubah detail data menu restoran</p>
        </div>
        <a href="{{ route('admin.menus.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
    </div>

    <div class="row">
        <div class="col-xl-8 col-lg-10">
            <div class="form-card">
                <form action="{{ route('admin.menus.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label for="id_menu" class="form-label">ID Menu <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('id_menu') is-invalid @enderror" 
                                   id="id_menu" name="id_menu" value="{{ old('id_menu', $menu->id_menu) }}" 
                                   placeholder="Contoh: MNU001">
                            @error('id_menu')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="kategori" class="form-label">Kategori <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('kategori') is-invalid @enderror" 
                                   id="kategori" name="kategori" value="{{ old('kategori', $menu->kategori) }}" 
                                   placeholder="Contoh: Makanan Utama" list="kategoriList">
                            <datalist id="kategoriList">
                                <option value="Makanan Utama">
                                <option value="Minuman">
                                <option value="Camilan">
                                <option value="Dessert">
                            </datalist>
                            @error('kategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="nama_menu" class="form-label">Nama Menu <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nama_menu') is-invalid @enderror" 
                               id="nama_menu" name="nama_menu" value="{{ old('nama_menu', $menu->nama_menu) }}">
                        @error('nama_menu')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga (Rp) <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('harga') is-invalid @enderror" 
                               id="harga" name="harga" value="{{ old('harga', intval($menu->harga)) }}" min="0">
                        @error('harga')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="deskripsi" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                                  id="deskripsi" name="deskripsi" rows="4">{{ old('deskripsi', $menu->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="gambar" class="form-label">Gambar Menu</label>
                        <input type="file" class="form-control @error('gambar') is-invalid @enderror" 
                               id="gambar" name="gambar" accept="image/jpeg,image/png,image/jpg" 
                               onchange="previewImage()">
                        <div class="form-text">Biarkan kosong jika tidak ingin mengubah gambar. Format: JPG, JPEG, PNG. Max: 2MB.</div>
                        @error('gambar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror


                        <div class="mt-3 img-preview-wrapper" id="imgPreviewWrapper">
                            <p class="mb-1 fw-bold text-muted" style="font-size: 0.8rem;">Preview:</p>
                            <img id="imgPreview" src="{{ asset('storage/' . $menu->gambar) }}" alt="Preview" 
                                 style="max-width: 200px; max-height: 200px; object-fit: cover;">
                        </div>
                    </div>

                    <hr class="mb-4 border-light">

                    <div class="d-flex justify-content-end gap-2">
                        <button type="submit" class="btn btn-primary-custom">
                            <i class="bi bi-save me-1"></i> Update Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    function previewImage() {
        const image = document.querySelector('#gambar');
        const imgPreviewWrapper = document.querySelector('#imgPreviewWrapper');
        const imgPreview = document.querySelector('#imgPreview');

        if (image.files && image.files[0]) {
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    }
</script>
@endpush
