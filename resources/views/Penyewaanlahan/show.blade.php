<!DOCTYPE html>
<html>
<head>
    <title>Detail Penyewaan Lahan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Detail Penyewaan Lahan</h1>
        <div class="card">
            <div class="card-header">
                <h5>Informasi Penyewaan</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Nama Penyewa:</strong> {{ $penyewaan->nama_penyewa }}</p>
                        <p><strong>Lokasi Lahan:</strong> {{ $penyewaan->lokasi_lahan }}</p>
                        <p><strong>Luas Lahan:</strong> {{ $penyewaan->luas_lahan }} m²</p>
                        <p><strong>Jenis Aset:</strong> {{ $penyewaan->jenis_aset }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Tanggal Mulai:</strong> {{ $penyewaan->tanggal_mulai }}</p>
                        <p><strong>Tanggal Selesai:</strong> {{ $penyewaan->tanggal_selesai }}</p>
                        <p><strong>Biaya Sewa:</strong> Rp {{ number_format($penyewaan->biaya_sewa, 2) }}</p>
                        <p><strong>Status:</strong> {{ $penyewaan->status }}</p>
                    </div>
                </div>
                <p><strong>Dibuat Pada:</strong> {{ $penyewaan->created_at->format('d-m-Y H:i:s') }}</p>
                <p><strong>Diperbarui Pada:</strong> {{ $penyewaan->updated_at->format('d-m-Y H:i:s') }}</p>
            </div>
            <div class="card-footer">
                <a href="{{ route('penyewaan-lahan.index') }}" class="btn btn-secondary">Kembali</a>
                <a href="{{ route('penyewaan-lahan.edit', $penyewaan->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('penyewaan-lahan.destroy', $penyewaan->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>