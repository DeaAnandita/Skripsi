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
    <h3>Data Administrasi Pembangunan</h3>
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">Tambah Data</button>

    <!-- Table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Jenis Buku</th>
                <th>Judul</th>
                <th>Dokumen</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td>{{ $item->jenis_buku }}</td>
                <td>{{ $item->judul }}</td>
                <td>
                    @if ($item->dokumen)
                        <a href="{{ asset('storage/' . $item->dokumen) }}" target="_blank">Lihat</a>
                    @else -
                    @endif
                </td>
                <td>{{ $item->tanggal }}</td>
                <td>
                    <!-- Edit -->
                    <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">Edit</button>

                    <!-- Delete -->
                    <form action="{{ route('admin-pembangunan.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>

            <!-- Edit Modal -->
            <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1">
                <div class="modal-dialog">
                    <form action="{{ route('admin-pembangunan.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf @method('PUT')
                        <div class="modal-content">
                            <div class="modal-header"><h5>Edit Data</h5></div>
                            <div class="modal-body">
                                @include('admin_pembangunan.form', ['item' => $item])
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Create Modal -->
<div class="modal fade" id="createModal" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('admin-pembangunan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header"><h5>Tambah Data</h5></div>
                <div class="modal-body">
                    @include('admin_pembangunan.form')
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
