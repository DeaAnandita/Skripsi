<!DOCTYPE html>
<html>
<head>
    <title>Laporan Usaha ART</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        h2 { text-align: center; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; font-weight: bold; }
        .text-center { text-align: center; }
    </style>
</head>
<body>
    <h2>Laporan Usaha ART</h2>
    <table>
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th>User</th>
                <th>Lapangan Usaha</th>
                <th>Omset/Bulan</th>
                <th>Pendapatan/Bulan</th>
                <th>Jumlah Pekerja</th>
                <th>Status Kerja</th>
                <th>Status Verifikasi</th>
                <th>Surveyor</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $index => $item)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $item->user->name ?? '-' }}</td>
                    <td>{{ $item->lapangan_usaha }}</td>
                    <td>{{ $item->omset_per_bulan }}</td>
                    <td>{{ $item->pendapatan_per_bulan }}</td>
                    <td>{{ $item->jumlah_pekerja }}</td>
                    <td>{{ $item->status_kedudukan_kerja }}</td>
                    <td>{{ $item->status_verifikasi }}</td>
                    <td>{{ $item->surveyor->name ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

