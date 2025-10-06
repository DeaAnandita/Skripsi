<x-app-layout>
    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            
            {{-- Header --}}
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-semibold text-gray-800">Tambah Data Prasarana Dasar</h2>
                <a href="{{ route('prasarana.index') }}"
                   class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                    ← Kembali
                </a>
            </div>

            {{-- Card Form --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('prasarana.store') }}" class="space-y-4">
                    @csrf

                    {{-- Status Pemilik Bangunan --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Status Pemilik Bangunan</label>
                        <input type="text" name="status_pemilik_bangunan" value="{{ old('status_pemilik_bangunan') }}"
                               class="w-full border px-3 py-2 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    </div>

                    {{-- Status Pemilik Lahan Bangunan --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Status Pemilik Lahan Bangunan</label>
                        <input type="text" name="status_pemilik_lahan" value="{{ old('status_pemilik_lahan') }}"
                               class="w-full border px-3 py-2 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    </div>

                    {{-- Jenis Fisik Bangunan --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Fisik Bangunan</label>
                        <select name="jenis_fisik_bangunan"
                                class="w-full border px-3 py-2 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            <option value="">--Silahkan pilih--</option>
                            <option value="Permanen">Permanen</option>
                            <option value="Semi Permanen">Semi Permanen</option>
                            <option value="Non Permanen">Non Permanen</option>
                        </select>
                    </div>

                    {{-- Jenis Lantai Bangunan --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Lantai Bangunan</label>
                        <select name="jenis_lantai"
                                class="w-full border px-3 py-2 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            <option value="">--Silahkan pilih--</option>
                            <option value="Keramik">Keramik</option>
                            <option value="Tanah">Tanah</option>
                            <option value="Semen">Semen</option>
                            <option value="Kayu">Kayu</option>
                        </select>
                    </div>

                    {{-- Kondisi Lantai Bangunan --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Kondisi Lantai Bangunan</label>
                        <select name="kondisi_lantai"
                                class="w-full border px-3 py-2 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            <option value="">--Silahkan pilih--</option>
                            <option value="Baik">Baik</option>
                            <option value="Rusak Ringan">Rusak Ringan</option>
                            <option value="Rusak Berat">Rusak Berat</option>
                        </select>
                    </div>

                    {{-- Jenis Dinding Bangunan --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Dinding Bangunan</label>
                        <select name="jenis_dinding"
                                class="w-full border px-3 py-2 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            <option value="">--Silahkan pilih--</option>
                            <option value="Tembok">Tembok</option>
                            <option value="Kayu">Kayu</option>
                            <option value="Bambu">Bambu</option>
                        </select>
                    </div>

                    {{-- Kondisi Dinding Bangunan --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Kondisi Dinding Bangunan</label>
                        <select name="kondisi_dinding"
                                class="w-full border px-3 py-2 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            <option value="">--Silahkan pilih--</option>
                            <option value="Baik">Baik</option>
                            <option value="Rusak Ringan">Rusak Ringan</option>
                            <option value="Rusak Berat">Rusak Berat</option>
                        </select>
                    </div>

                    {{-- Jenis Atap Bangunan --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Atap Bangunan</label>
                        <select name="jenis_atap"
                                class="w-full border px-3 py-2 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            <option value="">--Silahkan pilih--</option>
                            <option value="Genteng">Genteng</option>
                            <option value="Seng">Seng</option>
                            <option value="Asbes">Asbes</option>
                            <option value="Jerami">Jerami</option>
                        </select>
                    </div>

                    {{-- Kondisi Atap Bangunan --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Kondisi Atap Bangunan</label>
                        <select name="kondisi_atap"
                                class="w-full border px-3 py-2 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            <option value="">--Silahkan pilih--</option>
                            <option value="Baik">Baik</option>
                            <option value="Rusak Ringan">Rusak Ringan</option>
                            <option value="Rusak Berat">Rusak Berat</option>
                        </select>
                    </div>

                    {{-- Sumber Air Minum --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Sumber Air Minum</label>
                        <input type="text" name="sumber_air_minum" value="{{ old('sumber_air_minum') }}"
                               class="w-full border px-3 py-2 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    </div>

                    {{-- Kondisi Sumber Air Minum --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Kondisi Sumber Air Minum</label>
                        <select name="kondisi_air_minum"
                                class="w-full border px-3 py-2 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            <option value="">--Silahkan pilih--</option>
                            <option value="Baik">Baik</option>
                            <option value="Kurang Baik">Kurang Baik</option>
                        </select>
                    </div>

                    {{-- Cara Memperoleh Air Minum --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Cara Memperoleh Air Minum</label>
                        <select name="cara_air_minum"
                                class="w-full border px-3 py-2 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            <option value="">--Silahkan pilih--</option>
                            <option value="Langsung">Langsung</option>
                            <option value="Membeli">Membeli</option>
                            <option value="Menampung">Menampung</option>
                        </select>
                    </div>

                    {{-- Sumber Penerangan Utama --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Sumber Penerangan Utama</label>
                        <select name="sumber_penerangan"
                                class="w-full border px-3 py-2 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            <option value="">--Silahkan pilih--</option>
                            <option value="PLN">PLN</option>
                            <option value="Genset">Genset</option>
                            <option value="Tenaga Surya">Tenaga Surya</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>

                    {{-- Sumber Daya Terpasang --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Sumber Daya Terpasang</label>
                        <input type="text" name="sumber_daya_terpasang" value="{{ old('sumber_daya_terpasang') }}"
                               class="w-full border px-3 py-2 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    </div>

                    {{-- Bahan Bakar Memasak --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Bahan Bakar Memasak</label>
                        <input type="text" name="bahan_bakar" value="{{ old('bahan_bakar') }}"
                               class="w-full border px-3 py-2 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    </div>

                    {{-- Penggunaan Fasilitas Tempat BAB --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Penggunaan Fasilitas Tempat BAB</label>
                        <select name="fasilitas_bab"
                                class="w-full border px-3 py-2 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            <option value="">--Silahkan pilih--</option>
                            <option value="Sendiri">Sendiri</option>
                            <option value="Bersama">Bersama</option>
                            <option value="Umum">Umum</option>
                        </select>
                    </div>

                    {{-- Tempat Pembuangan Akhir Tinja --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tempat Pembuangan Akhir Tinja</label>
                        <select name="pembuangan_tinja"
                                class="w-full border px-3 py-2 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            <option value="">--Silahkan pilih--</option>
                            <option value="Septic Tank">Septic Tank</option>
                            <option value="Sungai">Sungai</option>
                            <option value="Lubang Tanah">Lubang Tanah</option>
                        </select>
                    </div>

                    {{-- Cara Pembuangan Akhir Sampah --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Cara Pembuangan Akhir Sampah</label>
                        <select name="pembuangan_sampah"
                                class="w-full border px-3 py-2 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            <option value="">--Silahkan pilih--</option>
                            <option value="Dibuang">Dibuang</option>
                            <option value="Dibakar">Dibakar</option>
                            <option value="Didaur Ulang">Didaur Ulang</option>
                        </select>
                    </div>

                    {{-- Manfaat Danau/Sungai/Waduk/Situ/Mata Air --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Manfaat Danau/Sungai/Waduk/Situ/Mata Air</label>
                        <select name="manfaat_air"
                                class="w-full border px-3 py-2 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            <option value="">--Silahkan pilih--</option>
                            <option value="Irigasi">Irigasi</option>
                            <option value="Mandi/Cuci">Mandi/Cuci</option>
                            <option value="Perikanan">Perikanan</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>

                    {{-- Luas Lantai --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Luas Lantai (m²)</label>
                        <input type="number" name="luas_lantai" value="{{ old('luas_lantai') }}"
                               class="w-full border px-3 py-2 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    </div>

                    {{-- Jumlah Kamar --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Jumlah Kamar</label>
                        <input type="number" name="jumlah_kamar" value="{{ old('jumlah_kamar') }}"
                               class="w-full border px-3 py-2 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    </div>

                    {{-- Tombol Simpan --}}
                    <div class="pt-4">
                        <button type="submit"
                                class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                            Simpan Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>