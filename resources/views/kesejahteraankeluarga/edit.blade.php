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

                    <form action="{{ route('kesejahteraan-keluarga.update', $item->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                       <!-- Surveyor -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Surveyor</label>
                            <select name="user_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                <option value="">-- Pilih User --</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ $item->user_id == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Nomor KK -->
                            <div>
                                <label for="no_kk" class="block text-sm font-medium text-gray-700">Nomor KK</label>
                                <input type="text" name="no_kk" id="no_kk" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                       value="{{ old('no_kk', $item->no_kk) }}">
                            </div>
                        </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            {{-- Pendapatan Stabil --}}
                             <div>
                                <label class="block text-sm font-medium text-gray-700">Pendapatan Stabil</label>
                                <input type="text" name="pendapatan_stabil" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            {{-- Akses Pendidikan --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Akses Pendidikan</label>
                                <input type="text" name="akses_pendidikan" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            {{-- Akses Kesehatan --}}
                             <div>
                                <label class="block text-sm font-medium text-gray-700">Akses Kesehatan</label>
                                <input type="text" name="akses_kesehatan" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            {{-- Sanitasi Baik --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Sanitasi Baik</label>
                                <input type="text" name="sanitasi_baik" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            {{-- Air Bersih --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Air Bersih</label>
                                <input type="text" name="air_bersih" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            {{-- Listrik Rumah --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Listrik Rumah</label>
                                <input type="text" name="listrik_rumah" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            {{-- Pangan Cukup --}}
                             <div>
                                <label class="block text-sm font-medium text-gray-700">Pangan Cukup</label>
                                <input type="text" name="pangan_cukup" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            {{-- Tabungan Aset --}}
                             <div>
                                <label class="block text-sm font-medium text-gray-700">Tabungan Aset</label>
                                <input type="text" name="tabungan_aset" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            {{-- Jaminan Sosial --}}
                             <div>
                                <label class="block text-sm font-medium text-gray-700">Jaminan Sosial</label>
                                <input type="text" name="jaminan_sosial" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            {{-- Pekerjaan Keluarga --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Pekerjaan Keluarga</label>
                                <input type="text" name="pekerjaan_keluarga" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            {{-- Akses Internet --}}
                             <div>
                                <label class="block text-sm font-medium text-gray-700">Akses Internet</label>
                                <input type="text" name="akses_internet" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            {{-- Transportasi --}}
                           <div>
                                <label class="block text-sm font-medium text-gray-700">Transportasi</label>
                                <input type="text" name="transportasi" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            {{-- Rumah Layak Huni --}}
                             <div>
                                <label class="block text-sm font-medium text-gray-700">Rumah Layak Huni</label>
                                <input type="text" name="rumah_layak_huni" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            {{-- Pakaian Layak --}}
                           <div>
                                <label class="block text-sm font-medium text-gray-700">Pakaian Layak</label>
                                <input type="text" name="pakaian_layak" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>
                        </div>

                        <!-- Tombol -->
                        <div class="mt-6 flex gap-3">
                            <button type="submit" class="bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">Update</button>
                            <a href="{{ route('dasar-keluarga.index') }}" class="bg-gray-500 text-white font-bold py-2 px-4 rounded hover:bg-gray-600">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
