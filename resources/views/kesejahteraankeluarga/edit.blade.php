<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Kesejahteraan Keluarga') }}
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
                    <h2 class="mb-4">Edit Data Kesejahteraan Keluarga</h2>

                    <form action="{{ route('kesejahteraankeluarga.update', $item->id) }}" method="POST">
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
                            {{-- Pendapatan Stabil --}}
                            <div>
                                <label for="pendapatan_stabil" class="block text-sm font-medium text-gray-700">Pendapatan stabil :</label>
                                <select name="pendapatan_stabil" id="pendapatan_stabil" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya" {{ $item->pendapatan_stabil == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ $item->pendapatan_stabil == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                </select>
                            </div>

                            {{-- Akses Pendidikan --}}
                            <div>
                                <label for="akses_pendidikan" class="block text-sm font-medium text-gray-700">Akses pendidikan :</label>
                                <select name="akses_pendidikan" id="akses_pendidikan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya" {{ $item->akses_pendidikan == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ $item->akses_pendidikan == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                </select>
                            </div>

                            {{-- Akses Kesehatan --}}
                            <div>
                                <label for="akses_kesehatan" class="block text-sm font-medium text-gray-700">Akses kesehatan :</label>
                                <select name="akses_kesehatan" id="akses_kesehatan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya" {{ $item->akses_kesehatan == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ $item->akses_kesehatan == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                </select>
                            </div>

                            {{-- Sanitasi Baik --}}
                            <div>
                                <label for="sanitasi_baik" class="block text-sm font-medium text-gray-700">Sanitasi baik :</label>
                                <select name="sanitasi_baik" id="sanitasi_baik" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya" {{ $item->sanitasi_baik == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ $item->sanitasi_baik == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                </select>
                            </div>

                            {{-- Air Bersih --}}
                            <div>
                                <label for="air_bersih" class="block text-sm font-medium text-gray-700">Air bersih :</label>
                                <select name="air_bersih" id="air_bersih" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya" {{ $item->air_bersih == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ $item->air_bersih == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                </select>
                            </div>

                            {{-- Listrik Rumah --}}
                            <div>
                                <label for="listrik_rumah" class="block text-sm font-medium text-gray-700">Listrik rumah :</label>
                                <select name="listrik_rumah" id="listrik_rumah" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya" {{ $item->listrik_rumah == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ $item->listrik_rumah == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                </select>
                            </div>

                            {{-- Pangan Cukup --}}
                            <div>
                                <label for="pangan_cukup" class="block text-sm font-medium text-gray-700">Pangan cukup :</label>
                                <select name="pangan_cukup" id="pangan_cukup" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya" {{ $item->pangan_cukup == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ $item->pangan_cukup == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                </select>
                            </div>

                            {{-- Tabungan Aset --}}
                            <div>
                                <label for="tabungan_aset" class="block text-sm font-medium text-gray-700">Tabungan/aset :</label>
                                <select name="tabungan_aset" id="tabungan_aset" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya" {{ $item->tabungan_aset == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ $item->tabungan_aset == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                </select>
                            </div>

                            {{-- Jaminan Sosial --}}
                            <div>
                                <label for="jaminan_sosial" class="block text-sm font-medium text-gray-700">Jaminan sosial :</label>
                                <select name="jaminan_sosial" id="jaminan_sosial" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya" {{ $item->jaminan_sosial == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ $item->jaminan_sosial == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                </select>
                            </div>

                            {{-- Pekerjaan Keluarga --}}
                            <div>
                                <label for="pekerjaan_keluarga" class="block text-sm font-medium text-gray-700">Pekerjaan keluarga :</label>
                                <select name="pekerjaan_keluarga" id="pekerjaan_keluarga" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya" {{ $item->pekerjaan_keluarga == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ $item->pekerjaan_keluarga == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                </select>
                            </div>

                            {{-- Akses Internet --}}
                            <div>
                                <label for="akses_internet" class="block text-sm font-medium text-gray-700">Akses internet :</label>
                                <select name="akses_internet" id="akses_internet" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya" {{ $item->akses_internet == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ $item->akses_internet == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                </select>
                            </div>

                            {{-- Transportasi --}}
                            <div>
                                <label for="transportasi" class="block text-sm font-medium text-gray-700">Transportasi :</label>
                                <select name="transportasi" id="transportasi" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya" {{ $item->transportasi == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ $item->transportasi == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                </select>
                            </div>

                            {{-- Rumah Layak Huni --}}
                            <div>
                                <label for="rumah_layak_huni" class="block text-sm font-medium text-gray-700">Rumah layak huni :</label>
                                <select name="rumah_layak_huni" id="rumah_layak_huni" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya" {{ $item->rumah_layak_huni == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ $item->rumah_layak_huni == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                </select>
                            </div>

                            {{-- Pakaian Layak --}}
                            <div>
                                <label for="pakaian_layak" class="block text-sm font-medium text-gray-700">Pakaian layak :</label>
                                <select name="pakaian_layak" id="pakaian_layak" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya" {{ $item->pakaian_layak == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ $item->pakaian_layak == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                </select>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('kesejahteraankeluarga.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
