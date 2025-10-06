<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Usaha ART') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold mb-4">EDIT DATA USAHA ART</h2>

                    <form method="POST" action="{{ route('usaha-art.update', $item->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Surveyor -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Surveyor</label>
                            <p class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-gray-100 p-2 text-gray-900">
                                {{ $item->user->name ?? '-' }}
                            </p>
                            <input type="hidden" name="user_id" value="{{ $item->user_id }}">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Jenis Usaha -->
                            <div>
                                <label for="lapangan_usaha" class="block text-sm font-medium text-gray-700">Jenis Usaha</label>
                                <select name="lapangan_usaha" id="lapangan_usaha" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    <option value="">-- Pilih Jenis Usaha --</option>
                                    @foreach([
                                        'Pertanian tanaman padi & palawija' => 'Pertanian tanaman padi & palawija',
                                        'Hortikultura' => 'Hortikultura',
                                        'Perkebunan' => 'Perkebunan',
                                        'Perikanan tangkap' => 'Perikanan tangkap',
                                        'Perikanan Budidaya' => 'Perikanan Budidaya',
                                        'Peternakan' => 'Peternakan',
                                        'Kehutanan & Pertanian lainnya' => 'Kehutanan & Pertanian lainnya',
                                        'Pertambangan/penggalian' => 'Pertambangan/penggalian',
                                        'Industri pengolahan' => 'Industri pengolahan',
                                        'Listrik, gas, & Air' => 'Listrik, gas, & Air',
                                        'Bangunan/Konstruksi' => 'Bangunan/Konstruksi',
                                        'Perdagangan' => 'Perdagangan',
                                        'Hotel & rumah makan' => 'Hotel & rumah makan',
                                        'Transportasi & perududangan' => 'Transportasi & perududangan',
                                        'Informasi dan Komunikasi' => 'Informasi dan Komunikasi',
                                        'Kecurangan dan asuransi' => 'Kecurangan dan asuransi',
                                        'Jasa pendidikan' => 'Jasa pendidikan',
                                        'Jasa kesehatan' => 'Jasa kesehatan',
                                        'Jasa kemasyarakatan, pemerintah & perorangan' => 'Jasa kemasyarakatan, pemerintah & perorangan',
                                        'Pemulung' => 'Pemulung',
                                        'Lainnya' => 'Lainnya'
                                    ] as $value => $label)
                                        <option value="{{ $value }}" {{ old('lapangan_usaha', $item->lapangan_usaha) == $value ? 'selected' : '' }}>
                                            {{ $label }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Omset Usaha/Bulan -->
                            <div>
                                <label for="omset_usaha_bulan" class="block text-sm font-medium text-gray-700">Omset Usaha/Bulan</label>
                                <select name="omset_usaha_bulan" id="omset_usaha_bulan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    <option value="">-- Pilih Omset --</option>
                                    @foreach([
                                        'Kurang dari/sama dengan Rp. 1 Juta' => 'Kurang dari/sama dengan Rp. 1 Juta',
                                        'Rp. 1 Juta s/d Rp. 5 Juta' => 'Rp. 1 Juta s/d Rp. 5 Juta',
                                        'Rp. 5 Juta s/d Rp. 10 Juta' => 'Rp. 5 Juta s/d Rp. 10 Juta',
                                        'Lebih dari/sama dengan Rp. 10 Juta' => 'Lebih dari/sama dengan Rp. 10 Juta'
                                    ] as $value => $label)
                                        <option value="{{ $value }}" {{ old('omset_usaha_bulan', $item->omset_usaha_bulan) == $value ? 'selected' : '' }}>
                                            {{ $label }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Pendapatan per Bulan -->
                            <div>
                                <label for="pendapatan_per_bulan" class="block text-sm font-medium text-gray-700">Pendapatan per Bulan</label>
                                <select name="pendapatan_per_bulan" id="pendapatan_per_bulan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    <option value="">-- Pilih Pendapatan --</option>
                                    @foreach([
                                        'Kurang dari/sama dengan Rp. 1 Juta' => 'Kurang dari/sama dengan Rp. 1 Juta',
                                        'Rp. 1 s/d Rp. 1.5 Juta' => 'Rp. 1 s/d Rp. 1.5 Juta',
                                        'Rp. 1.5 s/d Rp. 2 Juta' => 'Rp. 1.5 s/d Rp. 2 Juta',
                                        'Rp. 2 s/d Rp. 3 Juta' => 'Rp. 2 s/d Rp. 3 Juta',
                                        'Lebih dari/sama dengan Rp. 3 Juta' => 'Lebih dari/sama dengan Rp. 3 Juta'
                                    ] as $value => $label)
                                        <option value="{{ $value }}" {{ old('pendapatan_per_bulan', $item->pendapatan_per_bulan) == $value ? 'selected' : '' }}>
                                            {{ $label }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Jumlah Pekerja -->
                            <div>
                                <label for="jumlah_pekerja" class="block text-sm font-medium text-gray-700">Jumlah Pekerja</label>
                                <input type="number" name="jumlah_pekerja" id="jumlah_pekerja" value="{{ old('jumlah_pekerja', $item->jumlah_pekerja) }}" min="1" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            </div>

                            <!-- Status Kedudukan Kerja -->
                            <div>
                                <label for="status_kedudukan_kerja" class="block text-sm font-medium text-gray-700">Status Kedudukan Kerja</label>
                                <select name="status_kedudukan_kerja" id="status_kedudukan_kerja" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    <option value="">-- Pilih Status --</option>
                                    @foreach([
                                        'Berusaha sendiri' => 'Berusaha sendiri',
                                        'Berusaha dibantu buruh tidak tetap/dibayar' => 'Berusaha dibantu buruh tidak tetap/dibayar',
                                        'Buruh/karyawan/pekerja swasta' => 'Buruh/karyawan/pekerja swasta',
                                        'PNS/TNI/POLRI/BUMN/BUMD/Anggota legislatif' => 'PNS/TNI/POLRI/BUMN/BUMD/Anggota legislatif',
                                        'Pekerja bebas pertania' => 'Pekerja bebas pertania',
                                        'Pekerja bebas non pertania' => 'Pekerja bebas non pertania',
                                        'Pekerja keluarga/tidak dibayar' => 'Pekerja keluarga/tidak dibayar'
                                    ] as $value => $label)
                                        <option value="{{ $value }}" {{ old('status_kedudukan_kerja', $item->status_kedudukan_kerja) == $value ? 'selected' : '' }}>
                                            {{ $label }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Dokumen Usaha -->
                        <div class="mt-6">
                            <label for="dokumen_usaha" class="block text-sm font-medium text-gray-700">Dokumen Usaha (PDF)</label>
                            <input type="file" name="dokumen_usaha" id="dokumen_usaha" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" accept="application/pdf">
                            @if($item->dokumen_usaha)
                                <p class="mt-2 text-sm text-gray-600">File saat ini: <a href="{{ Storage::url($item->dokumen_usaha) }}" target="_blank" class="text-blue-600 hover:underline">Lihat dokumen</a></p>
                            @endif
                        </div>

                        <!-- Status Verifikasi -->
                        <div class="mt-6">
                            <label for="status_verifikasi" class="block text-sm font-medium text-gray-700">Status Verifikasi</label>
                            <select name="status_verifikasi" id="status_verifikasi" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                <option value="pending" {{ old('status_verifikasi', $item->status_verifikasi) == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="verified" {{ old('status_verifikasi', $item->status_verifikasi) == 'verified' ? 'selected' : '' }}>Verified</option>
                                <option value="rejected" {{ old('status_verifikasi', $item->status_verifikasi) == 'rejected' ? 'selected' : '' }}>Rejected</option>
                            </select>
                        </div>

                        <!-- Tombol -->
                        <div class="mt-6 flex gap-3">
                            <button type="submit" class="bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">Update</button>
                            <a href="{{ route('usaha-art.index') }}" class="bg-gray-500 text-white font-bold py-2 px-4 rounded hover:bg-gray-600">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>