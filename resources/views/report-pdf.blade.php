<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Aset Keluarga</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #333; padding: 6px; text-align: left; }
        th { background: #f2f2f2; }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Laporan Aset Keluarga</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Nama Aset</th>
                <th>Kategori</th>
                <th>Nilai</th>
                <th>Tahun</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->user->name }}</td>
                    <td>{{ $row->nama_aset }}</td>
                    <td>{{ $row->kategori }}</td>
                    <td>{{ number_format($row->nilai_aset, 0, ',', '.') }}</td>
                    <td>{{ $row->tahun_perolehan }}</td>
                    <td>{{ $row->status_aset }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
