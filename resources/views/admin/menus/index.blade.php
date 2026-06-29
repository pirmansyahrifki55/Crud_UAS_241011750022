@extends('layouts.admin')

@section('title', 'Data Menu')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data Menu</li>
@endsection

@section('content')
    <div class="page-header">
        <div>
            <h4>Data Menu</h4>
            <p class="text-muted mb-0">Kelola seluruh daftar menu restoran Anda</p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.export.pdf') }}" class="btn btn-outline-danger">
                <i class="bi bi-file-earmark-pdf me-1"></i> Export PDF
            </a>
            <a href="{{ route('admin.menus.create') }}" class="btn btn-primary-custom">
                <i class="bi bi-plus-circle me-1"></i> Tambah Menu
            </a>
        </div>
    </div>

    <div class="table-card">
        <div class="table-responsive">
            <table class="table table-hover table-striped align-middle" id="menusTable" style="width: 100%">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th width="12%">Gambar</th>
                        <th width="15%">ID Menu</th>
                        <th width="25%">Nama Menu</th>
                        <th width="15%">Kategori</th>
                        <th width="15%">Harga</th>
                        <th width="13%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        let table = $('#menusTable').DataTable({
            processing: true,
            serverSide: true,
            lengthMenu: [[3, 5, 10, -1], [3, 5, 10, "Semua"]],
            ajax: "{{ route('admin.menus.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'gambar_preview', name: 'gambar', orderable: false, searchable: false},
                {data: 'id_menu', name: 'id_menu'},
                {data: 'nama_menu', name: 'nama_menu'},
                {data: 'kategori', name: 'kategori'},
                {data: 'harga_format', name: 'harga'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.13.8/i18n/id.json',
            }
        });

        // SweetAlert2 for Delete
        $('#menusTable').on('click', '.btn-delete', function() {
            let id = $(this).data('id');
            let name = $(this).data('name');
            let url = "{{ route('admin.menus.destroy', ':id') }}".replace(':id', id);

            Swal.fire({
                title: 'Apakah Anda yakin?',
                html: `Menu <strong>${name}</strong> akan dihapus permanen!`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            if(response.success) {
                                Swal.fire(
                                    'Terhapus!',
                                    response.message,
                                    'success'
                                );
                                table.ajax.reload();
                            }
                        },
                        error: function() {
                            Swal.fire(
                                'Gagal!',
                                'Terjadi kesalahan saat menghapus data.',
                                'error'
                            );
                        }
                    });
                }
            });
        });
    });
</script>
@endpush
