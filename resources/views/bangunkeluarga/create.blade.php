<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Data Bangun Keluarga') }}
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
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 15px;
        }
    </style>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold mb-4">Form Bangun Keluarga</h2>

                    <form method="POST" action="{{ route('bangunkeluarga.store') }}">
                        @csrf

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Surveyor</label>
                            <select name="user_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                <option value="">-- Pilih Surveyor --</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="grid-container mt-6">
                            @php
                                $fields = [
                                    'pakaian_berbeda' => 'Keluarga memiliki pakaian berbeda untuk acara',
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
                                    'komunikasi_keluarga' => 'Komunikasi dalam keluarga',
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
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>
                            @endforeach
                        </div>

                        <button type="submit" class="mt-6 w-full bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-green-600">
                            SIMPAN DATA
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
