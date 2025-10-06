<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Data Lembaga Desa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h2 {
            margin: 0;
            font-size: 16px;
        }
        .header p {
            margin: 5px 0;
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
            background-color: #f2f2f2;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 10px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>LAPORAN DATA LEMBAGA DESA</h2>
        <p>Desa Kaliwungu</p>
        <p>Tanggal Cetak: {{ date('d-m-Y H:i') }} WIB</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Jenis Lembaga</th>
                <th>Dusun</th>
                <th>Kepala Desa</th>
                <th>Sekretaris Desa</th>
                <th>Kaur Keuangan</th>
                <th>Kepala Dusun</th>
                <th>Ketua BPD</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_lembaga ?? '-' }}</td>
                    <td>{{ $item->dusun ?? '-' }}</td>
                    <td>
                        @php
                            $struktur = $item->struktur_jabatan ? json_decode($item->struktur_jabatan, true) : [];
                            $status = isset($struktur['Kepala Desa']) ? ($struktur['Kepala Desa'] > 0 ? 'Ya' : 'Tidak') : 'Lainnya';
                        @endphp
                        {{ $status }}
                    </td>
                    <td>
                        @php
                            $status = isset($struktur['Sekretaris Desa']) ? ($struktur['Sekretaris Desa'] > 0 ? 'Ya' : 'Tidak') : 'Lainnya';
                        @endphp
                        {{ $status }}
                    </td>
                    <td>
                        @php
                            $status = isset($struktur['Kaur Keuangan']) ? ($struktur['Kaur Keuangan'] > 0 ? 'Ya' : 'Tidak') : 'Lainnya';
                        @endphp
                        {{ $status }}
                    </td>
                    <td>
                        @php
                            $status = isset($struktur['Kepala Dusun']) ? ($struktur['Kepala Dusun'] > 0 ? 'Ya' : 'Tidak') : 'Lainnya';
                        @endphp
                        {{ $status }}
                    </td>
                    <td>
                        @php
                            $status = isset($struktur['Ketua BPD']) ? ($struktur['Ketua BPD'] > 0 ? 'Ya' : 'Tidak') : 'Lainnya';
                        @endphp
                        {{ $status }}
                    </td>
                    <td>{{ $item->keterangan ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <p>Cetakan ini dihasilkan oleh Sistem Informasi Desa Kaliwungu</p>
        <p>Jam: {{ date('H:i') }} WIB, Tanggal: {{ date('d-m-Y') }}</p>
    </div>
</body>
</html>