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

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold mb-4">Form Bangun Keluarga</h2>

                    <form method="POST" action="{{ route('bangun-keluarga.store') }}">
                        @csrf
                        <div>

                        <!-- Surveyor -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Surveyor</label>
                            <input type="text" value="{{ auth()->user()->name }}" readonly
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm bg-gray-100 text-gray-700">
                            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                        </div>

                        {{-- Tambahkan ini di <head> layout utama jika belum ada (atau di atas form) --}}
                        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Nomor KK</label>
                        <select name="dasar_keluarga_id" id="nomorKKSelect" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            <option value="">-- Pilih KK --</option>
                            @foreach($dasar_keluargas as $dasar_keluarga)  {{-- Atau $kk_dropdowns jika dari model lain --}}
                                <option value="{{ $dasar_keluarga->id }}">
                                    {{ $dasar_keluarga->no_kk }} - {{ $dasar_keluarga->kepala_keluarga }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <script>
                    $(document).ready(function() {
                        // Inisialisasi Select2 dengan tags: true untuk bisa ketik baru
                        $('#nomorKKSelect').select2({
                            placeholder: '-- Pilih KK --',
                            allowClear: true,
                            tags: true,  // Ini kuncinya: izinkan ketik & buat opsi baru
                            createTag: function (params) {
                                var term = $.trim(params.term);
                                if (term === '') {
                                    return null;
                                }
                                // Validasi format: harus ada angka - nama (seperti screenshot)
                                if (!term.match(/^\d+\s*-\s*.+$/)) {
                                    return null;  // Blokir jika format salah
                                }
                                return {
                                    id: term,  // Value = text itu sendiri untuk new
                                    text: term,
                                    newOption: true  // Flag untuk backend
                                };
                            },
                            insertTag: function (data, tag) {
                                // Auto-insert tag baru saat Enter atau pilih
                                data.push(tag);
                            },
                            templateResult: function(data) {
                                if (data.newOption) {
                                    return $('<span class="text-blue-600">Baru: ' + data.text + '</span>');
                                }
                                return data.text;
                            },
                            dropdownParent: $('#nomorKKSelect').parent()  // Biar dropdown nggak overflow modal jika ada
                        });

                        // Event: Saat pilih (existing atau new)
                        $('#nomorKKSelect').on('select2:select', function (e) {
                            var data = e.params.data;
                            if (data.newOption) {
                                console.log('New KK: ' + data.text);  // Debug, hapus nanti
                                // Optional: AJAX save ke DB untuk sync
                            } else {
                                console.log('Existing ID: ' + data.id);
                            }
                        });
                    });
                    </script>

                        <div class="grid-container">
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
