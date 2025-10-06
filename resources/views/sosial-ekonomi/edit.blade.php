<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Data Sosial Ekonomi') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($errors->any())
                <div class="mb-4 p-4 rounded-md bg-red-100 text-red-800 text-sm">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold mb-4">EDIT DATA SOSIAL EKONOMI</h2>
                    <form method="POST" action="{{ route('sosial-ekonomi.update', $item->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Surveyor (Permanen) -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Surveyor</label>
                                <p class="mt-1 block w-full rounded-md border-gray-300 bg-gray-100 text-gray-700 p-2">
                                    {{ $item->user->name ?? 'Surveyor Default' }}
                                </p>
                            </div>

                            <!-- Partisipasi Sekolah -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Partisipasi Sekolah</label>
                                <select name="partisipasi_sekolah" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                    <option value="">-- Pilih Partisipasi --</option>
                                    <option value="SD" {{ $item->partisipasi_sekolah == 'SD' ? 'selected' : '' }}>SD</option>
                                    <option value="SMP" {{ $item->partisipasi_sekolah == 'SMP' ? 'selected' : '' }}>SMP</option>
                                    <option value="SMA" {{ $item->partisipasi_sekolah == 'SMA' ? 'selected' : '' }}>SMA</option>
                                    <option value="Perguruan Tinggi" {{ $item->partisipasi_sekolah == 'Perguruan Tinggi' ? 'selected' : '' }}>Perguruan Tinggi</option>
                                    <option value="Tidak Sekolah lagi" {{ $item->partisipasi_sekolah == 'Tidak Sekolah lagi' ? 'selected' : '' }}>Tidak Sekolah lagi</option>
                                    <option value="Belum pernah Sekolah" {{ $item->partisipasi_sekolah == 'Belum pernah Sekolah' ? 'selected' : '' }}>Belum pernah Sekolah</option>
                                </select>
                            </div>

                            <!-- Ijazah Terakhir -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Ijazah Terakhir</label>
                                <select name="ijazah_terakhir" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                    <option value="">-- Pilih Ijazah --</option>
                                    <option value="Tidak memiliki" {{ $item->ijazah_terakhir == 'Tidak memiliki' ? 'selected' : '' }}>Tidak memiliki</option>
                                    <option value="SD" {{ $item->ijazah_terakhir == 'SD' ? 'selected' : '' }}>SD</option>
                                    <option value="SMP" {{ $item->ijazah_terakhir == 'SMP' ? 'selected' : '' }}>SMP</option>
                                    <option value="SMA" {{ $item->ijazah_terakhir == 'SMA' ? 'selected' : '' }}>SMA</option>
                                    <option value="D1" {{ $item->ijazah_terakhir == 'D1' ? 'selected' : '' }}>D1</option>
                                    <option value="D2" {{ $item->ijazah_terakhir == 'D2' ? 'selected' : '' }}>D2</option>
                                    <option value="D3" {{ $item->ijazah_terakhir == 'D3' ? 'selected' : '' }}>D3</option>
                                    <option value="D3/S1" {{ $item->ijazah_terakhir == 'D3/S1' ? 'selected' : '' }}>D3/S1</option>
                                    <option value="S2" {{ $item->ijazah_terakhir == 'S2' ? 'selected' : '' }}>S2</option>
                                    <option value="S3" {{ $item->ijazah_terakhir == 'S3' ? 'selected' : '' }}>S3</option>
                                </select>
                            </div>

                            <!-- Jenis Disabilitas -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Jenis Disabilitas</label>
                                <select name="jenis_disabilitas" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                    <option value="">-- Pilih Jenis --</option>
                                    <option value="Penglihatan" {{ $item->jenis_disabilitas == 'Penglihatan' ? 'selected' : '' }}>Penglihatan</option>
                                    <option value="Pendengaran" {{ $item->jenis_disabilitas == 'Pendengaran' ? 'selected' : '' }}>Pendengaran</option>
                                    <option value="Berjalan/naik tangga" {{ $item->jenis_disabilitas == 'Berjalan/naik tangga' ? 'selected' : '' }}>Berjalan/naik tangga</option>
                                    <option value="Mengingat/Konsentrasi (pikun)" {{ $item->jenis_disabilitas == 'Mengingat/Konsentrasi (pikun)' ? 'selected' : '' }}>Mengingat/Konsentrasi (pikun)</option>
                                    <option value="Mengurus Diri Sendiri" {{ $item->jenis_disabilitas == 'Mengurus Diri Sendiri' ? 'selected' : '' }}>Mengurus Diri Sendiri</option>
                                    <option value="Komunikasi" {{ $item->jenis_disabilitas == 'Komunikasi' ? 'selected' : '' }}>Komunikasi</option>
                                    <option value="Depresi/autis" {{ $item->jenis_disabilitas == 'Depresi/autis' ? 'selected' : '' }}>Depresi/autis</option>
                                    <option value="Lumpuh" {{ $item->jenis_disabilitas == 'Lumpuh' ? 'selected' : '' }}>Lumpuh</option>
                                    <option value="Sumbing" {{ $item->jenis_disabilitas == 'Sumbing' ? 'selected' : '' }}>Sumbing</option>
                                    <option value="Gila" {{ $item->jenis_disabilitas == 'Gila' ? 'selected' : '' }}>Gila</option>
                                    <option value="Stres" {{ $item->jenis_disabilitas == 'Stres' ? 'selected' : '' }}>Stres</option>
                                    <option value="Tidak mengalami" {{ $item->jenis_disabilitas == 'Tidak mengalami' ? 'selected' : '' }}>Tidak mengalami</option>
                                </select>
                            </div>

                            <!-- Tingkat Kesulitan Disabilitas -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Tingkat Kesulitan Disabilitas</label>
                                <select name="tingkat_kesulitan_disabilitas" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                    <option value="">-- Pilih Tingkat --</option>
                                    <option value="Sedikit kesulitan" {{ $item->tingkat_kesulitan_disabilitas == 'Sedikit kesulitan' ? 'selected' : '' }}>Sedikit kesulitan</option>
                                    <option value="Banyak kesulitan" {{ $item->tingkat_kesulitan_disabilitas == 'Banyak kesulitan' ? 'selected' : '' }}>Banyak kesulitan</option>
                                    <option value="Tidak bisa sama sekali" {{ $item->tingkat_kesulitan_disabilitas == 'Tidak bisa sama sekali' ? 'selected' : '' }}>Tidak bisa sama sekali</option>
                                    <option value="Tidak mengalami kesulitan" {{ $item->tingkat_kesulitan_disabilitas == 'Tidak mengalami kesulitan' ? 'selected' : '' }}>Tidak mengalami kesulitan</option>
                                </select>
                            </div>

                            <!-- Penyakit Kronis/Menahun -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Penyakit Kronis/Menahun</label>
                                <select name="penyakit_kronis_menahun" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                    <option value="">-- Pilih Penyakit --</option>
                                    <option value="Tidak ada" {{ $item->penyakit_kronis_menahun == 'Tidak ada' ? 'selected' : '' }}>Tidak ada</option>
                                    <option value="Hipertensi" {{ $item->penyakit_kronis_menahun == 'Hipertensi' ? 'selected' : '' }}>Hipertensi</option>
                                    <option value="Rematik" {{ $item->penyakit_kronis_menahun == 'Rematik' ? 'selected' : '' }}>Rematik</option>
                                    <option value="Asma" {{ $item->penyakit_kronis_menahun == 'Asma' ? 'selected' : '' }}>Asma</option>
                                    <option value="Masalah jantung" {{ $item->penyakit_kronis_menahun == 'Masalah jantung' ? 'selected' : '' }}>Masalah jantung</option>
                                    <option value="Diabetes" {{ $item->penyakit_kronis_menahun == 'Diabetes' ? 'selected' : '' }}>Diabetes</option>
                                    <option value="TBC" {{ $item->penyakit_kronis_menahun == 'TBC' ? 'selected' : '' }}>TBC</option>
                                    <option value="Stroke" {{ $item->penyakit_kronis_menahun == 'Stroke' ? 'selected' : '' }}>Stroke</option>
                                    <option value="Kanker atau Tumor Ganas" {{ $item->penyakit_kronis_menahun == 'Kanker atau Tumor Ganas' ? 'selected' : '' }}>Kanker atau Tumor Ganas</option>
                                    <option value="Lepra/Kustan" {{ $item->penyakit_kronis_menahun == 'Lepra/Kustan' ? 'selected' : '' }}>Lepra/Kustan</option>
                                    <option value="Lever" {{ $item->penyakit_kronis_menahun == 'Lever' ? 'selected' : '' }}>Lever</option>
                                    <option value="Malaria" {{ $item->penyakit_kronis_menahun == 'Malaria' ? 'selected' : '' }}>Malaria</option>
                                    <option value="HIV/AIDS" {{ $item->penyakit_kronis_menahun == 'HIV/AIDS' ? 'selected' : '' }}>HIV/AIDS</option>
                                    <option value="Gagal ginjal" {{ $item->penyakit_kronis_menahun == 'Gagal ginjal' ? 'selected' : '' }}>Gagal ginjal</option>
                                </select>
                            </div>

                            <!-- Lapangan Usaha -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Lapangan Usaha</label>
                                <select name="lapangan_usaha" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                    <option value="">-- Pilih Jenis Usaha --</option>
                                    @foreach($lapanganUsahaOptions as $option)
                                        <option value="{{ $option }}" {{ $item->lapangan_usaha == $option ? 'selected' : '' }}>{{ $option }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Nama Usaha -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Nama Usaha</label>
                                <input type="text" name="nama_usaha" value="{{ old('nama_usaha', $item->nama_usaha) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            </div>

                            <!-- Jumlah Pekerja -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Jumlah Pekerja</label>
                                <input type="number" name="jumlah_pekerja" value="{{ old('jumlah_pekerja', $item->jumlah_pekerja) }}" min="0" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            </div>

                            <!-- Memiliki Tempat Usaha -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Memiliki Tempat Usaha</label>
                                <select name="memiliki_tempat_usaha" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                    <option value="">-- Pilih Status --</option>
                                    <option value="Ada" {{ $item->memiliki_tempat_usaha == 'Ada' ? 'selected' : '' }}>Ada</option>
                                    <option value="Tidak ada" {{ $item->memiliki_tempat_usaha == 'Tidak ada' ? 'selected' : '' }}>Tidak ada</option>
                                </select>
                            </div>

                            <!-- Omset Usaha/Bulan -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Omset Usaha/Bulan</label>
                                <select name="omset_usaha_bulan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                    <option value="">-- Pilih Omset --</option>
                                    <option value="Kurang dari/sama dengan Rp. 1 Juta" {{ $item->omset_usaha_bulan == 'Kurang dari/sama dengan Rp. 1 Juta' ? 'selected' : '' }}>Kurang dari/sama dengan Rp. 1 Juta</option>
                                    <option value="Rp. 1 Juta s/d Rp. 5 juta" {{ $item->omset_usaha_bulan == 'Rp. 1 Juta s/d Rp. 5 juta' ? 'selected' : '' }}>Rp. 1 Juta s/d Rp. 5 juta</option>
                                    <option value="Rp. 5 Juta s/d Rp. 10 Juta" {{ $item->omset_usaha_bulan == 'Rp. 5 Juta s/d Rp. 10 Juta' ? 'selected' : '' }}>Rp. 5 Juta s/d Rp. 10 Juta</option>
                                    <option value="Lebih dari/sama dengan Rp. 10 Juta" {{ $item->omset_usaha_bulan == 'Lebih dari/sama dengan Rp. 10 Juta' ? 'selected' : '' }}>Lebih dari/sama dengan Rp. 10 Juta</option>
                                </select>
                            </div>
                        </div>

                        <div class="mt-6 flex gap-3">
                            <button type="submit" class="bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">Update</button>
                            <a href="{{ route('sosial-ekonomi.index') }}" class="bg-gray-500 text-white font-bold py-2 px-4 rounded hover:bg-gray-600">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>