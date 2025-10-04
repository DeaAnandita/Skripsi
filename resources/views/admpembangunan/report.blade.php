<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<div class="container">
    <h3>Laporan Data Pembangunan</h3>
    <table class="table table-bordered mt-3">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Jenis Buku</th>
                <th>Judul</th>
                <th>Tanggal</th>
                <th>Dokumen</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $i => $item)
            <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $item->jenis_buku }}</td>
                <td>{{ $item->judul }}</td>
                <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                <td>
                    @if($item->dokumen)
                        <a href="{{ asset('storage/'.$item->dokumen) }}" target="_blank" class="btn btn-sm btn-success">Lihat</a>
                    @else
                        <span class="text-muted">-</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admpembangunan.show', $item->id) }}" class="btn btn-info btn-sm">Detail</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
