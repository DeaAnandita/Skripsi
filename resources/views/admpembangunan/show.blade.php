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
    <h3>Detail Data Pembangunan</h3>
    <div class="card mt-3">
        <div class="card-body">
            <p><strong>Jenis Buku:</strong> {{ $item->jenis_buku }}</p>
            <p><strong>Judul:</strong> {{ $item->judul }}</p>
            <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</p>
            <p><strong>Dokumen:</strong>
                @if($item->dokumen)
                    <a href="{{ asset('storage/'.$item->dokumen) }}" target="_blank" class="btn btn-sm btn-primary">Lihat Dokumen</a>
                @else
                    <span class="text-muted">Tidak ada dokumen</span>
                @endif
            </p>
        </div>
    </div>
    <a href="{{ route('admpembangunan.report') }}" class="btn btn-secondary mt-3">Kembali ke Laporan</a>
</div>
@endsection
