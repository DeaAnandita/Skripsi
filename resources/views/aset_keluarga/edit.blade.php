<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Aset Keluarga') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($errors->any())
                <div class="mb-4 p-4 rounded-md bg-red-100 text-red-800">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <div class="py-6">
                <form action="{{ route('aset-keluarga.update', $item->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-2 gap-4">
                        {{-- User --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">User</label>
                            <select name="user_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ $item->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Nama Aset --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nama Aset</label>
                            <input type="text" name="nama_aset" value="{{ $item->nama_aset }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>

                        {{-- Kategori --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Kategori</label>
                            <select name="kategori" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                @foreach(['Rumah','Kendaraan','Tabungan','Usaha','Elektronik','Lainnya'] as $kategori)
                                    <option value="{{ $kategori }}" {{ $item->kategori == $kategori ? 'selected' : '' }}>{{ $kategori }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Status Aset --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Status Aset</label>
                            <select name="status_aset" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                @foreach(['Aktif','Dijual','Dipakai','Rusak','Hilangan'] as $status)
                                    <option value="{{ $status }}" {{ $item->status_aset == $status ? 'selected' : '' }}>{{ $status }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Nilai Aset --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nilai Aset</label>
                            <input type="number" name="nilai_aset" value="{{ $item->nilai_aset }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>

                        {{-- Tahun Perolehan --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tahun Perolehan</label>
                            <input type="number" name="tahun_perolehan" value="{{ $item->tahun_perolehan }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>

                        {{-- Deskripsi --}}
                        <div class="col-span-2">
                            <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                            <textarea name="deskripsi" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ $item->deskripsi }}</textarea>
                        </div>

                        {{-- Dokumen --}}
                        <div class="col-span-2">
                            <label class="block text-sm font-medium text-gray-700">Dokumen (ID JSON)</label>
                            <input type="text" name="dokumen_ids" value="{{ is_array(json_decode($item->dokumen_ids)) ? implode(',', json_decode($item->dokumen_ids)) : '' }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            <p class="text-xs text-gray-500">Pisahkan dengan koma jika lebih dari satu</p>
                        </div>
                    </div>

                    <div class="mt-6 flex justify-end gap-2">
                        <a href="{{ route('aset-keluarga.index') }}" class="px-4 py-2 bg-gray-300 rounded-md hover:bg-gray-400">Batal</a>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Simpan</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
