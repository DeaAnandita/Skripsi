<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Penyewaan Lahan') }}
        </h2>
    </x-slot>

    @if ($errors->any())
        <div class="mb-4 p-4 rounded-md bg-red-100 text-red-800">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

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
                    <h2 class="text-2xl font-bold mb-4">PENDATAAN PENYEWAAN LAHAN</h2>
                    <form method="POST" action="{{ route('penyewaan-lahan.store') }}">
                        @csrf
                        <div class="grid-container gap-4">
                            <!-- Row 1 -->
                            <div>
                                <label for="nama_penyewa" class="block text-sm font-medium text-gray-700">Nama Penyewa</label>
                                <input type="text" name="nama_penyewa" id="nama_penyewa" value="{{ old('nama_penyewa') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @error('nama_penyewa') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="lokasi_lahan" class="block text-sm font-medium text-gray-700">Lokasi Lahan</label>
                                <input type="text" name="lokasi_lahan" id="lokasi_lahan" value="{{ old('lokasi_lahan') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @error('lokasi_lahan') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="luas_lahan" class="block text-sm font-medium text-gray-700">Luas Lahan (m²)</label>
                                <input type="number" name="luas_lahan" id="luas_lahan" step="0.01" value="{{ old('luas_lahan') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @error('luas_lahan') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <!-- Row 2 -->
                            <div>
                                <label for="jenis_aset" class="block text-sm font-medium text-gray-700">Jenis Aset</label>
                                <select name="jenis_aset" id="jenis_aset" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="ternak" {{ old('jenis_aset') == 'ternak' ? 'selected' : '' }}>Ternak</option>
                                    <option value="perikanan" {{ old('jenis_aset') == 'perikanan' ? 'selected' : '' }}>Perikanan</option>
                                </select>
                                @error('jenis_aset') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="tanggal_mulai" class="block text-sm font-medium text-gray-700">Tanggal Mulai</label>
                                <input type="date" name="tanggal_mulai" id="tanggal_mulai" value="{{ old('tanggal_mulai') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @error('tanggal_mulai') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="tanggal_selesai" class="block text-sm font-medium text-gray-700">Tanggal Selesai</label>
                                <input type="date" name="tanggal_selesai" id="tanggal_selesai" value="{{ old('tanggal_selesai') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @error('tanggal_selesai') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <!-- Row 3 -->
                            <div>
                                <label for="biaya_sewa" class="block text-sm font-medium text-gray-700">Biaya Sewa (Rp)</label>
                                <input type="number" name="biaya_sewa" id="biaya_sewa" step="0.01" value="{{ old('biaya_sewa') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @error('biaya_sewa') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                                <select name="status" id="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                    <option value="selesai" {{ old('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                    <option value="batal" {{ old('status') == 'batal' ? 'selected' : '' }}>Batal</option>
                                </select>
                                @error('status') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
                            </div>
                            <div></div> <!-- Placeholder untuk menjaga grid -->
                        </div>
                        <div class="mt-6 flex justify-end gap-2">
                            <a href="{{ route('penyewaan-lahan.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition">Kembali</a>
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-green-600 transition">KIRIM</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>