<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Jenis Surat') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 shadow rounded">
            <form action="{{ route('jenis-surat.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block mb-1">Nama Jenis</label>
                    <input type="text" name="nama_jenis" class="w-full border rounded px-3 py-2"
                           value="{{ old('nama_jenis') }}" required>
                </div>
                <div>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
                    <a href="{{ route('jenis-surat.index') }}" class="ml-2 text-gray-600">Batal</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
