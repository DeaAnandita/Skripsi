<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Bangun Keluarga
        </h2>
    </x-slot>
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

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="mb-4">Edit Data Bangun Keluarga</h2>

                    <form action="{{ route('bangunkeluarga.update', $item->id) }}" method="POST">
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
                                    <select name="{{ $name }}" id="{{ $name }}" class="form-control">
                                        <option value="">Silahkan Pilih</option>
                                        <option value="Ya" {{ $item->$name == 'Ya' ? 'selected' : '' }}>Ya</option>
                                        <option value="Tidak" {{ $item->$name == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                    </select>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('bangunkeluarga.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

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
                    <h2 class="mb-4">Edit Data Bangun Keluarga</h2>

                    <form action="{{ route('bangunkeluarga.update', $item->id) }}" method="POST">
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
                            {{-- Jumlah Anggota --}}
                            <div>
                                <label for="jumlah_anggota" class="block text-sm font-medium text-gray-700">Jumlah anggota keluarga :</label>
                                <select name="jumlah_anggota" id="jumlah_anggota" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya" {{ $item->jumlah_anggota == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>

                            {{-- Pendidikan Kepala --}}
                            <div class="col">
                                <label class="form-label">Pendidikan kepala keluarga</label>
                                <select name="pendidikan_kepala" class="form-control">
                                    <option value="Tidak" {{ $item->pendidikan_kepala == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                    <option value="Ya" {{ $item->pendidikan_kepala == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Lainnya" {{ $item->pendidikan_kepala == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>

                            {{-- Pekerjaan Kepala --}}
                            <div class="col">
                                <label class="form-label">Pekerjaan kepala keluarga</label>
                                <select name="pekerjaan_kepala" class="form-control">
                                    <option value="Tidak" {{ $item->pekerjaan_kepala == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                    <option value="Ya" {{ $item->pekerjaan_kepala == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Lainnya" {{ $item->pekerjaan_kepala == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>

                            {{-- Status Pernikahan --}}
                            <div class="col">
                                <label class="form-label">Status pernikahan</label>
                                <select name="status_pernikahan" class="form-control">
                                    <option value="Tidak" {{ $item->status_pernikahan == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                    <option value="Ya" {{ $item->status_pernikahan == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Lainnya" {{ $item->status_pernikahan == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>

                            {{-- Jumlah Anak --}}
                            <div class="col">
                                <label class="form-label">Jumlah anak</label>
                                <select name="jumlah_anak" class="form-control">
                                    <option value="Tidak" {{ $item->jumlah_anak == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                    <option value="Ya" {{ $item->jumlah_anak == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Lainnya" {{ $item->jumlah_anak == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>

                            {{-- Pendapatan Keluarga --}}
                            <div class="col">
                                <label class="form-label">Pendapatan keluarga</label>
                                <select name="pendapatan_keluarga" class="form-control">
                                    <option value="Tidak" {{ $item->pendapatan_keluarga == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                    <option value="Ya" {{ $item->pendapatan_keluarga == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Lainnya" {{ $item->pendapatan_keluarga == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>

                            {{-- Status Kesehatan --}}
                            <div class="col">
                                <label class="form-label">Status kesehatan</label>
                                <select name="status_kesehatan" class="form-control">
                                    <option value="Tidak" {{ $item->status_kesehatan == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                    <option value="Ya" {{ $item->status_kesehatan == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Lainnya" {{ $item->status_kesehatan == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>

                            {{-- Akses Pendidikan --}}
                            <div class="col">
                                <label class="form-label">Akses pendidikan</label>
                                <select name="akses_pendidikan" class="form-control">
                                    <option value="Tidak" {{ $item->akses_pendidikan == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                    <option value="Ya" {{ $item->akses_pendidikan == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Lainnya" {{ $item->akses_pendidikan == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>

                            {{-- Akses Kesehatan --}}
                            <div class="col">
                                <label class="form-label">Akses kesehatan</label>
                                <select name="akses_kesehatan" class="form-control">
                                    <option value="Tidak" {{ $item->akses_kesehatan == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                    <option value="Ya" {{ $item->akses_kesehatan == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Lainnya" {{ $item->akses_kesehatan == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>

                            {{-- Program Bantuan --}}
                            <div class="col">
                                <label class="form-label">Program bantuan</label>
                                <select name="program_bantuan" class="form-control">
                                    <option value="Tidak" {{ $item->program_bantuan == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                    <option value="Ya" {{ $item->program_bantuan == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Lainnya" {{ $item->program_bantuan == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>

                            {{-- Keaktifan Kegiatan --}}
                            <div class="col">
                                <label class="form-label">Keaktifan kegiatan</label>
                                <select name="keaktifan_kegiatan" class="form-control">
                                    <option value="Tidak" {{ $item->keaktifan_kegiatan == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                    <option value="Ya" {{ $item->keaktifan_kegiatan == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Lainnya" {{ $item->keaktifan_kegiatan == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>

                            {{-- Keterlibatan Komunitas --}}
                            <div class="col">
                                <label class="form-label">Keterlibatan komunitas</label>
                                <select name="keterlibatan_komunitas" class="form-control">
                                    <option value="Tidak" {{ $item->keterlibatan_komunitas == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                    <option value="Ya" {{ $item->keterlibatan_komunitas == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Lainnya" {{ $item->keterlibatan_komunitas == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>

                            {{-- Status Ekonomi --}}
                            <div class="col">
                                <label class="form-label">Status ekonomi</label>
                                <select name="status_ekonomi" class="form-control">
                                    <option value="Tidak" {{ $item->status_ekonomi == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                    <option value="Ya" {{ $item->status_ekonomi == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Lainnya" {{ $item->status_ekonomi == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>

                            {{-- Kebutuhan/Masalah --}}
                            <div class="col">
                                <label class="form-label">Kebutuhan/masalah</label>
                                <select name="kebutuhan_masalah" class="form-control">
                                    <option value="Tidak" {{ $item->kebutuhan_masalah == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                    <option value="Ya" {{ $item->kebutuhan_masalah == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Lainnya" {{ $item->kebutuhan_masalah == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('bangunkeluarga.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
