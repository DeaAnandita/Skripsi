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

    <div class="py-6">
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

            <div class="grid-container gap-4">
                {{-- Tabung Gas --}}
                <div>
                    <label for="tabung_gas" class="block text-sm font-medium text-gray-700">Memiliki tabung gas 5,5kg :</label>
                    <select name="tabung_gas" id="tabung_gas" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">                            <option value="">Silahkan Pilih</option>
                        <option value="Ya" {{ $item->komputer == 'Ya' ? 'selected' : '' }}>Ya</option>
                        <option value="Tidak">Tidak</option>
                    </select>
                </div>

                {{-- Komputer --}}
                <div class="col">
                    <label class="form-label">Komputer</label>
                    <select name="komputer" class="form-control">
                        <option value="Tidak" {{ $item->komputer == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                        <option value="Ya" {{ $item->komputer == 'Ya' ? 'selected' : '' }}>Ya</option>
                        <option value="Lainnya" {{ $item->komputer == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>

                {{-- TV --}}
                <div class="col">
                    <label class="form-label">TV</label>
                    <select name="tv" class="form-control">
                        <option value="Tidak" {{ $item->tv == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                        <option value="Ya" {{ $item->tv == 'Ya' ? 'selected' : '' }}>Ya</option>
                        <option value="Lainnya" {{ $item->tv == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>

                {{-- AC --}}
                <div class="col">
                    <label class="form-label">AC</label>
                    <select name="ac" class="form-control">
                        <option value="Tidak" {{ $item->ac == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                        <option value="Ya" {{ $item->ac == 'Ya' ? 'selected' : '' }}>Ya</option>
                        <option value="Lainnya" {{ $item->ac == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>

                {{-- Kulkas --}}
                <div class="col">
                    <label class="form-label">Kulkas</label>
                    <select name="kulkas" class="form-control">
                        <option value="Tidak" {{ $item->kulkas == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                        <option value="Ya" {{ $item->kulkas == 'Ya' ? 'selected' : '' }}>Ya</option>
                        <option value="Lainnya" {{ $item->kulkas == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>

                {{-- Water Heater --}}
                <div class="col">
                    <label class="form-label">Water Heater</label>
                    <select name="water_heater" class="form-control">
                        <option value="Tidak" {{ $item->water_heater == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                        <option value="Ya" {{ $item->water_heater == 'Ya' ? 'selected' : '' }}>Ya</option>
                        <option value="Lainnya" {{ $item->water_heater == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>

                {{-- Rumah Lain --}}
                <div class="col">
                    <label class="form-label">Rumah Lain</label>
                    <select name="rumah_lain" class="form-control">
                        <option value="Tidak" {{ $item->rumah_lain == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                        <option value="Ya" {{ $item->rumah_lain == 'Ya' ? 'selected' : '' }}>Ya</option>
                        <option value="Lainnya" {{ $item->rumah_lain == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>

                {{-- Diesel --}}
                <div class="col">
                    <label class="form-label">Diesel</label>
                    <select name="diesel" class="form-control">
                        <option value="Tidak" {{ $item->diesel == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                        <option value="Ya" {{ $item->diesel == 'Ya' ? 'selected' : '' }}>Ya</option>
                        <option value="Lainnya" {{ $item->diesel == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>

                {{-- Sepeda Motor --}}
                <div class="col">
                    <label class="form-label">Sepeda Motor</label>
                    <select name="sepeda_motor" class="form-control">
                        <option value="Tidak" {{ $item->sepeda_motor == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                        <option value="Ya" {{ $item->sepeda_motor == 'Ya' ? 'selected' : '' }}>Ya</option>
                        <option value="Lainnya" {{ $item->sepeda_motor == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>

                {{-- Mobil --}}
                <div class="col">
                    <label class="form-label">Mobil</label>
                    <select name="mobil" class="form-control">
                        <option value="Tidak" {{ $item->mobil == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                        <option value="Ya" {{ $item->mobil == 'Ya' ? 'selected' : '' }}>Ya</option>
                        <option value="Lainnya" {{ $item->mobil == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>

                {{-- Perahu Motor --}}
                <div class="col">
                    <label class="form-label">Perahu Motor</label>
                    <select name="perahu_motor" class="form-control">
                        <option value="Tidak" {{ $item->perahu_motor == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                        <option value="Ya" {{ $item->perahu_motor == 'Ya' ? 'selected' : '' }}>Ya</option>
                        <option value="Lainnya" {{ $item->perahu_motor == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>

                {{-- Kapal Barang --}}
                <div class="col">
                    <label class="form-label">Kapal Barang</label>
                    <select name="kapal_barang" class="form-control">
                        <option value="Tidak" {{ $item->kapal_barang == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                        <option value="Ya" {{ $item->kapal_barang == 'Ya' ? 'selected' : '' }}>Ya</option>
                        <option value="Lainnya" {{ $item->kapal_barang == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>

                {{-- Kapal Penumpang --}}
                <div class="col">
                    <label class="form-label">Kapal Penumpang</label>
                    <select name="kapal_penumpang" class="form-control">
                        <option value="Tidak" {{ $item->kapal_penumpang == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                        <option value="Ya" {{ $item->kapal_penumpang == 'Ya' ? 'selected' : '' }}>Ya</option>
                        <option value="Lainnya" {{ $item->kapal_penumpang == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>

                {{-- Kapal Pesiar --}}
                <div class="col">
                    <label class="form-label">Kapal Pesiar</label>
                    <select name="kapal_pesiar" class="form-control">
                        <option value="Tidak" {{ $item->kapal_pesiar == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                        <option value="Ya" {{ $item->kapal_pesiar == 'Ya' ? 'selected' : '' }}>Ya</option>
                        <option value="Lainnya" {{ $item->kapal_pesiar == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>

                {{-- Helikopter --}}
                <div class="col">
                    <label class="form-label">Helikopter</label>
                    <select name="helikopter" class="form-control">
                        <option value="Tidak" {{ $item->helikopter == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                        <option value="Ya" {{ $item->helikopter == 'Ya' ? 'selected' : '' }}>Ya</option>
                        <option value="Lainnya" {{ $item->helikopter == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>

                {{-- Pesawat --}}
                <div class="col">
                    <label class="form-label">Pesawat</label>
                    <select name="pesawat" class="form-control">
                        <option value="Tidak" {{ $item->pesawat == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                        <option value="Ya" {{ $item->pesawat == 'Ya' ? 'selected' : '' }}>Ya</option>
                        <option value="Lainnya" {{ $item->pesawat == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>

                {{-- Ternak Besar --}}
                <div class="col">
                    <label class="form-label">Ternak Besar</label>
                    <select name="ternak_besar" class="form-control">
                        <option value="Tidak" {{ $item->ternak_besar == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                        <option value="Ya" {{ $item->ternak_besar == 'Ya' ? 'selected' : '' }}>Ya</option>
                        <option value="Lainnya" {{ $item->ternak_besar == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>

                {{-- Ternak Kecil --}}
                <div class="col">
                    <label class="form-label">Ternak Kecil</label>
                    <select name="ternak_kecil" class="form-control">
                        <option value="Tidak" {{ $item->ternak_kecil == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                        <option value="Ya" {{ $item->ternak_kecil == 'Ya' ? 'selected' : '' }}>Ya</option>
                        <option value="Lainnya" {{ $item->ternak_kecil == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>

                {{-- Emas --}}
                <div class="col">
                    <label class="form-label">Emas</label>
                    <select name="emas" class="form-control">
                        <option value="Tidak" {{ $item->emas == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                        <option value="Ya" {{ $item->emas == 'Ya' ? 'selected' : '' }}>Ya</option>
                        <option value="Lainnya" {{ $item->emas == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>

                {{-- Tabungan --}}
                <div class="col">
                    <label class="form-label">Tabungan</label>
                    <select name="tabungan" class="form-control">
                        <option value="Tidak" {{ $item->tabungan == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                        <option value="Ya" {{ $item->tabungan == 'Ya' ? 'selected' : '' }}>Ya</option>
                        <option value="Lainnya" {{ $item->tabungan == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>

                {{-- Surat Berharga --}}
                <div class="col">
                    <label class="form-label">Surat Berharga</label>
                    <select name="surat_berharga" class="form-control">
                        <option value="Tidak" {{ $item->surat_berharga == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                        <option value="Ya" {{ $item->surat_berharga == 'Ya' ? 'selected' : '' }}>Ya</option>
                        <option value="Lainnya" {{ $item->surat_berharga == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>

                {{-- Deposito --}}
                <div class="col">
                    <label class="form-label">Deposito</label>
                    <select name="deposito" class="form-control">
                        <option value="Tidak" {{ $item->deposito == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                        <option value="Ya" {{ $item->deposito == 'Ya' ? 'selected' : '' }}>Ya</option>
                        <option value="Lainnya" {{ $item->deposito == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>

                {{-- Sertifikat Tanah --}}
                <div class="col">
                    <label class="form-label">Sertifikat Tanah</label>
                    <select name="sertifikat_tanah" class="form-control">
                        <option value="Tidak" {{ $item->sertifikat_tanah == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                        <option value="Ya" {{ $item->sertifikat_tanah == 'Ya' ? 'selected' : '' }}>Ya</option>
                        <option value="Lainnya" {{ $item->sertifikat_tanah == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>

                {{-- Sertifikat Bangunan --}}
                <div class="col">
                    <label class="form-label">Sertifikat Bangunan</label>
                    <select name="sertifikat_bangunan" class="form-control">
                        <option value="Tidak" {{ $item->sertifikat_bangunan == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                        <option value="Ya" {{ $item->sertifikat_bangunan == 'Ya' ? 'selected' : '' }}>Ya</option>
                        <option value="Lainnya" {{ $item->sertifikat_bangunan == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>

                {{-- Industri Besar --}}
                <div class="col">
                    <label class="form-label">Industri Besar</label>
                    <select name="industri_besar" class="form-control">
                        <option value="Tidak" {{ $item->industri_besar == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                        <option value="Ya" {{ $item->industri_besar == 'Ya' ? 'selected' : '' }}>Ya</option>
                        <option value="Lainnya" {{ $item->industri_besar == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>

                {{-- Industri Menengah --}}
                <div class="col">
                    <label class="form-label">Industri Menengah</label>
                    <select name="industri_menengah" class="form-control">
                        <option value="Tidak" {{ $item->industri_menengah == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                        <option value="Ya" {{ $item->industri_menengah == 'Ya' ? 'selected' : '' }}>Ya</option>
                        <option value="Lainnya" {{ $item->industri_menengah == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>

                {{-- Industri Kecil --}}
                <div class="col">
                    <label class="form-label">Industri Kecil</label>
                    <select name="industri_kecil" class="form-control">
                        <option value="Tidak" {{ $item->industri_kecil == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                        <option value="Ya" {{ $item->industri_kecil == 'Ya' ? 'selected' : '' }}>Ya</option>
                        <option value="Lainnya" {{ $item->industri_kecil == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>

                {{-- Usaha Perikanan --}}
                <div class="col">
                    <label class="form-label">Usaha Perikanan</label>
                    <select name="usaha_perikanan" class="form-control">
                        <option value="Tidak" {{ $item->usaha_perikanan == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                        <option value="Ya" {{ $item->usaha_perikanan == 'Ya' ? 'selected' : '' }}>Ya</option>
                        <option value="Lainnya" {{ $item->usaha_perikanan == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>

                {{-- Usaha Peternakan --}}
                <div class="col">
                    <label class="form-label">Usaha Peternakan</label>
                    <select name="usaha_peternakan" class="form-control">
                        <option value="Tidak" {{ $item->usaha_peternakan == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                        <option value="Ya" {{ $item->usaha_peternakan == 'Ya' ? 'selected' : '' }}>Ya</option>
                        <option value="Lainnya" {{ $item->usaha_peternakan == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>

                {{-- Usaha Perkebunan --}}
                <div class="col">
                    <label class="form-label">Usaha Perkebunan</label>
                    <select name="usaha_perkebunan" class="form-control">
                        <option value="Tidak" {{ $item->usaha_perkebunan == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                        <option value="Ya" {{ $item->usaha_perkebunan == 'Ya' ? 'selected' : '' }}>Ya</option>
                        <option value="Lainnya" {{ $item->usaha_perkebunan == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>

                {{-- Usaha Swalayan --}}
                <div class="col">
                    <label class="form-label">Usaha Swalayan</label>
                    <select name="usaha_swlayan" class="form-control">
                        <option value="Tidak" {{ $item->usaha_swlayan == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                        <option value="Ya" {{ $item->usaha_swlayan == 'Ya' ? 'selected' : '' }}>Ya</option>
                        <option value="Lainnya" {{ $item->usaha_swlayan == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>

                {{-- Usaha Pasar Swalayan --}}
                <div class="col">
                    <label class="form-label">Usaha Pasar Swalayan</label>
                    <select name="usaha_pasar_swlayan" class="form-control">
                        <option value="Tidak" {{ $item->usaha_pasar_swlayan == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                        <option value="Ya" {{ $item->usaha_pasar_swlayan == 'Ya' ? 'selected' : '' }}>Ya</option>
                        <option value="Lainnya" {{ $item->usaha_pasar_swlayan == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>

                {{-- Usaha Pasar Tradisional --}}
                <div class="col">
                    <label class="form-label">Usaha Pasar Tradisional</label>
                    <select name="usaha_pasar_tradisional" class="form-control">
                        <option value="Tidak" {{ $item->usaha_pasar_tradisional == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                        <option value="Ya" {{ $item->usaha_pasar_tradisional == 'Ya' ? 'selected' : '' }}>Ya</option>
                        <option value="Lainnya" {{ $item->usaha_pasar_tradisional == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>

                {{-- Usaha Pasar Desa --}}
                <div class="col">
                    <label class="form-label">Usaha Pasar Desa</label>
                    <select name="usaha_pasar_desa" class="form-control">
                        <option value="Tidak" {{ $item->usaha_pasar_desa == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                        <option value="Ya" {{ $item->usaha_pasar_desa == 'Ya' ? 'selected' : '' }}>Ya</option>
                        <option value="Lainnya" {{ $item->usaha_pasar_desa == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>

                {{-- Usaha Transportasi --}}
                <div class="col">
                    <label class="form-label">Usaha Transportasi</label>
                    <select name="usaha_transportasi" class="form-control">
                        <option value="Tidak" {{ $item->usaha_transportasi == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                        <option value="Ya" {{ $item->usaha_transportasi == 'Ya' ? 'selected' : '' }}>Ya</option>
                        <option value="Lainnya" {{ $item->usaha_transportasi == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>

                {{-- Saham --}}
                <div class="col">
                    <label class="form-label">Saham</label>
                    <select name="saham" class="form-control">
                        <option value="Tidak" {{ $item->saham == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                        <option value="Ya" {{ $item->saham == 'Ya' ? 'selected' : '' }}>Ya</option>
                        <option value="Lainnya" {{ $item->saham == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>

                {{-- Telkom --}}
                <div class="col">
                    <label class="form-label">Telkom</label>
                    <select name="telkom" class="form-control">
                        <option value="Tidak" {{ $item->telkom == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                        <option value="Ya" {{ $item->telkom == 'Ya' ? 'selected' : '' }}>Ya</option>
                        <option value="Lainnya" {{ $item->telkom == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>

                {{-- HP GSM --}}
                <div class="col">
                    <label class="form-label">HP GSM</label>
                    <select name="hp_gsm" class="form-control">
                        <option value="Tidak" {{ $item->hp_gsm == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                        <option value="Ya" {{ $item->hp_gsm == 'Ya' ? 'selected' : '' }}>Ya</option>
                        <option value="Lainnya" {{ $item->hp_gsm == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>

                {{-- HP CDMA --}}
                <div class="col">
                    <label class="form-label">HP CDMA</label>
                    <select name="hp_cdma" class="form-control">
                        <option value="Tidak" {{ $item->hp_cdma == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                        <option value="Ya" {{ $item->hp_cdma == 'Ya' ? 'selected' : '' }}>Ya</option>
                        <option value="Lainnya" {{ $item->hp_cdma == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>

                {{-- Wartel --}}
                <div class="col">
                    <label class="form-label">Wartel</label>
                    <select name="wartel" class="form-control">
                        <option value="Tidak" {{ $item->wartel == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                        <option value="Ya" {{ $item->wartel == 'Ya' ? 'selected' : '' }}>Ya</option>
                        <option value="Lainnya" {{ $item->wartel == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>

                {{-- Parabola --}}
                <div class="col">
                    <label class="form-label">Parabola</label>
                    <select name="parabola" class="form-control">
                        <option value="Tidak" {{ $item->parabola == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                        <option value="Ya" {{ $item->parabola == 'Ya' ? 'selected' : '' }}>Ya</option>
                        <option value="Lainnya" {{ $item->parabola == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>

                {{-- Koran --}}
                <div class="col">
                    <label class="form-label">Koran</label>
                    <select name="koran" class="form-control">
                        <option value="Tidak" {{ $item->koran == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                        <option value="Ya" {{ $item->koran == 'Ya' ? 'selected' : '' }}>Ya</option>
                        <option value="Lainnya" {{ $item->koran == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
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
