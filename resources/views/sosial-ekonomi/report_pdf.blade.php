<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Laporan Data Sosial Ekonomi</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; font-weight: bold; }
        h2 { text-align: center; margin-bottom: 20px; }
    </style>
</head>
<body>
    <h2>Laporan Data Sosial Ekonomi</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Surveyor</th>
                <th>Lapangan Usaha</th>
                <th>Nama Usaha</th>
                <th>Jumlah Pekerja</th>
                <th>Memiliki Tempat Usaha</th>
                <th>Omset Usaha/Bulan</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($sosialEkonomi as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->user->name ?? '-' }}</td>
                    <td>{{ $item->lapangan_usaha ?? '-' }}</td>
                    <td>{{ $item->nama_usaha ?? '-' }}</td>
                    <td>{{ $item->jumlah_pekerja ?? '-' }}</td>
                    <td>{{ $item->memiliki_tempat_usaha ?? '-' }}</td>
                    <td>{{ $item->omset_usaha_bulan ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align: center;">Tidak ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>