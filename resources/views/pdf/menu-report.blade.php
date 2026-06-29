<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Data Menu - Restoran Sunda Nusantara</title>
    <style>
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            font-size: 12px;
            color: #333;
        }
        .header {
            text-align: center;
            border-bottom: 2px solid #E67E22;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #D35400;
            margin-bottom: 5px;
        }
        .subtitle {
            font-size: 14px;
            color: #666;
        }
        .report-info {
            margin-bottom: 15px;
        }
        .report-info p {
            margin: 2px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f8f9fa;
            font-weight: bold;
            color: #2C3E50;
            text-transform: uppercase;
            font-size: 11px;
        }
        tr:nth-child(even) {
            background-color: #fcfcfc;
        }
        .text-right {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .footer {
            margin-top: 30px;
            font-size: 10px;
            color: #999;
            text-align: center;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }
        .image-cell {
            text-align: center;
            padding: 5px;
        }
    </style>
</head>
<body>

    <div class="header">
        <div class="logo">RESTORAN NUSANTARA</div>
        <div class="subtitle">Laporan Lengkap Data Menu Masakan & Minuman</div>
    </div>

    <div class="report-info">
        <table style="width: 100%; border: none;">
            <tr>
                <td style="border: none; padding: 0;">
                    <p><strong>Tanggal Cetak:</strong> {{ $tanggal }}</p>
                    <p><strong>Total Menu:</strong> {{ $menus->count() }} Item</p>
                </td>
            </tr>
        </table>
    </div>

    <table>
        <thead>
            <tr>
                <th width="5%" class="text-center">No</th>
                <th width="12%">Gambar</th>
                <th width="12%">ID Menu</th>
                <th width="20%">Nama Menu</th>
                <th width="15%">Kategori</th>
                <th width="13%" class="text-right">Harga</th>
                <th width="23%">Deskripsi Singkat</th>
            </tr>
        </thead>
        <tbody>
            @forelse($menus as $index => $menu)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td class="image-cell">
                        @php
                            $path = storage_path('app/public/' . $menu->gambar);
                            $type = pathinfo($path, PATHINFO_EXTENSION);
                            $data = file_exists($path) ? file_get_contents($path) : '';
                            $base64 = $data ? 'data:image/' . $type . ';base64,' . base64_encode($data) : '';
                        @endphp
                        @if($base64)
                            <img src="{{ $base64 }}" alt="Gambar" style="width: 50px; height: 50px; object-fit: cover;">
                        @else
                            <span style="font-size: 9px; color: #999;">No Image</span>
                        @endif
                    </td>
                    <td><strong>{{ $menu->id_menu }}</strong></td>
                    <td>{{ $menu->nama_menu }}</td>
                    <td>{{ $menu->kategori }}</td>
                    <td class="text-right">Rp {{ number_format($menu->harga, 0, ',', '.') }}</td>
                    <td style="font-size: 10px;">{{ Str::limit($menu->deskripsi, 50) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Belum ada data menu.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        Dicetak pada {{ now()->format('d/m/Y H:i') }} oleh Admin Sistem Restoran Sunda Nusantara.<br>
        Dokumen ini dihasilkan secara otomatis oleh sistem.
    </div>

</body>
</html>
