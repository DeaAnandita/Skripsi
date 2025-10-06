<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Bangun Keluarga
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
            background-color: #f9f9f9;
            color: #000;
            padding: 10px;
            font-size: 16px;
            text-align: left;
            border-radius: 6px;
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="mb-4">Edit Data Bangun Keluarga</h2>

                    <form action="{{ route('bangun-keluarga.update', $item->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Surveyor -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Surveyor</label>
                            <select name="user_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                <option value="">-- Pilih Surveyor --</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ $item->user_id == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="md:col-span-2">
                            <!-- Nomor KK -->
                            <div>
                                <label for="no_kk" class="block text-sm font-medium text-gray-700">Nomor KK</label>
                                <input type="text" name="no_kk" id="no_kk" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                       value="{{ old('no_kk', $item->no_kk) }}">
                            </div>

                        <div class="grid-container">
                            @php
                                $fields = [
                                    'pakaian_berbeda' => 'Memiliki pakaian berbeda untuk acara',
                                    'ikut_kb' => 'Mengikuti program KB',
                                    'ikut_kegiatan_rt' => 'Ikut kegiatan RT',
                                    'ikut_posyandu' => 'Ikut posyandu',
                                    'remaja_ikut_pik' => 'Remaja ikut PIK-R',
                                    'anggota_merokok' => 'Ada anggota merokok',
                                    'anak_mengemisi' => 'Ada anak mengemis',
                                    'anggota_cacat_fisik' => 'Ada anggota cacat fisik',
                                    'makan_protein' => 'Makan protein hewani',
                                    'memiliki_tabungan' => 'Memiliki tabungan',
                                    'akses_informasi' => 'Memiliki akses informasi',
                                    'ikut_bkb' => 'Ikut BKB',
                                    'ikut_bkl' => 'Ikut BKL',
                                    'ikut_bkr' => 'Ikut BKR',
                                    'ikut_uppks' => 'Ikut UPPKS',
                                    'ibadah_sesuai_agama' => 'Ibadah sesuai agama',
                                    'komunikasi_keluarga' => 'Komunikasi keluarga baik',
                                    'pengurus_kegiatan_sosial' => 'Pengurus kegiatan sosial',
                                    'lansia_diatas_60' => 'Ada lansia di atas 60 tahun',
                                    'anak_jalanan' => 'Ada anak jalanan',
                                    'pengemis' => 'Ada pengemis',
                                    'pengamen' => 'Ada pengamen',
                                    'gila_stres' => 'Ada anggota gila/stres',
                                    'kelainan_kulit' => 'Ada kelainan kulit',
                                ];
                            @endphp

                            @foreach($fields as $name => $label)
                                <div>
                                    <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">{{ $label }}</label>
                                    <select name="{{ $name }}" id="{{ $name }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                        <option value="">Silahkan Pilih</option>
                                        <option value="Ya" {{ $item->$name == 'Ya' ? 'selected' : '' }}>Ya</option>
                                        <option value="Tidak" {{ $item->$name == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                    </select>
                                </div>
                            @endforeach
                        </div>

                        <!-- Tombol -->
                        <div class="mt-6 flex gap-3">
                            <button type="submit" class="bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">Update</button>
                            <a href="{{ route('bangun-keluarga.index') }}" class="bg-gray-500 text-white font-bold py-2 px-4 rounded hover:bg-gray-600">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>