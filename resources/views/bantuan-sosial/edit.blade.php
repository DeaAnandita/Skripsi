<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Data Bantuan Sosial
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
        .form-control {
            margin-top: 0.25rem;
            width: 100%;
            border-radius: 0.375rem;
            border: 1px solid #d1d5db;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        }
        .form-control:focus {
            border-color: #4f46e5;
            outline: none;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.2);
        }
        .btn {
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            font-weight: bold;
        }
        .btn-primary {
            background-color: #2563eb;
            color: white;
        }
        .btn-primary:hover {
            background-color: #1d4ed8;
        }
        .btn-secondary {
            background-color: #6b7280;
            color: white;
        }
        .btn-secondary:hover {
            background-color: #4b5563;
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="mb-4 text-2xl font-bold">Edit Data Bantuan Sosial</h2>

                    <form action="{{ route('bantuan-sosial.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Keluarga Selection -->
                        <div class="mb-3">
                            <label for="keluarga_id" class="form-label block text-sm font-medium text-gray-700">Pilih Keluarga</label>
                            <select name="keluarga_id" id="keluarga_id" class="form-control" required>
                                <option value="">-- Pilih Keluarga --</option>
                                @foreach($keluargas as $keluarga)
                                    <option value="{{ $keluarga->id }}" {{ $item->keluarga_id == $keluarga->id ? 'selected' : '' }}>
                                        {{ $keluarga->nama_kepala_keluarga }} (KK: {{ $keluarga->nomor_kk }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Petugas Selection -->
                        <div class="mb-3">
                            <label for="petugas_id" class="form-label block text-sm font-medium text-gray-700">Pilih Petugas</label>
                            <select name="petugas_id" id="petugas_id" class="form-control" required>
                                <option value="">-- Pilih Petugas --</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ $item->petugas_id == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="grid-container gap-4">
                            <!-- Row 1: KKS/KPS, PKH, Raskin/BPNT -->
                            <div>
                                <label for="kks_kps" class="block text-sm font-medium text-gray-700">Menerima KKS/KPS:</label>
                                <select name="kks_kps" id="kks_kps" class="form-control">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya" {{ $item->kks_kps == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ $item->kks_kps == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                    <option value="Lainnya" {{ $item->kks_kps == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                                <input type="text" name="kks_kps_lainnya" id="kks_kps_lainnya" class="form-control mt-2" placeholder="Keterangan jika Lainnya" value="{{ $item->kks_kps_lainnya }}">
                            </div>
                            <div>
                                <label for="pkh" class="block text-sm font-medium text-gray-700">Menerima PKH:</label>
                                <select name="pkh" id="pkh" class="form-control">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya" {{ $item->pkh == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ $item->pkh == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                    <option value="Lainnya" {{ $item->pkh == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                                <input type="text" name="pkh_lainnya" id="pkh_lainnya" class="form-control mt-2" placeholder="Keterangan jika Lainnya" value="{{ $item->pkh_lainnya }}">
                            </div>
                            <div>
                                <label for="raskin_bpnt" class="block text-sm font-medium text-gray-700">Menerima Raskin/BPNT:</label>
                                <select name="raskin_bpnt" id="raskin_bpnt" class="form-control">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya" {{ $item->raskin_bpnt == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ $item->raskin_bpnt == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                    <option value="Lainnya" {{ $item->raskin_bpnt == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                                <input type="text" name="raskin_bpnt_lainnya" id="raskin_bpnt_lainnya" class="form-control mt-2" placeholder="Keterangan jika Lainnya" value="{{ $item->raskin_bpnt_lainnya }}">
                            </div>

                            <!-- Row 2: KIP, KIS, Jamsostek -->
                            <div>
                                <label for="kip" class="block text-sm font-medium text-gray-700">Menerima KIP:</label>
                                <select name="kip" id="kip" class="form-control">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya" {{ $item->kip == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ $item->kip == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                    <option value="Lainnya" {{ $item->kip == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                                <input type="text" name="kip_lainnya" id="kip_lainnya" class="form-control mt-2" placeholder="Keterangan jika Lainnya" value="{{ $item->kip_lainnya }}">
                            </div>
                            <div>
                                <label for="kis" class="block text-sm font-medium text-gray-700">Menerima KIS:</label>
                                <select name="kis" id="kis" class="form-control">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya" {{ $item->kis == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ $item->kis == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                    <option value="Lainnya" {{ $item->kis == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                                <input type="text" name="kis_lainnya" id="kis_lainnya" class="form-control mt-2" placeholder="Keterangan jika Lainnya" value="{{ $item->kis_lainnya }}">
                            </div>
                            <div>
                                <label for="jamsostek_bpjs_ketenagakerjaan" class="block text-sm font-medium text-gray-700">Menerima Jamsostek/BPJS Ketenagakerjaan:</label>
                                <select name="jamsostek_bpjs_ketenagakerjaan" id="jamsostek_bpjs_ketenagakerjaan" class="form-control">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya" {{ $item->jamsostek_bpjs_ketenagakerjaan == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ $item->jamsostek_bpjs_ketenagakerjaan == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                    <option value="Lainnya" {{ $item->jamsostek_bpjs_ketenagakerjaan == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                                <input type="text" name="jamsostek_bpjs_ketenagakerjaan_lainnya" id="jamsostek_bpjs_ketenagakerjaan_lainnya" class="form-control mt-2" placeholder="Keterangan jika Lainnya" value="{{ $item->jamsostek_bpjs_ketenagakerjaan_lainnya }}">
                            </div>

                            <!-- Row 3: Other Insurance, Verification Status -->
                            <div>
                                <label for="peserta_mandiri_asuransi_lain" class="block text-sm font-medium text-gray-700">Peserta Mandiri Asuransi Lain:</label>
                                <select name="peserta_mandiri_asuransi_lain" id="peserta_mandiri_asuransi_lain" class="form-control">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya" {{ $item->peserta_mandiri_asuransi_lain == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ $item->peserta_mandiri_asuransi_lain == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                    <option value="Lainnya" {{ $item->peserta_mandiri_asuransi_lain == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                                <input type="text" name="peserta_mandiri_asuransi_lain_lainnya" id="peserta_mandiri_asuransi_lain_lainnya" class="form-control mt-2" placeholder="Keterangan jika Lainnya" value="{{ $item->peserta_mandiri_asuransi_lain_lainnya }}">
                            </div>
                            <div>
                                <label for="status_verifikasi" class="block text-sm font-medium text-gray-700">Status Verifikasi:</label>
                                <select name="status_verifikasi" id="status_verifikasi" class="form-control">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Belum Diverifikasi" {{ $item->status_verifikasi == 'Belum Diverifikasi' ? 'selected' : '' }}>Belum Diverifikasi</option>
                                    <option value="Sedang Diverifikasi" {{ $item->status_verifikasi == 'Sedang Diverifikasi' ? 'selected' : '' }}>Sedang Diverifikasi</option>
                                    <option value="Diverifikasi" {{ $item->status_verifikasi == 'Diverifikasi' ? 'selected' : '' }}>Diverifikasi</option>
                                    <option value="Ditolak" {{ $item->status_verifikasi == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                                </select>
                                <input type="text" name="alasan_ditolak" id="alasan_ditolak" class="form-control mt-2" placeholder="Alasan jika Ditolak" value="{{ $item->alasan_ditolak }}">
                            </div>
                            <div>
                                <label for="tanggal_usul" class="block text-sm font-medium text-gray-700">Tanggal Usul:</label>
                                <input type="date" name="tanggal_usul" id="tanggal_usul" class="form-control" value="{{ $item->tanggal_usul }}">
                            </div>

                            <!-- Row 4: Verification and Designation Dates -->
                            <div>
                                <label for="tanggal_verifikasi" class="block text-sm font-medium text-gray-700">Tanggal Verifikasi:</label>
                                <input type="date" name="tanggal_verifikasi" id="tanggal_verifikasi" class="form-control" value="{{ $item->tanggal_verifikasi }}">
                            </div>
                            <div>
                                <label for="tanggal_penetapan" class="block text-sm font-medium text-gray-700">Tanggal Penetapan:</label>
                                <input type="date" name="tanggal_penetapan" id="tanggal_penetapan" class="form-control" value="{{ $item->tanggal_penetapan }}">
                            </div>
                            <div>
                                <label for="sk_nomor" class="block text-sm font-medium text-gray-700">Nomor SK:</label>
                                <input type="text" name="sk_nomor" id="sk_nomor" class="form-control" placeholder="Nomor SK Kepala Desa" value="{{ $item->sk_nomor }}">
                            </div>

                            <!-- Row 5: Distribution Details -->
                            <div>
                                <label for="jenis_distribusi" class="block text-sm font-medium text-gray-700">Jenis Distribusi:</label>
                                <select name="jenis_distribusi" id="jenis_distribusi" class="form-control">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Uang Tunai" {{ $item->jenis_distribusi == 'Uang Tunai' ? 'selected' : '' }}>Uang Tunai</option>
                                    <option value="Barang" {{ $item->jenis_distribusi == 'Barang' ? 'selected' : '' }}>Barang</option>
                                    <option value="Kartu/Keanggotaan" {{ $item->jenis_distribusi == 'Kartu/Keanggotaan' ? 'selected' : '' }}>Kartu/Keanggotaan</option>
                                    <option value="Tidak Ada" {{ $item->jenis_distribusi == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada</option>
                                </select>
                            </div>
                            <div>
                                <label for="jumlah_bantuan" class="block text-sm font-medium text-gray-700">Jumlah Bantuan:</label>
                                <input type="number" name="jumlah_bantuan" id="jumlah_bantuan" class="form-control" step="0.01" placeholder="Jumlah dalam IDR atau kuantitas" value="{{ $item->jumlah_bantuan }}">
                            </div>
                            <div>
                                <label for="tanggal_distribusi" class="block text-sm font-medium text-gray-700">Tanggal Distribusi:</label>
                                <input type="date" name="tanggal_distribusi" id="tanggal_distribusi" class="form-control" value="{{ $item->tanggal_distribusi }}">
                            </div>

                            <!-- Row 6: Distribution Proof and Monitoring -->
                            {{-- <div>
                                <label for="bukti_distribusi" class="block text-sm font-medium text-gray-700">Bukti Distribusi:</label>
                                <input type="file" name="bukti_distribusi" id="bukti_distribusi" class="form-control" accept="image/*,application/pdf">
                                @if($item->bukti_distribusi)
                                    <p class="text-sm text-gray-600 mt-1">File saat ini: {{ basename($item->bukti_distribusi) }}</p>
                                @endif
                            </div> --}}
                            <div>
                                <label for="catatan_monitoring" class="block text-sm font-medium text-gray-700">Catatan Monitoring:</label>
                                <textarea name="catatan_monitoring" id="catatan_monitoring" class="form-control" placeholder="Catatan dari BPD atau petugas">{{ $item->catatan_monitoring }}</textarea>
                            </div>
                            <div>
                                <label for="status_transparansi" class="block text-sm font-medium text-gray-700">Status Transparansi:</label>
                                <select name="status_transparansi" id="status_transparansi" class="form-control">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Internal" {{ $item->status_transparansi == 'Internal' ? 'selected' : '' }}>Internal (Desa)</option>
                                    <option value="Eksternal" {{ $item->status_transparansi == 'Eksternal' ? 'selected' : '' }}>Eksternal (Kecamatan)</option>
                                    <option value="Publik" {{ $item->status_transparansi == 'Publik' ? 'selected' : '' }}>Publik (Website)</option>
                                </select>
                            </div>

                            <!-- Row 7: Active Status -->
                            <div>
                                <label for="is_active" class="block text-sm font-medium text-gray-700">Status Aktif:</label>
                                <select name="is_active" id="is_active" class="form-control">
                                    <option value="1" {{ $item->is_active ? 'selected' : '' }}>Aktif</option>
                                    <option value="0" {{ !$item->is_active ? 'selected' : '' }}>Tidak Aktif</option>
                                </select>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('bantuan-sosial.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>