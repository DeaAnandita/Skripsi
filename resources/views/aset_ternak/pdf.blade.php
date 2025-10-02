<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Report Aset Ternak</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #000; padding: 4px; text-align: left; }
        th { background-color: #f0f0f0; }
    </style>
</head>
<body>
    <h2>Laporan Aset Ternak</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Surveyor</th>
                <th>Nama Hewan</th>
                <th>Jenis Hewan</th>
                <th>Kategori</th>
                <th>Jumlah</th>
                <th>Luas Kandang</th>
                <th>Jenis Pakan</th>
                <th>Kondisi</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($asetTernaks as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->user->name ?? '-' }}</td>
                <td>{{ $item->namaHewan->nama ?? '-' }}</td>
                <td>{{ $item->jenisHewan->jenis ?? '-' }}</td>
                <td>{{ $item->kategori }}</td>
                <td>{{ $item->jumlah }}</td>
                <td>{{ $item->luas_kandang ?? '-' }}</td>
                <td>{{ $item->jenis_pakan ?? '-' }}</td>
                <td>{{ $item->kondisi ? 'Sehat' : 'Sakit' }}</td>
                <td>{{ $item->keterangan ?? '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
