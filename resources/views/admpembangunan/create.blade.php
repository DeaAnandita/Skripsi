<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Administrasi Pembangunan') }}
        </h2>
    </x-slot>

    {{-- <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"> --}}
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

       <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold mb-4">PENDATAAN ASET KELUARGA</h2>
                    <form method="POST" action="{{ route('aset-keluarga.store') }}">
                        @csrf
                        <div>
                                <label class="block text-sm font-medium text-gray-700">Surveyor</label>
                                <select name="user_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    <option value="">-- Pilih Surveyor --</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        <div class="grid-container gap-4">
                            <!-- Row 1 -->
                            <div>
                                <label for="tabung_gas" class="block text-sm font-medium text-gray-700">Memiliki tabung gas 5,5kg :</label>
                                <select name="tabung_gas" id="tabung_gas" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                            <div>
                                <label for="komputer_laptop" class="block text-sm font-medium text-gray-700">Memiliki komputer/laptop :</label>
                                <select name="komputer_laptop" id="komputer_laptop" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                            <div>
                                <label for="tv_elektronik" class="block text-sm font-medium text-gray-700">Memiliki TV/elektronik :</label>
                                <select name="tv_elektronik" id="tv_elektronik" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>

                            <!-- Row 2 -->
                            <div>
                                <label for="ac_pendingin" class="block text-sm font-medium text-gray-700">Memiliki AC :</label>
                                <select name="ac_pendingin" id="ac_pendingin" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                            <div>
                                <label for="kulkas" class="block text-sm font-medium text-gray-700">Memiliki kulkas :</label>
                                <select name="kulkas" id="kulkas" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                            <div>
                                <label for="water_heater" class="block text-sm font-medium text-gray-700">Memiliki pemanas air :</label>
                                <select name="water_heater" id="water_heater" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>

                            <!-- Row 3 -->
                            <div>
                                <label for="rumah_tempat_lain" class="block text-sm font-medium text-gray-700">Memiliki rumah lain :</label>
                                <select name="rumah_tempat_lain" id="rumah_tempat_lain" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                            <div>
                                <label for="diesel_listrik" class="block text-sm font-medium text-gray-700">Memiliki diesel :</label>
                                <select name="diesel_listrik" id="diesel_listrik" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                            <div>
                                <label for="sepeda_motor" class="block text-sm font-medium text-gray-700">Memiliki sepeda motor :</label>
                                <select name="sepeda_motor" id="sepeda_motor" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>

                            <!-- Row 4 -->
                            <div>
                                <label for="mobil_pribadi" class="block text-sm font-medium text-gray-700">Memiliki mobil :</label>
                                <select name="mobil_pribadi" id="mobil_pribadi" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                            <div>
                                <label for="perahu_bermotor" class="block text-sm font-medium text-gray-700">Memiliki perahu bermotor :</label>
                                <select name="perahu_bermotor" id="perahu_bermotor" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                            <div>
                                <label for="kapal_barang" class="block text-sm font-medium text-gray-700">Memiliki kapal barang :</label>
                                <select name="kapal_barang" id="kapal_barang" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>

                            <!-- Row 5 -->
                            <div>
                                <label for="kapal_penumpang" class="block text-sm font-medium text-gray-700">Memiliki kapal penumpang :</label>
                                <select name="kapal_penumpang" id="kapal_penumpang" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                            <div>
                                <label for="kapal_pesiar" class="block text-sm font-medium text-gray-700">Memiliki kapal pesiar :</label>
                                <select name="kapal_pesiar" id="kapal_pesiar" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                            <div>
                                <label for="helikopter_pribadi" class="block text-sm font-medium text-gray-700">Memiliki helikopter :</label>
                                <select name="helikopter_pribadi" id="helikopter_pribadi" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>

                            <!-- Row 6 -->
                            <div>
                                <label for="pesawat_pribadi" class="block text-sm font-medium text-gray-700">Memiliki pesawat :</label>
                                <select name="pesawat_pribadi" id="pesawat_pribadi" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                            <div>
                                <label for="ternak_besar" class="block text-sm font-medium text-gray-700">Memiliki ternak besar :</label>
                                <select name="ternak_besar" id="ternak_besar" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                            <div>
                                <label for="ternak_kecil" class="block text-sm font-medium text-gray-700">Memiliki ternak kecil :</label>
                                <select name="ternak_kecil" id="ternak_kecil" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>

                            <!-- Row 7 -->
                            <div>
                                <label for="hiasan_emas" class="block text-sm font-medium text-gray-700">Memiliki emas/berlian :</label>
                                <select name="hiasan_emas" id="hiasan_emas" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                            <div>
                                <label for="tabungan_bank" class="block text-sm font-medium text-gray-700">Memiliki tabungan bank :</label>
                                <select name="tabungan_bank" id="tabungan_bank" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                            <div>
                                <label for="surat_berharga" class="block text-sm font-medium text-gray-700">Memiliki surat berharga :</label>
                                <select name="surat_berharga" id="surat_berharga" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>

                            <!-- Row 8 -->
                            <div>
                                <label for="sertifikat_deposito" class="block text-sm font-medium text-gray-700">Memiliki deposito :</label>
                                <select name="sertifikat_deposito" id="sertifikat_deposito" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                            <div>
                                <label for="sertifikat_tanah" class="block text-sm font-medium text-gray-700">Memiliki sertifikat tanah :</label>
                                <select name="sertifikat_tanah" id="sertifikat_tanah" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                            <div>
                                <label for="sertifikat_bangunan" class="block text-sm font-medium text-gray-700">Memiliki sertifikat bangunan :</label>
                                <select name="sertifikat_bangunan" id="sertifikat_bangunan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>

                            <!-- Row 9 -->
                            <div>
                                <label for="perusahaan_industri_besar" class="block text-sm font-medium text-gray-700">Perusahaan industri besar :</label>
                                <select name="perusahaan_industri_besar" id="perusahaan_industri_besar" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                            <div>
                                <label for="perusahaan_industri_menengah" class="block text-sm font-medium text-gray-700">Perusahaan industri menengah :</label>
                                <select name="perusahaan_industri_menengah" id="perusahaan_industri_menengah" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                            <div>
                                <label for="perusahaan_industri_kecil" class="block text-sm font-medium text-gray-700">Perusahaan industri kecil :</label>
                                <select name="perusahaan_industri_kecil" id="perusahaan_industri_kecil" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>

                            <!-- Row 10 -->
                            <div>
                                <label for="usaha_perikanan" class="block text-sm font-medium text-gray-700">Usaha perikanan :</label>
                                <select name="usaha_perikanan" id="usaha_perikanan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                            <div>
                                <label for="usaha_peternakan" class="block text-sm font-medium text-gray-700">Usaha peternakan :</label>
                                <select name="usaha_peternakan" id="usaha_peternakan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                            <div>
                                <label for="usaha_perkebunan" class="block text-sm font-medium text-gray-700">Usaha perkebunan :</label>
                                <select name="usaha_perkebunan" id="usaha_perkebunan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>

                            <!-- Row 11 -->
                            <div>
                                <label for="usaha_pasar_swalayan" class="block text-sm font-medium text-gray-700">Usaha pasar swalayan :</label>
                                <select name="usaha_pasar_swalayan" id="usaha_pasar_swalayan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                            <div>
                                <label for="usaha_di_pasar_swalayan" class="block text-sm font-medium text-gray-700">Usaha pasar alayan :</label>
                                <select name="usaha_di_pasar_swalayan" id="usaha_di_pasar_swalayan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                            <div>
                                <label for="usaha_di_pasar_tradisional" class="block text-sm font-medium text-gray-700">Usaha pasar tradisional :</label>
                                <select name="usaha_di_pasar_tradisional" id="usaha_di_pasar_tradisional" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>

                            <!-- Row 12 -->
                            <div>
                                <label for="usaha_di_pasar_desa" class="block text-sm font-medium text-gray-700">Usaha pasar desa :</label>
                                <select name="usaha_di_pasar_desa" id="usaha_di_pasar_desa" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                            <div>
                                <label for="usaha_transportasi" class="block text-sm font-medium text-gray-700">Usaha transportasi :</label>
                                <select name="usaha_transportasi" id="usaha_transportasi" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                            <div>
                                <label for="saham_perusahaan" class="block text-sm font-medium text-gray-700">Memiliki saham :</label>
                                <select name="saham_perusahaan" id="saham_perusahaan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>

                            <!-- Row 13 -->
                            <div>
                                <label for="pelanggan_telkom" class="block text-sm font-medium text-gray-700">Pelanggan telkom :</label>
                                <select name="pelanggan_telkom" id="pelanggan_telkom" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                            <div>
                                <label for="hp_gsm" class="block text-sm font-medium text-gray-700">Memiliki hp gm :</label>
                                <select name="hp_gsm" id="hp_gsm" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                            <div>
                                <label for="hp_cdma" class="block text-sm font-medium text-gray-700">Memiliki hp cdma :</label>
                                <select name="hp_cdma" id="hp_cdma" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>

                            <!-- Row 14 -->
                            <div>
                                <label for="usaha_wartel" class="block text-sm font-medium text-gray-700">Memiliki usaha wartel :</label>
                                <select name="usaha_wartel" id="usaha_wartel" class="mt-Ya block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                            <div>
                                <label for="parabola" class="block text-sm font-medium text-gray-700">Memiliki parabola :</label>
                                <select name="parabola" id="parabola" class="mt-Ya block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya" >Ya</option>
                                    <option value="Tidak" >Tidak</option>
                                </select>
                            </div>
                            <div>
                                <label for="berlangganan_koran" class="block text-sm font-medium text-gray-700">Berlangganan koran :</label>
                                <select name="berlangganan_koran" id="berlangganan_koran" class="mt-Ya block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="mt-6 w-full bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-green-600">KIRIM</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
