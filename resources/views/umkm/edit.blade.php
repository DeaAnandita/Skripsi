<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit umkm
            {{ __('Edit Data UMKM') }}
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

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold mb-4">EDIT DATA UMKM</h2>

                    <form method="POST" action="{{ route('umkm.update', $item->id) }}">
                        @csrf
                        @method('PUT')

                        <!-- Surveyor -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Surveyor</label>
                            <input type="text" value="{{ auth()->user()->name }}" readonly
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm bg-gray-100 text-gray-700">
                            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <!-- Memiliki Koperasi -->
                            <div>
                                <label for="Koperasi" class="block text-sm font-medium text-gray-700">Memiliki Koperasi</label>
                                <select name="Koperasi" id="Koperasi" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">-- Silahkan Pilih --</option>
                                    <option value="Ya" {{ old('Koperasi', $item->Koperasi) == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ old('Koperasi', $item->Koperasi) == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                    <option value="Lainnya" {{ old('Koperasi', $item->Koperasi) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>

                            <!-- Memiliki Unit Usaha Simpan Pinjam -->
                            <div>
                                <label for="Unit_Usaha_Simpan_Pinjam" class="block text-sm font-medium text-gray-700">Memiliki Unit Usaha Simpan Pinjam</label>
                                <select name="Unit_Usaha_Simpan_Pinjam" id="Unit_Usaha_Simpan_Pinjam" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">-- Silahkan Pilih --</option>
                                    <option value="Ya" {{ old('Unit_Usaha_Simpan_Pinjam', $item->Unit_Usaha_Simpan_Pinjam) == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ old('Unit_Usaha_Simpan_Pinjam', $item->Unit_Usaha_Simpan_Pinjam) == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                    <option value="Lainnya" {{ old('Unit_Usaha_Simpan_Pinjam', $item->Unit_Usaha_Simpan_Pinjam) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>

                            <!-- Memiliki Industri Kerajinan Tangan -->
                            <div>
                                <label for="Industri_Kerajinan_Tangan" class="block text-sm font-medium text-gray-700">Memiliki Industri Kerajinan Tangan</label>
                                <select name="Industri_Kerajinan_Tangan" id="Industri_Kerajinan_Tangan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">-- Silahkan Pilih --</option>
                                    <option value="Ya" {{ old('Industri_Kerajinan_Tangan', $item->Industri_Kerajinan_Tangan) == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ old('Industri_Kerajinan_Tangan', $item->Industri_Kerajinan_Tangan) == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                    <option value="Lainnya" {{ old('Industri_Kerajinan_Tangan', $item->Industri_Kerajinan_Tangan) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>

                            <!-- Memiliki Industri Pakaian -->
                            <div>
                                <label for="Industri_Pakaian" class="block text-sm font-medium text-gray-700">Memiliki Industri Pakaian</label>
                                <select name="Industri_Pakaian" id="Industri_Pakaian" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">-- Silahkan Pilih --</option>
                                    <option value="Ya" {{ old('Industri_Pakaian', $item->Industri_Pakaian) == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ old('Industri_Pakaian', $item->Industri_Pakaian) == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                    <option value="Lainnya" {{ old('Industri_Pakaian', $item->Industri_Pakaian) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>

                            <!-- Memiliki Industri Usaha Makanan -->
                            <div>
                                <label for="Industri_Usaha_Makanan" class="block text-sm font-medium text-gray-700">Memiliki Industri Usaha Makanan</label>
                                <select name="Industri_Usaha_Makanan" id="Industri_Usaha_Makanan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">-- Silahkan Pilih --</option>
                                    <option value="Ya" {{ old('Industri_Usaha_Makanan', $item->Industri_Usaha_Makanan) == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ old('Industri_Usaha_Makanan', $item->Industri_Usaha_Makanan) == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                    <option value="Lainnya" {{ old('Industri_Usaha_Makanan', $item->Industri_Usaha_Makanan) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>

                            <!-- Memiliki Industri Alat Rumah Tangga -->
                            <div>
                                <label for="Industri_Alat_Rumah_Tangga" class="block text-sm font-medium text-gray-700">Memiliki Industri Alat Rumah Tangga</label>
                                <select name="Industri_Alat_Rumah_Tangga" id="Industri_Alat_Rumah_Tangga" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">-- Silahkan Pilih --</option>
                                    <option value="Ya" {{ old('Industri_Alat_Rumah_Tangga', $item->Industri_Alat_Rumah_Tangga) == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ old('Industri_Alat_Rumah_Tangga', $item->Industri_Alat_Rumah_Tangga) == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                    <option value="Lainnya" {{ old('Industri_Alat_Rumah_Tangga', $item->Industri_Alat_Rumah_Tangga) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>

                            <!-- Memiliki Industri Usaha Bahan Bangunan -->
                            <div>
                                <label for="Industri_Usaha_Bahan_Bangunan" class="block text-sm font-medium text-gray-700">Memiliki Industri Usaha Bahan Bangunan</label>
                                <select name="Industri_Usaha_Bahan_Bangunan" id="Industri_Usaha_Bahan_Bangunan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">-- Silahkan Pilih --</option>
                                    <option value="Ya" {{ old('Industri_Usaha_Bahan_Bangunan', $item->Industri_Usaha_Bahan_Bangunan) == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ old('Industri_Usaha_Bahan_Bangunan', $item->Industri_Usaha_Bahan_Bangunan) == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                    <option value="Lainnya" {{ old('Industri_Usaha_Bahan_Bangunan', $item->Industri_Usaha_Bahan_Bangunan) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>

                            <!-- Memiliki Industri Alat Pertanian -->
                            <div>
                                <label for="Industri_Alat_Pertanian" class="block text-sm font-medium text-gray-700">Memiliki Industri Alat Pertanian</label>
                                <select name="Industri_Alat_Pertanian" id="Industri_Alat_Pertanian" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">-- Silahkan Pilih --</option>
                                    <option value="Ya" {{ old('Industri_Alat_Pertanian', $item->Industri_Alat_Pertanian) == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ old('Industri_Alat_Pertanian', $item->Industri_Alat_Pertanian) == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                    <option value="Lainnya" {{ old('Industri_Alat_Pertanian', $item->Industri_Alat_Pertanian) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>

                            <!-- Memiliki Restoran -->
                            <div>
                                <label for="Restoran" class="block text-sm font-medium text-gray-700">Memiliki Restoran</label>
                                <select name="Restoran" id="Restoran" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">-- Silahkan Pilih --</option>
                                    <option value="Ya" {{ old('Restoran', $item->Restoran) == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ old('Restoran', $item->Restoran) == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                    <option value="Lainnya" {{ old('Restoran', $item->Restoran) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>
                        </div>

                        <!-- Tombol -->
                        <div class="mt-6 flex gap-3">
                            <button type="submit" class="bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">Update</button>
                            <a href="{{ route('umkm.index') }}" class="bg-gray-500 text-white font-bold py-2 px-4 rounded hover:bg-gray-600">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>