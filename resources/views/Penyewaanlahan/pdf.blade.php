<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Laporan Penyewaan Lahan</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            margin: 20mm;
        }
        h1 {
            text-align: center;
            font-size: 16px;
            margin-bottom: 20px;
        }
        h3 {
            text-align: right;
            font-size: 10px;
            margin-bottom: 10px;
        }
        .summary {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .text-center {
            text-align: center;
        }
        .text-right {
            text-align: right;
        }
    </style>
</head>
<body>
    <h1>Laporan Penyewaan Lahan</h1>
    <h3>Dibuat pada: {{ now()->setTimezone('Asia/Jakarta')->format('d/m/Y H:i') }} WIB</h3>

    <!-- Ringkasan -->
    <div class="summary">
        <h3>Ringkasan</h3>
        <p>Total Biaya Sewa: <b>Rp {{ number_format($total_biaya, 2) }}</b></p>
        <p>Total Luas Lahan: <b>{{ number_format($total_luas, 2) }} m²</b></p>
        <p>Total Data: <b>{{ $penyewaan->count() }} penyewaan</b></p>
    </div>

    <!-- Tabel Detail -->
    <table>
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th>Nama Penyewa</th>
                <th>Lokasi</th>
                <th>Luas (m²)</th>
                <th>Jenis Aset</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th class="text-right">Biaya Sewa</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($penyewaan as $index => $item)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $item->nama_penyewa }}</td>
                    <td>{{ $item->lokasi_lahan }}</td>
                    <td>{{ $item->luas_lahan }}</td>
                    <td>{{ $item->jenis_aset }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d/m/Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal_selesai)->format('d/m/Y') }}</td>
                    <td class="text-right">Rp {{ number_format($item->biaya_sewa, 2) }}</td>
                    <td>{{ $item->status }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center">Tidak ada data penyewaan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>