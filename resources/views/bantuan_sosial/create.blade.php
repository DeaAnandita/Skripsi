<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Data Bantuan Sosial') }}
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
                    <h2 class="text-2xl font-bold mb-4">PENDATAAN BANTUAN SOSIAL</h2>
                    <form method="POST" action="{{ route('bantuan-sosial.store') }}">
                        @csrf

                        <!-- Surveyor/Petugas -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Petugas Penanganan</label>
                            <select name="petugas_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                <option value="">-- Pilih Petugas --</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">
                                        {{ $user->nama_lengkap }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Penerima (Input Manual) -->
                        <div class="mb-4 grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">NIK (Manual)</label>
                                <input type="text" name="nik_manual" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" maxlength="16" placeholder="Masukkan NIK 16 digit">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Masukkan nama lengkap">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Dokumen Pendukung</label>
                            <input type="file" name="dokumen_pendukung" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>

                        <!-- Program Bantuan (Grid Layout) -->
                        <div class="grid-container gap-4">
                            <!-- Row 1: Program Sosial -->
                            <div>
                                <label for="kks_kps" class="block text-sm font-medium text-gray-700">KKS/KPS</label>
                                <select name="kks_kps" id="kks_kps" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div>
                                <label for="kks_kps_lainnya" class="block text-sm font-medium text-gray-700">KKS/KPS Lainnya</label>
                                <input type="text" name="kks_kps_lainnya" id="kks_kps_lainnya" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="Jika Lainnya">
                            </div>
                            <div>
                                <label for="pkh" class="block text-sm font-medium text-gray-700">PKH</label>
                                <select name="pkh" id="pkh" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div>
                                <label for="pkh_lainnya" class="block text-sm font-medium text-gray-700">PKH Lainnya</label>
                                <input type="text" name="pkh_lainnya" id="pkh_lainnya" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="Jika Lainnya">
                            </div>
                            <div>
                                <label for="raskin_bpnt" class="block text-sm font-medium text-gray-700">Raskin/BPNT</label>
                                <select name="raskin_bpnt" id="raskin_bpnt" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div>
                                <label for="raskin_bpnt_lainnya" class="block text-sm font-medium text-gray-700">Raskin/BPNT Lainnya</label>
                                <input type="text" name="raskin_bpnt_lainnya" id="raskin_bpnt_lainnya" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="Jika Lainnya">
                            </div>

                            <!-- Row 2: Program Sosial Lanjutan -->
                            <div>
                                <label for="kip" class="block text-sm font-medium text-gray-700">KIP</label>
                                <select name="kip" id="kip" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div>
                                <label for="kip_lainnya" class="block text-sm font-medium text-gray-700">KIP Lainnya</label>
                                <input type="text" name="kip_lainnya" id="kip_lainnya" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="Jika Lainnya">
                            </div>
                            <div>
                                <label for="kis" class="block text-sm font-medium text-gray-700">KIS</label>
                                <select name="kis" id="kis" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div>
                                <label for="kis_lainnya" class="block text-sm font-medium text-gray-700">KIS Lainnya</label>
                                <input type="text" name="kis_lainnya" id="kis_lainnya" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="Jika Lainnya">
                            </div>
                            <div>
                                <label for="jamsostek_bpjs_ketenagakerjaan" class="block text-sm font-medium text-gray-700">Jamsostek/BPJS Ketenagakerjaan</label>
                                <select name="jamsostek_bpjs_ketenagakerjaan" id="jamsostek_bpjs_ketenagakerjaan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div>
                                <label for="jamsostek_bpjs_ketenagakerjaan_lainnya" class="block text-sm font-medium text-gray-700">Jamsostek/BPJS Lainnya</label>
                                <input type="text" name="jamsostek_bpjs_ketenagakerjaan_lainnya" id="jamsostek_bpjs_ketenagakerjaan_lainnya" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="Jika Lainnya">
                            </div>

                            <!-- Row 3: Program Sosial Lanjutan -->
                            <div>
                                <label for="peserta_mandiri_asuransi_lain" class="block text-sm font-medium text-gray-700">Peserta Mandiri Asuransi Lain</label>
                                <select name="peserta_mandiri_asuransi_lain" id="peserta_mandiri_asuransi_lain" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div>
                                <label for="peserta_mandiri_asuransi_lain_lainnya" class="block text-sm font-medium text-gray-700">Asuransi Lainnya</label>
                                <input type="text" name="peserta_mandiri_asuransi_lain_lainnya" id="peserta_mandiri_asuransi_lain_lainnya" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="Jika Lainnya">
                            </div>

                            <!-- Row 4: Validasi Data -->
                            <div>
                                <label for="verifikasi_identitas" class="block text-sm font-medium text-gray-700">Verifikasi Identitas</label>
                                <select name="verifikasi_identitas" id="verifikasi_identitas" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div>
                                <label for="verifikasi_identitas_lainnya" class="block text-sm font-medium text-gray-700">Verifikasi Identitas Lainnya</label>
                                <input type="text" name="verifikasi_identitas_lainnya" id="verifikasi_identitas_lainnya" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="Jika Lainnya">
                            </div>
                            <div>
                                <label for="data_lintas_sektor" class="block text-sm font-medium text-gray-700">Data Lintas Sektor</label>
                                <select name="data_lintas_sektor" id="data_lintas_sektor" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div>
                                <label for="data_lintas_sektor_lainnya" class="block text-sm font-medium text-gray-700">Data Lintas Sektor Lainnya</label>
                                <input type="text" name="data_lintas_sektor_lainnya" id="data_lintas_sektor_lainnya" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="Jika Lainnya">
                            </div>
                            <div>
                                <label for="konfirmasi_kepala_desa" class="block text-sm font-medium text-gray-700">Konfirmasi Kepala Desa</label>
                                <select name="konfirmasi_kepala_desa" id="konfirmasi_kepala_desa" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div>
                                <label for="konfirmasi_kepala_desa_lainnya" class="block text-sm font-medium text-gray-700">Konfirmasi Lainnya</label>
                                <input type="text" name="konfirmasi_kepala_desa_lainnya" id="konfirmasi_kepala_desa_lainnya" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="Jika Lainnya">
                            </div>

                            <!-- Row 5: Distribusi dan Status -->
                            <div>
                                <label for="jenis_distribusi" class="block text-sm font-medium text-gray-700">Jenis Distribusi</label>
                                <select name="jenis_distribusi" id="jenis_distribusi" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Uang Tunai">Uang Tunai</option>
                                    <option value="Barang">Barang</option>
                                    <option value="Kartu/Keanggotaan">Kartu/Keanggotaan</option>
                                    <option value="Tidak Ada">Tidak Ada</option>
                                </select>
                            </div>
                            <div>
                                <label for="jumlah_bantuan" class="block text-sm font-medium text-gray-700">Jumlah Bantuan</label>
                                <input type="number" name="jumlah_bantuan" id="jumlah_bantuan" step="0.01" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="Masukkan jumlah">
                            </div>
                            <div>
                                <label for="tanggal_distribusi" class="block text-sm font-medium text-gray-700">Tanggal Distribusi</label>
                                <input type="date" name="tanggal_distribusi" id="tanggal_distribusi" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            </div>
                            <div>
                                <label for="bukti_distribusi" class="block text-sm font-medium text-gray-700">Bukti Distribusi</label>
                                <select name="bukti_distribusi" id="bukti_distribusi" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div>
                                <label for="bukti_distribusi_lainnya" class="block text-sm font-medium text-gray-700">Bukti Distribusi Lainnya</label>
                                <input type="text" name="bukti_distribusi_lainnya" id="bukti_distribusi_lainnya" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="Jika Lainnya">
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="mt-6 w-full bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-green-600">KIRIM</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
