<!DOCTYPE html>
<html>
<head>
    <title>Edit Penyewaan Lahan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Edit Penyewaan Lahan</h1>
        <form action="{{ route('penyewaan-lahan.update', $penyewaan->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Nama Penyewa</label>
                <input type="text" name="nama_penyewa" class="form-control" value="{{ old('nama_penyewa', $penyewaan->nama_penyewa) }}">
                @error('nama_penyewa') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Lokasi Lahan</label>
                <input type="text" name="lokasi_lahan" class="form-control" value="{{ old('lokasi_lahan', $penyewaan->lokasi_lahan) }}">
                @error('lokasi_lahan') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Luas Lahan (m²)</label>
                <input type="number" name="luas_lahan" step="0.01" class="form-control" value="{{ old('luas_lahan', $penyewaan->luas_lahan) }}">
                @error('luas_lahan') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Jenis Aset</label>
                <select name="jenis_aset" class="form-control">
                    <option value="ternak" {{ old('jenis_aset', $penyewaan->jenis_aset) == 'ternak' ? 'selected' : '' }}>Ternak</option>
                    <option value="perikanan" {{ old('jenis_aset', $penyewaan->jenis_aset) == 'perikanan' ? 'selected' : '' }}>Perikanan</option>
                </select>
                @error('jenis_aset') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Tanggal Mulai</label>
                <input type="date" name="tanggal_mulai" class="form-control" value="{{ old('tanggal_mulai', $penyewaan->tanggal_mulai) }}">
                @error('tanggal_mulai') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Tanggal Selesai</label>
                <input type="date" name="tanggal_selesai" class="form-control" value="{{ old('tanggal_selesai', $penyewaan->tanggal_selesai) }}">
                @error('tanggal_selesai') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Biaya Sewa (Rp)</label>
                <input type="number" name="biaya_sewa" step="0.01" class="form-control" value="{{ old('biaya_sewa', $penyewaan->biaya_sewa) }}">
                @error('biaya_sewa') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-control">
                    <option value="aktif" {{ old('status', $penyewaan->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="selesai" {{ old('status', $penyewaan->status) == 'selesai' ? 'selected' : '' }}>Selesai</option>
                    <option value="batal" {{ old('status', $penyewaan->status) == 'batal' ? 'selected' : '' }}>Batal</option>
                </select>
                @error('status') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('penyewaan-lahan.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>