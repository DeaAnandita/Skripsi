<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Buat Surat Baru</h2>
    </x-slot>

    <div class="py-6 max-w-3xl mx-auto">
        <form action="{{ route('surats.store') }}" method="POST" class="bg-white p-6 rounded shadow">
            @csrf

            {{-- Jenis Surat --}}
            <div class="mb-4">
                <label class="block font-medium mb-1">Jenis Surat</label>
                <select name="jenis_surat_id" class="w-full border rounded px-2 py-1">
                    <option value="">-- Pilih Jenis Surat --</option>
                    @foreach($jenisSurats as $js)
                        <option value="{{ $js->id }}" {{ old('jenis_surat_id') == $js->id ? 'selected' : '' }}>
                            {{ $js->nama_jenis }}
                        </option>
                    @endforeach
                </select>
                @error('jenis_surat_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Nama --}}
            <div class="mb-4">
                <label class="block font-medium mb-1">Nama</label>
                <input type="text" name="nama" value="{{ old('nama') }}" class="w-full border rounded px-2 py-1">
                @error('nama')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- NIK --}}
            <div class="mb-4">
                <label class="block font-medium mb-1">NIK</label>
                <input type="text" name="nik" value="{{ old('nik') }}" class="w-full border rounded px-2 py-1">
                @error('nik')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Alamat --}}
            <div class="mb-4">
                <label class="block font-medium mb-1">Alamat</label>
                <textarea name="alamat" class="w-full border rounded px-2 py-1">{{ old('alamat') }}</textarea>
                @error('alamat')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Keperluan --}}
            <div class="mb-4">
                <label class="block font-medium mb-1">Keperluan</label>
                <input type="text" name="keperluan" value="{{ old('keperluan') }}" class="w-full border rounded px-2 py-1">
                @error('keperluan')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Submit --}}
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Simpan
            </button>
        </form>
    </div>
</x-app-layout>
