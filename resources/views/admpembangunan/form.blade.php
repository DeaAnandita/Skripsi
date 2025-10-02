<div class="mb-3">
    <label for="jenis_buku" class="form-label">Jenis Buku</label>
    <input type="text" name="jenis_buku" id="jenis_buku" class="form-control" 
           value="{{ old('jenis_buku', $item->jenis_buku ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="judul" class="form-label">Judul</label>
    <input type="text" name="judul" id="judul" class="form-control" 
           value="{{ old('judul', $item->judul ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="dokumen" class="form-label">Dokumen</label>
    <input type="file" name="dokumen" id="dokumen" class="form-control">
    @if (!empty($item->dokumen))
        <small class="text-muted">File saat ini: 
            <a href="{{ asset('storage/' . $item->dokumen) }}" target="_blank">Lihat</a>
        </small>
    @endif
</div>

<div class="mb-3">
    <label for="tanggal" class="form-label">Tanggal</label>
    <input type="date" name="tanggal" id="tanggal" class="form-control" 
           value="{{ old('tanggal', $item->tanggal ?? '') }}" required>
</div>
