<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Bayi
        </h2>
    </x-slot>

    <style>
        .grid-container {
        display: grid;
        grid-template-columns: auto auto auto;
        gap: 10px;
        padding: 10px;
        }
        .grid-container > div {
        background-color: #f1f1f1;
        color: #000;
        padding: 10px;
        font-size: 30px;
        text-align: center;
        }
        </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
        <h2 class="mb-4">Edit Bayi</h2>

        <form action="{{ route('bayi.update', $item->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Pilih User --}}
            <div class="mb-3">
                <label for="user_id" class="form-label">Pilih User</label>
                <select name="user_id" id="user_id" class="form-control" required>
                    <option value="">-- Pilih User --</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $item->user_id == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

                 {{-- Nama Bayi --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700">Nama Bayi</label>
                    <input type="text" name="nama_bayi" value="{{ old('nama_bayi', $item->nama_bayi) }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>

                 {{-- Nama Bayi --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700">NIK Bayi</label>
                    <input type="text" name="nama_bayi" value="{{ old('nama_bayi', $item->nama_bayi) }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>

                {{-- Tanggal Lahir --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                    <input type="text" name="tgl_lahir" value="{{ old('tgl_lahir', $item->tgl_lahir) }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>

                {{-- Jenis Kelamin --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                    <input type="text" name="jenbis_kelamin" value="{{ old('jenis_kelamin', $item->jenis_kelamin) }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>

                {{-- Berat Badan --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700">Berat Badan</label>
                    <input type="text" name="berat_badan" value="{{ old('berat_badan', $item->berat_badan) }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>

                 {{-- Tinggi Badan --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700">Tinggi Badan</label>
                    <input type="text" name="tinggi_badan" value="{{ old('tinggi_badan', $item->tinggi_badan) }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>

            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('bayi.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
