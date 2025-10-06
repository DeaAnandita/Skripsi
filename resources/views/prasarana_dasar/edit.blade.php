<x-app-layout>
    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            {{-- Alert --}}
            @if ($errors->any())
                <div class="mb-4 p-4 rounded-md bg-red-100 text-red-800">
                    <strong>Terjadi kesalahan:</strong>
                    <ul class="mt-2 list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Header --}}
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-semibold text-gray-800">Edit Data Prasarana Dasar</h2>
                <a href="{{ route('prasarana-dasar.index') }}" 
                    class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                    ← Kembali
                </a>
            </div>

            {{-- Form --}}
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('prasarana-dasar.update', $prasarana->id) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        {{-- Status Pemilik Bangunan --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Status Pemilik Bangunan</label>
                            <input type="text" name="status_pemilik_bangunan" value="{{ old('status_pemilik_bangunan', $prasarana->status_pemilik_bangunan) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        {{-- Status Pemilik Lahan --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Status Pemilik Lahan</label>
                            <input type="text" name="status_pemilik_lahan" value="{{ old('status_pemilik_lahan', $prasarana->status_pemilik_lahan) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        {{-- Jenis Fisik Bangunan --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Jenis Fisik Bangunan</label>
                            <input type="text" name="jenis_fisik_bangunan" value="{{ old('jenis_fisik_bangunan', $prasarana->jenis_fisik_bangunan) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        {{-- Jenis Lantai --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Jenis Lantai Bangunan</label>
                            <select name="jenis_lantai" class="mt-1 block w-full rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                                <option value="">--Silahkan pilih--</option>
                                @foreach(['Keramik','Tanah','Semen','Kayu'] as $opt)
                                    <option value="{{ $opt }}" {{ old('jenis_lantai', $prasarana->jenis_lantai) == $opt ? 'selected' : '' }}>{{ $opt }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Kondisi Lantai --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Kondisi Lantai Bangunan</label>
                            <select name="kondisi_lantai" class="mt-1 block w-full rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                                <option value="">--Silahkan pilih--</option>
                                @foreach(['Baik','Rusak Ringan','Rusak Berat'] as $opt)
                                    <option value="{{ $opt }}" {{ old('kondisi_lantai', $prasarana->kondisi_lantai) == $opt ? 'selected' : '' }}>{{ $opt }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Jenis Dinding --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Jenis Dinding Bangunan</label>
                            <select name="jenis_dinding" class="mt-1 block w-full rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                                <option value="">--Silahkan pilih--</option>
                                @foreach(['Tembok','Kayu','Bambu','Anyaman'] as $opt)
                                    <option value="{{ $opt }}" {{ old('jenis_dinding', $prasarana->jenis_dinding) == $opt ? 'selected' : '' }}>{{ $opt }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Kondisi Dinding --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Kondisi Dinding Bangunan</label>
                            <select name="kondisi_dinding" class="mt-1 block w-full rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                                <option value="">--Silahkan pilih--</option>
                                @foreach(['Baik','Rusak Ringan','Rusak Berat'] as $opt)
                                    <option value="{{ $opt }}" {{ old('kondisi_dinding', $prasarana->kondisi_dinding) == $opt ? 'selected' : '' }}>{{ $opt }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Jenis Atap --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Jenis Atap Bangunan</label>
                            <select name="jenis_atap" class="mt-1 block w-full rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                                <option value="">--Silahkan pilih--</option>
                                @foreach(['Genteng','Asbes','Seng','Sirap'] as $opt)
                                    <option value="{{ $opt }}" {{ old('jenis_atap', $prasarana->jenis_atap) == $opt ? 'selected' : '' }}>{{ $opt }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Kondisi Atap --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Kondisi Atap Bangunan</label>
                            <select name="kondisi_atap" class="mt-1 block w-full rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                                <option value="">--Silahkan pilih--</option>
                                @foreach(['Baik','Rusak Ringan','Rusak Berat'] as $opt)
                                    <option value="{{ $opt }}" {{ old('kondisi_atap', $prasarana->kondisi_atap) == $opt ? 'selected' : '' }}>{{ $opt }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Sumber Air Minum --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Sumber Air Minum</label>
                            <input type="text" name="sumber_air_minum" value="{{ old('sumber_air_minum', $prasarana->sumber_air_minum) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        {{-- Kondisi Sumber Air Minum --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Kondisi Sumber Air Minum</label>
                            <select name="kondisi_air_minum" class="mt-1 block w-full rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                                <option value="">--Silahkan pilih--</option>
                                @foreach(['Baik','Tercemar','Tidak Layak'] as $opt)
                                    <option value="{{ $opt }}" {{ old('kondisi_air_minum', $prasarana->kondisi_air_minum) == $opt ? 'selected' : '' }}>{{ $opt }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Cara Memperoleh Air --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Cara Memperoleh Air Minum</label>
                            <select name="cara_peroleh_air" class="mt-1 block w-full rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                                <option value="">--Silahkan pilih--</option>
                                @foreach(['Sendiri','Umum','Langganan','Lainnya'] as $opt)
                                    <option value="{{ $opt }}" {{ old('cara_peroleh_air', $prasarana->cara_peroleh_air) == $opt ? 'selected' : '' }}>{{ $opt }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Sumber Penerangan --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Sumber Penerangan Utama</label>
                            <select name="sumber_penerangan" class="mt-1 block w-full rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                                <option value="">--Silahkan pilih--</option>
                                @foreach(['PLN','Genset','Listrik Non PLN','Lampu Minyak'] as $opt)
                                    <option value="{{ $opt }}" {{ old('sumber_penerangan', $prasarana->sumber_penerangan) == $opt ? 'selected' : '' }}>{{ $opt }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Sumber Daya Terpasang --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Sumber Daya Terpasang</label>
                            <input type="text" name="sumber_daya_terpasang" value="{{ old('sumber_daya_terpasang', $prasarana->sumber_daya_terpasang) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        {{-- Bahan Bakar Memasak --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Bahan Bakar Memasak</label>
                            <input type="text" name="bahan_bakar_memasak" value="{{ old('bahan_bakar_memasak', $prasarana->bahan_bakar_memasak) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        {{-- Fasilitas BAB --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Penggunaan Fasilitas Tempat BAB</label>
                            <select name="fasilitas_bab" class="mt-1 block w-full rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                                <option value="">--Silahkan pilih--</option>
                                @foreach(['Sendiri','Bersama','Umum','Tidak Ada'] as $opt)
                                    <option value="{{ $opt }}" {{ old('fasilitas_bab', $prasarana->fasilitas_bab) == $opt ? 'selected' : '' }}>{{ $opt }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Pembuangan Tinja --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tempat Pembuangan Akhir Tinja</label>
                            <select name="pembuangan_tinja" class="mt-1 block w-full rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                                <option value="">--Silahkan pilih--</option>
                                @foreach(['Septic Tank','Lubang Tanah','Sungai','Lainnya'] as $opt)
                                    <option value="{{ $opt }}" {{ old('pembuangan_tinja', $prasarana->pembuangan_tinja) == $opt ? 'selected' : '' }}>{{ $opt }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Pembuangan Sampah --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Cara Pembuangan Akhir Sampah</label>
                            <select name="pembuangan_sampah" class="mt-1 block w-full rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                                <option value="">--Silahkan pilih--</option>
                                @foreach(['Dibakar','Dibuang ke Sungai','Diangkut Petugas','Lainnya'] as $opt)
                                    <option value="{{ $opt }}" {{ old('pembuangan_sampah', $prasarana->pembuangan_sampah) == $opt ? 'selected' : '' }}>{{ $opt }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Manfaat Air --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Manfaat Danau/Sungai/Waduk/Situ/Mata Air</label>
                            <select name="manfaat_air" class="mt-1 block w-full rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                                <option value="">--Silahkan pilih--</option>
                                @foreach(['Irigasi','Mandi/Cuci','Budidaya Ikan','Tidak Dimanfaatkan'] as $opt)
                                    <option value="{{ $opt }}" {{ old('manfaat_air', $prasarana->manfaat_air) == $opt ? 'selected' : '' }}>{{ $opt }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Luas Lantai --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Luas Lantai (m²)</label>
                            <input type="number" name="luas_lantai" value="{{ old('luas_lantai', $prasarana->luas_lantai) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        {{-- Jumlah Kamar --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Jumlah Kamar</label>
                            <input type="number" name="jumlah_kamar" value="{{ old('jumlah_kamar', $prasarana->jumlah_kamar) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                    </div>

                    <div class="pt-4 flex justify-end">
                        <button type="submit" 
                            class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
