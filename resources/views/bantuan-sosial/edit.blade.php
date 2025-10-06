<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
<<<<<<< Updated upstream
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
=======
            {{ __('Edit Bantuan Sosial') }}
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

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold mb-4">EDIT DATA BANTUAN SOSIAL</h2>

                    <form method="POST" action="{{ route('bantuan-sosial.update', $item->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Petugas (Manual) -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Petugas (ID)</label>
                            <input type="number" name="created_by" id="created_by" value="{{ old('created_by', $item->created_by) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- NIK Manual -->
                            <div>
                                <label for="nik_manual" class="block text-sm font-medium text-gray-700">NIK Manual</label>
                                <input type="text" name="nik_manual" id="nik_manual" value="{{ old('nik_manual', $item->nik_manual) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            </div>

                            <!-- Nama Lengkap -->
                            <div>
                                <label for="nama_lengkap" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" id="nama_lengkap" value="{{ old('nama_lengkap', $item->nama_lengkap) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            </div>

                            <!-- Tanggal Survey -->
                            <div>
                                <label for="tanggal_survey" class="block text-sm font-medium text-gray-700">Tanggal Survey</label>
                                <input type="date" name="tanggal_survey" id="tanggal_survey" value="{{ old('tanggal_survey', $item->tanggal_survey) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            </div>

                            <!-- KKS/KPS -->
                            <div>
                                <label for="kks_kps" class="block text-sm font-medium text-gray-700">KKS/KPS</label>
                                <select name="kks_kps" id="kks_kps" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    <option value="">-- Silahkan Pilih --</option>
                                    <option value="Ya" {{ old('kks_kps', $item->kks_kps) == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ old('kks_kps', $item->kks_kps) == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                    <option value="Lainnya" {{ old('kks_kps', $item->kks_kps) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>
                            <div id="kks_kps_lainnya_div" class="{{ old('kks_kps', $item->kks_kps) == 'Lainnya' ? '' : 'hidden' }}">
                                <label for="kks_kps_lainnya" class="block text-sm font-medium text-gray-700">Lainnya</label>
                                <input type="text" name="kks_kps_lainnya" id="kks_kps_lainnya" value="{{ old('kks_kps_lainnya', $item->kks_kps_lainnya) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            </div>

                            <!-- PKH -->
                            <div>
                                <label for="pkh" class="block text-sm font-medium text-gray-700">PKH</label>
                                <select name="pkh" id="pkh" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    <option value="">-- Silahkan Pilih --</option>
                                    <option value="Ya" {{ old('pkh', $item->pkh) == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ old('pkh', $item->pkh) == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                    <option value="Lainnya" {{ old('pkh', $item->pkh) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>
                            <div id="pkh_lainnya_div" class="{{ old('pkh', $item->pkh) == 'Lainnya' ? '' : 'hidden' }}">
                                <label for="pkh_lainnya" class="block text-sm font-medium text-gray-700">Lainnya</label>
                                <input type="text" name="pkh_lainnya" id="pkh_lainnya" value="{{ old('pkh_lainnya', $item->pkh_lainnya) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            </div>

                            <!-- Raskin/BPNT -->
                            <div>
                                <label for="raskin_bpnt" class="block text-sm font-medium text-gray-700">Raskin/BPNT</label>
                                <select name="raskin_bpnt" id="raskin_bpnt" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    <option value="">-- Silahkan Pilih --</option>
                                    <option value="Ya" {{ old('raskin_bpnt', $item->raskin_bpnt) == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ old('raskin_bpnt', $item->raskin_bpnt) == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                    <option value="Lainnya" {{ old('raskin_bpnt', $item->raskin_bpnt) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>
                            <div id="raskin_bpnt_lainnya_div" class="{{ old('raskin_bpnt', $item->raskin_bpnt) == 'Lainnya' ? '' : 'hidden' }}">
                                <label for="raskin_bpnt_lainnya" class="block text-sm font-medium text-gray-700">Lainnya</label>
                                <input type="text" name="raskin_bpnt_lainnya" id="raskin_bpnt_lainnya" value="{{ old('raskin_bpnt_lainnya', $item->raskin_bpnt_lainnya) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            </div>

                            <!-- KIP -->
                            <div>
                                <label for="kip" class="block text-sm font-medium text-gray-700">KIP</label>
                                <select name="kip" id="kip" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    <option value="">-- Silahkan Pilih --</option>
                                    <option value="Ya" {{ old('kip', $item->kip) == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ old('kip', $item->kip) == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                    <option value="Lainnya" {{ old('kip', $item->kip) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>
                            <div id="kip_lainnya_div" class="{{ old('kip', $item->kip) == 'Lainnya' ? '' : 'hidden' }}">
                                <label for="kip_lainnya" class="block text-sm font-medium text-gray-700">Lainnya</label>
                                <input type="text" name="kip_lainnya" id="kip_lainnya" value="{{ old('kip_lainnya', $item->kip_lainnya) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            </div>

                            <!-- KIS -->
                            <div>
                                <label for="kis" class="block text-sm font-medium text-gray-700">KIS</label>
                                <select name="kis" id="kis" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    <option value="">-- Silahkan Pilih --</option>
                                    <option value="Ya" {{ old('kis', $item->kis) == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ old('kis', $item->kis) == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                    <option value="Lainnya" {{ old('kis', $item->kis) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>
                            <div id="kis_lainnya_div" class="{{ old('kis', $item->kis) == 'Lainnya' ? '' : 'hidden' }}">
                                <label for="kis_lainnya" class="block text-sm font-medium text-gray-700">Lainnya</label>
                                <input type="text" name="kis_lainnya" id="kis_lainnya" value="{{ old('kis_lainnya', $item->kis_lainnya) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            </div>

                            <!-- BPJS Ketenagakerjaan -->
                            <div>
                                <label for="bpjs_ketenagakerjaan" class="block text-sm font-medium text-gray-700">BPJS Ketenagakerjaan</label>
                                <select name="bpjs_ketenagakerjaan" id="bpjs_ketenagakerjaan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    <option value="">-- Silahkan Pilih --</option>
                                    <option value="Ya" {{ old('bpjs_ketenagakerjaan', $item->bpjs_ketenagakerjaan) == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ old('bpjs_ketenagakerjaan', $item->bpjs_ketenagakerjaan) == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                    <option value="Lainnya" {{ old('bpjs_ketenagakerjaan', $item->bpjs_ketenagakerjaan) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>
                            <div id="bpjs_ketenagakerjaan_lainnya_div" class="{{ old('bpjs_ketenagakerjaan', $item->bpjs_ketenagakerjaan) == 'Lainnya' ? '' : 'hidden' }}">
                                <label for="bpjs_ketenagakerjaan_lainnya" class="block text-sm font-medium text-gray-700">Lainnya</label>
                                <input type="text" name="bpjs_ketenagakerjaan_lainnya" id="bpjs_ketenagakerjaan_lainnya" value="{{ old('bpjs_ketenagakerjaan_lainnya', $item->bpjs_ketenagakerjaan_lainnya) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            </div>

                            <!-- Asuransi Mandiri -->
                            <div>
                                <label for="asuransi_mandiri" class="block text-sm font-medium text-gray-700">Asuransi Mandiri</label>
                                <select name="asuransi_mandiri" id="asuransi_mandiri" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    <option value="">-- Silahkan Pilih --</option>
                                    <option value="Ya" {{ old('asuransi_mandiri', $item->asuransi_mandiri) == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ old('asuransi_mandiri', $item->asuransi_mandiri) == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                    <option value="Lainnya" {{ old('asuransi_mandiri', $item->asuransi_mandiri) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>
                            <div id="asuransi_mandiri_lainnya_div" class="{{ old('asuransi_mandiri', $item->asuransi_mandiri) == 'Lainnya' ? '' : 'hidden' }}">
                                <label for="asuransi_mandiri_lainnya" class="block text-sm font-medium text-gray-700">Lainnya</label>
                                <input type="text" name="asuransi_mandiri_lainnya" id="asuransi_mandiri_lainnya" value="{{ old('asuransi_mandiri_lainnya', $item->asuransi_mandiri_lainnya) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            </div>

                            <!-- Kriteria (Checkbox) -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700">Kriteria</label>
                                <div class="grid grid-cols-2 gap-2">
                                    @php $kriteria = json_decode($item->kriteria, true) ?? []; @endphp
                                    <div class="flex items-center">
                                        <input type="checkbox" name="kriteria[]" value="Usia >18" {{ in_array('Usia >18', $kriteria) ? 'checked' : '' }} class="mr-2">
                                        <label>Usia >18</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="checkbox" name="kriteria[]" value="Pendapatan <5jt" {{ in_array('Pendapatan <5jt', $kriteria) ? 'checked' : '' }} class="mr-2">
                                        <label>Pendapatan <5jt</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="checkbox" name="kriteria[]" value="Lansia" {{ in_array('Lansia', $kriteria) ? 'checked' : '' }} class="mr-2">
                                        <label>Lansia</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="checkbox" name="kriteria[]" value="Disabilitas" {{ in_array('Disabilitas', $kriteria) ? 'checked' : '' }} class="mr-2">
                                        <label>Disabilitas</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="checkbox" name="kriteria[]" value="Ibu Hamil" {{ in_array('Ibu Hamil', $kriteria) ? 'checked' : '' }} class="mr-2">
                                        <label>Ibu Hamil</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Tanggal Penerimaan -->
                            <div>
                                <label for="tanggal_penerimaan" class="block text-sm font-medium text-gray-700">Tanggal Penerimaan</label>
                                <input type="date" name="tanggal_penerimaan" id="tanggal_penerimaan" value="{{ old('tanggal_penerimaan', $item->tanggal_penerimaan) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            </div>

                            <!-- Tanggal Distribusi -->
                            <div>
                                <label for="tanggal_distribusi" class="block text-sm font-medium text-gray-700">Tanggal Distribusi</label>
                                <input type="date" name="tanggal_distribusi" id="tanggal_distribusi" value="{{ old('tanggal_distribusi', $item->tanggal_distribusi) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            </div>

                            <!-- Bukti Lampiran -->
                            <div class="md:col-span-2">
                                <label for="bukti_lampiran" class="block text-sm font-medium text-gray-700">Bukti Lampiran</label>
                                <input type="file" name="bukti_lampiran" id="bukti_lampiran" class="mt-1 block w-full">
                                @if ($item->bukti_lampiran)
                                    <p class="mt-2 text-sm text-gray-600">File saat ini: <a href="{{ asset('storage/' . $item->bukti_lampiran) }}" target="_blank">{{ basename($item->bukti_lampiran) }}</a></p>
                                @endif
                            </div>
                        </div>

                        <!-- Submit -->
                        <div class="mt-6 flex gap-3">
                            <button type="submit" class="bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">Update</button>
                            <a href="{{ route('bantuan-sosial.index') }}" class="bg-gray-500 text-white font-bold py-2 px-4 rounded hover:bg-gray-600">Kembali</a>
>>>>>>> Stashed changes
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<<<<<<< Updated upstream
</x-app-layout>
=======

    <!-- Script untuk show/hide 'lainnya' -->
    <script>
        const selects = ['kks_kps', 'pkh', 'raskin_bpnt', 'kip', 'kis', 'bpjs_ketenagakerjaan', 'asuransi_mandiri'];
        selects.forEach(selectId => {
            const select = document.getElementById(selectId);
            const lainnyaDiv = document.getElementById(selectId + '_lainnya_div');
            if (select) {
                select.addEventListener('change', function () {
                    if (this.value === 'Lainnya') {
                        lainnyaDiv.classList.remove('hidden');
                    } else {
                        lainnyaDiv.classList.add('hidden');
                    }
                });
                // Set initial state based on current value
                if (select.value === 'Lainnya') {
                    lainnyaDiv.classList.remove('hidden');
                }
            }
        });
    </script>
</xaiArtifact>
>>>>>>> Stashed changes
