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
    <h3>Tambah Data Administrasi Pembangunan</h3>

    {{-- Notifikasi error --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form Create --}}
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin-pembangunan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Panggil partial form --}}
                @include('admin_pembangunan.form')

                <div class="mt-3">
                    <a href="{{ route('admin-pembangunan.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
