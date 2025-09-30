<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Data Bantuan Sosial') }}
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
            font-size: 16px;
            text-align: left;
        }
        .input-field {
            margin-top: 0.25rem;
            width: 100%;
            border-radius: 0.375rem;
            border: 1px solid #d1d5db;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        }
        .input-field:focus {
            border-color: #4f46e5;
            outline: none;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.2);
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Error Handling -->
            @if ($errors->any())
                <div class="mb-4 p-4 rounded-md bg-red-100 text-red-800">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold mb-4">PENDATAAN BANTUAN SOSIAL</h2>
                    <form method="POST" action="{{ route('bantuan-sosial.store') }}">
                        @csrf

                        <!-- Keluarga Selection -->
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

                        <!-- Surveyor Selection -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Petugas</label>
                            <select name="petugas_id" class="input-field" required>
                                <option value="">-- Pilih Petugas --</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Social Assistance Programs -->
                        <div class="grid-container">
                            <!-- Row 1: KKS/KPS, PKH, Raskin/BPNT -->
                            <div>
                                <label for="kks_kps" class="block text-sm font-medium text-gray-700">Menerima KKS/KPS:</label>
                                <select name="kks_kps" id="kks_kps" class="input-field">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                                <input type="text" name="kks_kps_lainnya" id="kks_kps_lainnya" class="input-field mt-2" placeholder="Keterangan jika Lainnya">
                            </div>
                            <div>
                                <label for="pkh" class="block text-sm font-medium text-gray-700">Menerima PKH:</label>
                                <select name="pkh" id="pkh" class="input-field">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                                <input type="text" name="pkh_lainnya" id="pkh_lainnya" class="input-field mt-2" placeholder="Keterangan jika Lainnya">
                            </div>
                            <div>
                                <label for="raskin_bpnt" class="block text-sm font-medium text-gray-700">Menerima Raskin/BPNT:</label>
                                <select name="raskin_bpnt" id="raskin_bpnt" class="input-field">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                                <input type="text" name="raskin_bpnt_lainnya" id="raskin_bpnt_lainnya" class="input-field mt-2" placeholder="Keterangan jika Lainnya">
                            </div>

                            <!-- Row 2: KIP, KIS, Jamsostek -->
                            <div>
                                <label for="kip" class="block text-sm font-medium text-gray-700">Menerima KIP:</label>
                                <select name="kip" id="kip" class="input-field">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                                <input type="text" name="kip_lainnya" id="kip_lainnya" class="input-field mt-2" placeholder="Keterangan jika Lainnya">
                            </div>
                            <div>
                                <label for="kis" class="block text-sm font-medium text-gray-700">Menerima KIS:</label>
                                <select name="kis" id="kis" class="input-field">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                                <input type="text" name="kis_lainnya" id="kis_lainnya" class="input-field mt-2" placeholder="Keterangan jika Lainnya">
                            </div>
                            <div>
                                <label for="jamsostek_bpjs_ketenagakerjaan" class="block text-sm font-medium text-gray-700">Menerima Jamsostek/BPJS Ketenagakerjaan:</label>
                                <select name="jamsostek_bpjs_ketenagakerjaan" id="jamsostek_bpjs_ketenagakerjaan" class="input-field">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                                <input type="text" name="jamsostek_bpjs_ketenagakerjaan_lainnya" id="jamsostek_bpjs_ketenagakerjaan_lainnya" class="input-field mt-2" placeholder="Keterangan jika Lainnya">
                            </div>

                            <!-- Row 3: Other Insurance, Verification Status -->
                            <div>
                                <label for="peserta_mandiri_asuransi_lain" class="block text-sm font-medium text-gray-700">Peserta Mandiri Asuransi Lain:</label>
                                <select name="peserta_mandiri_asuransi_lain" id="peserta_mandiri_asuransi_lain" class="input-field">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                                <input type="text" name="peserta_mandiri_asuransi_lain_lainnya" id="peserta_mandiri_asuransi_lain_lainnya" class="input-field mt-2" placeholder="Keterangan jika Lainnya">
                            </div>
                            <div>
                                <label for="status_verifikasi" class="block text-sm font-medium text-gray-700">Status Verifikasi:</label>
                                <select name="status_verifikasi" id="status_verifikasi" class="input-field">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Belum Diverifikasi">Belum Diverifikasi</option>
                                    <option value="Sedang Diverifikasi">Sedang Diverifikasi</option>
                                    <option value="Diverifikasi">Diverifikasi</option>
                                    <option value="Ditolak">Ditolak</option>
                                </select>
                                <input type="text" name="alasan_ditolak" id="alasan_ditolak" class="input-field mt-2" placeholder="Alasan jika Ditolak">
                            </div>
                            <div>
                                <label for="tanggal_usul" class="block text-sm font-medium text-gray-700">Tanggal Usul:</label>
                                <input type="date" name="tanggal_usul" id="tanggal_usul" class="input-field">
                            </div>

                            <!-- Row 4: Verification and Designation Dates -->
                            <div>
                                <label for="tanggal_verifikasi" class="block text-sm font-medium text-gray-700">Tanggal Verifikasi:</label>
                                <input type="date" name="tanggal_verifikasi" id="tanggal_verifikasi" class="input-field">
                            </div>
                            <div>
                                <label for="tanggal_penetapan" class="block text-sm font-medium text-gray-700">Tanggal Penetapan:</label>
                                <input type="date" name="tanggal_penetapan" id="tanggal_penetapan" class="input-field">
                            </div>
                            <div>
                                <label for="sk_nomor" class="block text-sm font-medium text-gray-700">Nomor SK:</label>
                                <input type="text" name="sk_nomor" id="sk_nomor" class="input-field" placeholder="Nomor SK Kepala Desa">
                            </div>

                            <!-- Row 5: Distribution Details -->
                            <div>
                                <label for="jenis_distribusi" class="block text-sm font-medium text-gray-700">Jenis Distribusi:</label>
                                <select name="jenis_distribusi" id="jenis_distribusi" class="input-field">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Uang Tunai">Uang Tunai</option>
                                    <option value="Barang">Barang</option>
                                    <option value="Kartu/Keanggotaan">Kartu/Keanggotaan</option>
                                    <option value="Tidak Ada">Tidak Ada</option>
                                </select>
                            </div>
                            <div>
                                <label for="jumlah_bantuan" class="block text-sm font-medium text-gray-700">Jumlah Bantuan:</label>
                                <input type="number" name="jumlah_bantuan" id="jumlah_bantuan" class="input-field" step="0.01" placeholder="Jumlah dalam IDR atau kuantitas">
                            </div>
                            <div>
                                <label for="tanggal_distribusi" class="block text-sm font-medium text-gray-700">Tanggal Distribusi:</label>
                                <input type="date" name="tanggal_distribusi" id="tanggal_distribusi" class="input-field">
                            </div>

                            <!-- Row 6: Distribution Proof and Monitoring -->
                            {{-- <div>
                                <label for="bukti_distribusi" class="block text-sm font-medium text-gray-700">Bukti Distribusi:</label>
                                <input type="file" name="bukti_distribusi" id="bukti_distribusi" class="input-field" accept="image/*,application/pdf">
                            </div> --}}
                            <div>
                                <label for="catatan_monitoring" class="block text-sm font-medium text-gray-700">Catatan Monitoring:</label>
                                <textarea name="catatan_monitoring" id="catatan_monitoring" class="input-field" placeholder="Catatan dari BPD atau petugas"></textarea>
                            </div>
                            <div>
                                <label for="status_transparansi" class="block text-sm font-medium text-gray-700">Status Transparansi:</label>
                                <select name="status_transparansi" id="status_transparansi" class="input-field">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Internal">Internal (Desa)</option>
                                    <option value="Eksternal">Eksternal (Kecamatan)</option>
                                    <option value="Publik">Publik (Website)</option>
                                </select>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="mt-6 w-full bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-green-600">
                            KIRIM
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>