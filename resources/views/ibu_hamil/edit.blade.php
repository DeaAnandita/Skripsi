<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Aset Keluarga
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
        <h2 class="mb-4">Edit Data Aset Keluarga</h2>

        <form action="{{ route('aset-keluarga.update', $item->id) }}" method="POST">
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

                 {{-- Nama Ibu Hamil --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700">Nama Ibu Hamil</label>
                    <input type="text" name="nama" value="{{ old('nama', $item->nama) }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>

                 {{-- NIK Ibu Hamil --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700">NIK Ibu Hamil</label>
                    <input type="text" name="nik" value="{{ old('nik', $item->nik) }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>

                {{-- Alamat Ibu Hamil --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700">Alamat Ibu Hamil</label>
                    <input type="text" name="alamat" value="{{ old('alamat', $item->alamat) }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>

                {{-- NO.HP Ibu Hamil --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700">NO.HP Ibu Hamil</label>
                    <input type="text" name="no_hp" value="{{ old('no_hp', $item->no_hp) }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>

                {{-- Status Ibu Hamil --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700">Status Ibu Hamil</label>
                    <input type="text" name="status_hamil" value="{{ old('status_hamil', $item->status_hamil) }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>

            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('aset-keluarga.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
