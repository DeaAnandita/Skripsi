<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Data Bantuan Sosial') }}
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
                    <h2 class="mb-4 text-2xl font-bold">Edit Data Bantuan Sosial</h2>

                    <form action="{{ route('bantuan-sosial.update', $item->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Petugas Penanganan -->
                        <div class="mb-4">
                            <label for="petugas_id" class="block text-sm font-medium text-gray-700">Petugas Penanganan</label>
                            <select name="petugas_id" id="petugas_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                <option value="">-- Pilih Petugas --</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ $item->petugas_id == $user->id ? 'selected' : '' }}>
                                        {{ $user->nama_lengkap }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Penerima (Input Manual) -->
                        <div class="mb-4 grid grid-cols-2 gap-4">
                            <div>
                                <label for="nik_manual" class="block text-sm font-medium text-gray-700">NIK (Manual)</label>
                                <input type="text" name="nik_manual" id="nik_manual" value="{{ old('nik_manual', $item->nik_manual) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" maxlength="16" placeholder="Masukkan NIK 16 digit">
                            </div>
                            <div>
                                <label for="nama_lengkap" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" id="nama_lengkap" value="{{ old('nama_lengkap', $item->nama_lengkap) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Masukkan nama lengkap">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="dokumen_pendukung" class="block text-sm font-medium text-gray-700">Dokumen Pendukung</label>
                            <input type="file" name="dokumen_pendukung" id="dokumen_pendukung" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            <small class="text-gray-500">Kosongkan jika tidak ingin mengganti dokumen.</small>
                        </div>

                        <!-- Program Bantuan (Grid Layout) -->
                        <div class="grid-container gap-4">
                            <!-- Row 1: Program Sosial -->
                            <div>
                                <label for="kks_kps" class="block text-sm font-medium text-gray-700">KKS/KPS</label>
                                <select name="kks_kps" id="kks_kps" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya" {{ $item->kks_kps == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ $item->kks_kps == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                    <option value="Lainnya" {{ $item->kks_kps == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>
                            <div>
                                <label for="kks_kps_lainnya" class="block text-sm font-medium text-gray-700">KKS/KPS Lainnya</label>
                                <input type="text" name="kks_kps_lainnya" id="kks_kps_lainnya" value="{{ old('kks_kps_lainnya', $item->kks_kps_lainnya) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="Jika Lainnya">
                            </div>
                            <div>
                                <label for="pkh" class="block text-sm font-medium text-gray-700">PKH</label>
                                <select name="pkh" id="pkh" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya" {{ $item->pkh == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ $item->pkh == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                    <option value="Lainnya" {{ $item->pkh == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>
                            <div>
                                <label for="pkh_lainnya" class="block text-sm font-medium text-gray-700">PKH Lainnya</label>
                                <input type="text" name="pkh_lainnya" id="pkh_lainnya" value="{{ old('pkh_lainnya', $item->pkh_lainnya) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="Jika Lainnya">
                            </div>
                            <div>
                                <label for="raskin_bpnt" class="block text-sm font-medium text-gray-700">Raskin/BPNT</label>
                                <select name="raskin_bpnt" id="raskin_bpnt" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya" {{ $item->raskin_bpnt == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ $item->raskin_bpnt == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                    <option value="Lainnya" {{ $item->raskin_bpnt == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>
                            <div>
                                <label for="raskin_bpnt_lainnya" class="block text-sm font-medium text-gray-700">Raskin/BPNT Lainnya</label>
                                <input type="text" name="raskin_bpnt_lainnya" id="raskin_bpnt_lainnya" value="{{ old('raskin_bpnt_lainnya', $item->raskin_bpnt_lainnya) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="Jika Lainnya">
                            </div>

                            <!-- Row 2: Program Sosial Lanjutan -->
                            <div>
                                <label for="kip" class="block text-sm font-medium text-gray-700">KIP</label>
                                <select name="kip" id="kip" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya" {{ $item->kip == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ $item->kip == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                    <option value="Lainnya" {{ $item->kip == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>
                            <div>
                                <label for="kip_lainnya" class="block text-sm font-medium text-gray-700">KIP Lainnya</label>
                                <input type="text" name="kip_lainnya" id="kip_lainnya" value="{{ old('kip_lainnya', $item->kip_lainnya) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="Jika Lainnya">
                            </div>
                            <div>
                                <label for="kis" class="block text-sm font-medium text-gray-700">KIS</label>
                                <select name="kis" id="kis" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya" {{ $item->kis == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ $item->kis == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                    <option value="Lainnya" {{ $item->kis == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>
                            <div>
                                <label for="kis_lainnya" class="block text-sm font-medium text-gray-700">KIS Lainnya</label>
                                <input type="text" name="kis_lainnya" id="kis_lainnya" value="{{ old('kis_lainnya', $item->kis_lainnya) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="Jika Lainnya">
                            </div>
                            <div>
                                <label for="jamsostek_bpjs_ketenagakerjaan" class="block text-sm font-medium text-gray-700">Jamsostek/BPJS Ketenagakerjaan</label>
                                <select name="jamsostek_bpjs_ketenagakerjaan" id="jamsostek_bpjs_ketenagakerjaan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya" {{ $item->jamsostek_bpjs_ketenagakerjaan == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ $item->jamsostek_bpjs_ketenagakerjaan == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                    <option value="Lainnya" {{ $item->jamsostek_bpjs_ketenagakerjaan == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>
                            <div>
                                <label for="jamsostek_bpjs_ketenagakerjaan_lainnya" class="block text-sm font-medium text-gray-700">Jamsostek/BPJS Lainnya</label>
                                <input type="text" name="jamsostek_bpjs_ketenagakerjaan_lainnya" id="jamsostek_bpjs_ketenagakerjaan_lainnya" value="{{ old('jamsostek_bpjs_ketenagakerjaan_lainnya', $item->jamsostek_bpjs_ketenagakerjaan_lainnya) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="Jika Lainnya">
                            </div>

                            <!-- Row 3: Program Sosial Lanjutan -->
                            <div>
                                <label for="peserta_mandiri_asuransi_lain" class="block text-sm font-medium text-gray-700">Peserta Mandiri Asuransi Lain</label>
                                <select name="peserta_mandiri_asuransi_lain" id="peserta_mandiri_asuransi_lain" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya" {{ $item->peserta_mandiri_asuransi_lain == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ $item->peserta_mandiri_asuransi_lain == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                    <option value="Lainnya" {{ $item->peserta_mandiri_asuransi_lain == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>
                            <div>
                                <label for="peserta_mandiri_asuransi_lain_lainnya" class="block text-sm font-medium text-gray-700">Asuransi Lainnya</label>
                                <input type="text" name="peserta_mandiri_asuransi_lain_lainnya" id="peserta_mandiri_asuransi_lain_lainnya" value="{{ old('peserta_mandiri_asuransi_lain_lainnya', $item->peserta_mandiri_asuransi_lain_lainnya) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="Jika Lainnya">
                            </div>

                            <!-- Row 4: Validasi Data -->
                            <div>
                                <label for="verifikasi_identitas" class="block text-sm font-medium text-gray-700">Verifikasi Identitas</label>
                                <select name="verifikasi_identitas" id="verifikasi_identitas" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya" {{ $item->verifikasi_identitas == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ $item->verifikasi_identitas == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                    <option value="Lainnya" {{ $item->verifikasi_identitas == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>
                            <div>
                                <label for="verifikasi_identitas_lainnya" class="block text-sm font-medium text-gray-700">Verifikasi Identitas Lainnya</label>
                                <input type="text" name="verifikasi_identitas_lainnya" id="verifikasi_identitas_lainnya" value="{{ old('verifikasi_identitas_lainnya', $item->verifikasi_identitas_lainnya) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="Jika Lainnya">
                            </div>
                            <div>
                                <label for="data_lintas_sektor" class="block text-sm font-medium text-gray-700">Data Lintas Sektor</label>
                                <select name="data_lintas_sektor" id="data_lintas_sektor" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya" {{ $item->data_lintas_sektor == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ $item->data_lintas_sektor == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                    <option value="Lainnya" {{ $item->data_lintas_sektor == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>
                            <div>
                                <label for="data_lintas_sektor_lainnya" class="block text-sm font-medium text-gray-700">Data Lintas Sektor Lainnya</label>
                                <input type="text" name="data_lintas_sektor_lainnya" id="data_lintas_sektor_lainnya" value="{{ old('data_lintas_sektor_lainnya', $item->data_lintas_sektor_lainnya) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="Jika Lainnya">
                            </div>
                            <div>
                                <label for="konfirmasi_kepala_desa" class="block text-sm font-medium text-gray-700">Konfirmasi Kepala Desa</label>
                                <select name="konfirmasi_kepala_desa" id="konfirmasi_kepala_desa" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya" {{ $item->konfirmasi_kepala_desa == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ $item->konfirmasi_kepala_desa == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                    <option value="Lainnya" {{ $item->konfirmasi_kepala_desa == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>
                            <div>
                                <label for="konfirmasi_kepala_desa_lainnya" class="block text-sm font-medium text-gray-700">Konfirmasi Lainnya</label>
                                <input type="text" name="konfirmasi_kepala_desa_lainnya" id="konfirmasi_kepala_desa_lainnya" value="{{ old('konfirmasi_kepala_desa_lainnya', $item->konfirmasi_kepala_desa_lainnya) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="Jika Lainnya">
                            </div>

                            <!-- Row 5: Distribusi dan Status -->
                            <div>
                                <label for="status_verifikasi" class="block text-sm font-medium text-gray-700">Status Verifikasi</label>
                                <select name="status_verifikasi" id="status_verifikasi" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Usulan" {{ $item->status_verifikasi == 'Usulan' ? 'selected' : '' }}>Usulan</option>
                                    <option value="Diverifikasi" {{ $item->status_verifikasi == 'Diverifikasi' ? 'selected' : '' }}>Diverifikasi</option>
                                    <option value="Ditetapkan" {{ $item->status_verifikasi == 'Ditetapkan' ? 'selected' : '' }}>Ditetapkan</option>
                                    <option value="Dicabut" {{ $item->status_verifikasi == 'Dicabut' ? 'selected' : '' }}>Dicabut</option>
                                </select>
                            </div>
                            <div>
                                <label for="alasan_ditolak" class="block text-sm font-medium text-gray-700">Alasan Ditolak</label>
                                <input type="text" name="alasan_ditolak" id="alasan_ditolak" value="{{ old('alasan_ditolak', $item->alasan_ditolak) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="Jika Dicabut">
                            </div>
                            <div>
                                <label for="jenis_distribusi" class="block text-sm font-medium text-gray-700">Jenis Distribusi</label>
                                <select name="jenis_distribusi" id="jenis_distribusi" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Uang Tunai" {{ $item->jenis_distribusi == 'Uang Tunai' ? 'selected' : '' }}>Uang Tunai</option>
                                    <option value="Barang" {{ $item->jenis_distribusi == 'Barang' ? 'selected' : '' }}>Barang</option>
                                    <option value="Kartu/Keanggotaan" {{ $item->jenis_distribusi == 'Kartu/Keanggotaan' ? 'selected' : '' }}>Kartu/Keanggotaan</option>
                                    <option value="Tidak Ada" {{ $item->jenis_distribusi == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada</option>
                                </select>
                            </div>
                            <div>
                                <label for="jumlah_bantuan" class="block text-sm font-medium text-gray-700">Jumlah Bantuan</label>
                                <input type="number" name="jumlah_bantuan" id="jumlah_bantuan" value="{{ old('jumlah_bantuan', $item->jumlah_bantuan) }}" step="0.01" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="Masukkan jumlah">
                            </div>
                            <div>
                                <label for="tanggal_distribusi" class="block text-sm font-medium text-gray-700">Tanggal Distribusi</label>
                                <input type="date" name="tanggal_distribusi" id="tanggal_distribusi" value="{{ old('tanggal_distribusi', $item->tanggal_distribusi) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            </div>
                            <div>
                                <label for="bukti_distribusi" class="block text-sm font-medium text-gray-700">Bukti Distribusi</label>
                                <select name="bukti_distribusi" id="bukti_distribusi" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya" {{ $item->bukti_distribusi == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ $item->bukti_distribusi == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                    <option value="Lainnya" {{ $item->bukti_distribusi == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>
                            <div>
                                <label for="bukti_distribusi_lainnya" class="block text-sm font-medium text-gray-700">Bukti Distribusi Lainnya</label>
                                <input type="text" name="bukti_distribusi_lainnya" id="bukti_distribusi_lainnya" value="{{ old('bukti_distribusi_lainnya', $item->bukti_distribusi_lainnya) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="Jika Lainnya">
                            </div>
                        </div>

                        <!-- Status Program -->
                        <div class="mt-4">
                            <label for="status_program" class="block text-sm font-medium text-gray-700">Status Program</label>
                            <select name="status_program" id="status_program" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="">Silahkan Pilih</option>
                                <option value="Aktif" {{ $item->status_program == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="Non-Aktif" {{ $item->status_program == 'Non-Aktif' ? 'selected' : '' }}>Non-Aktif</option>
                            </select>
                        </div>

                        <!-- Submit dan Kembali -->
                        <div class="mt-4">
                            <button type="submit" class="bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-green-600">Update</button>
                            <a href="{{ route('bantuan-sosial.index') }}" class="ml-2 bg-gray-500 text-white font-bold py-2 px-4 rounded hover:bg-gray-700">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
