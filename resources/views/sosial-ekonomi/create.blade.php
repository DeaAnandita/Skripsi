<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Data Sosial Ekonomi') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
                    <h2 class="text-2xl font-bold mb-4">PENDATAAN SOSIAL EKONOMI</h2>
                    <form method="POST" action="{{ route('sosial-ekonomi.store') }}">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                             <!-- Surveyor -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Surveyor</label>
                            <input type="text" value="{{ auth()->user()->name }}" readonly
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm bg-gray-100 text-gray-700">
                            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                        </div>

                            <!-- Partisipasi Sekolah -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Partisipasi Sekolah</label>
                                <select name="partisipasi_sekolah" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                    <option value="">-- Pilih Partisipasi --</option>
                                    <option value="SD">SD</option>
                                    <option value="SMP">SMP</option>
                                    <option value="SMA">SMA</option>
                                    <option value="Perguruan Tinggi">Perguruan Tinggi</option>
                                    <option value="Tidak Sekolah lagi">Tidak Sekolah lagi</option>
                                    <option value="Belum pernah Sekolah">Belum pernah Sekolah</option>
                                </select>
                            </div>

                            <!-- Ijazah Terakhir -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Ijazah Terakhir</label>
                                <select name="ijazah_terakhir" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                    <option value="">-- Pilih Ijazah --</option>
                                    <option value="Tidak memiliki">Tidak memiliki</option>
                                    <option value="SD">SD</option>
                                    <option value="SMP">SMP</option>
                                    <option value="SMA">SMA</option>
                                    <option value="D1">D1</option>
                                    <option value="D2">D2</option>
                                    <option value="D3">D3</option>
                                    <option value="D3/S1">D3/S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                </select>
                            </div>

                            <!-- Jenis Disabilitas -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Jenis Disabilitas</label>
                                <select name="jenis_disabilitas" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                    <option value="">-- Pilih Jenis --</option>
                                    <option value="Penglihatan">Penglihatan</option>
                                    <option value="Pendengaran">Pendengaran</option>
                                    <option value="Berjalan/naik tangga">Berjalan/naik tangga</option>
                                    <option value="Mengingat/Konsentrasi (pikun)">Mengingat/Konsentrasi (pikun)</option>
                                    <option value="Mengurus Diri Sendiri">Mengurus Diri Sendiri</option>
                                    <option value="Komunikasi">Komunikasi</option>
                                    <option value="Depresi/autis">Depresi/autis</option>
                                    <option value="Lumpuh">Lumpuh</option>
                                    <option value="Sumbing">Sumbing</option>
                                    <option value="Gila">Gila</option>
                                    <option value="Stres">Stres</option>
                                    <option value="Tidak mengalami">Tidak mengalami</option>
                                </select>
                            </div>

                            <!-- Tingkat Kesulitan Disabilitas -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Tingkat Kesulitan Disabilitas</label>
                                <select name="tingkat_kesulitan_disabilitas" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                    <option value="">-- Pilih Tingkat --</option>
                                    <option value="Sedikit kesulitan">Sedikit kesulitan</option>
                                    <option value="Banyak kesulitan">Banyak kesulitan</option>
                                    <option value="Tidak bisa sama sekali">Tidak bisa sama sekali</option>
                                    <option value="Tidak mengalami kesulitan">Tidak mengalami kesulitan</option>
                                </select>
                            </div>

                            <!-- Penyakit Kronis/Menahun -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Penyakit Kronis/Menahun</label>
                                <select name="penyakit_kronis_menahun" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                    <option value="">-- Pilih Penyakit --</option>
                                    <option value="Tidak ada">Tidak ada</option>
                                    <option value="Hipertensi">Hipertensi</option>
                                    <option value="Rematik">Rematik</option>
                                    <option value="Asma">Asma</option>
                                    <option value="Masalah jantung">Masalah jantung</option>
                                    <option value="Diabetes">Diabetes</option>
                                    <option value="TBC">TBC</option>
                                    <option value="Stroke">Stroke</option>
                                    <option value="Kanker atau Tumor Ganas">Kanker atau Tumor Ganas</option>
                                    <option value="Lepra/Kustan">Lepra/Kustan</option>
                                    <option value="Lever">Lever</option>
                                    <option value="Malaria">Malaria</option>
                                    <option value="HIV/AIDS">HIV/AIDS</option>
                                    <option value="Gagal ginjal">Gagal ginjal</option>
                                </select>
                            </div>

                            <!-- Lapangan Usaha -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Lapangan Usaha</label>
                                <select name="lapangan_usaha" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                    <option value="">-- Pilih Jenis Usaha --</option>
                                    @foreach($lapanganUsahaOptions as $option)
                                        <option value="{{ $option }}">{{ $option }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Nama Usaha -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Nama Usaha</label>
                                <input type="text" name="nama_usaha" value="{{ old('nama_usaha') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            </div>

                            <!-- Jumlah Pekerja -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Jumlah Pekerja</label>
                                <input type="number" name="jumlah_pekerja" value="{{ old('jumlah_pekerja') }}" min="0" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            </div>

                            <!-- Memiliki Tempat Usaha -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Memiliki Tempat Usaha</label>
                                <select name="memiliki_tempat_usaha" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                    <option value="">-- Pilih Status --</option>
                                    <option value="Ada">Ada</option>
                                    <option value="Tidak ada">Tidak ada</option>
                                </select>
                            </div>

                            <!-- Omset Usaha/Bulan -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Omset Usaha/Bulan</label>
                                <select name="omset_usaha_bulan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                    <option value="">-- Pilih Omset --</option>
                                    <option value="Kurang dari/sama dengan Rp. 1 Juta">Kurang dari/sama dengan Rp. 1 Juta</option>
                                    <option value="Rp. 1 Juta s/d Rp. 5 juta">Rp. 1 Juta s/d Rp. 5 juta</option>
                                    <option value="Rp. 5 Juta s/d Rp. 10 Juta">Rp. 5 Juta s/d Rp. 10 Juta</option>
                                    <option value="Lebih dari/sama dengan Rp. 10 Juta">Lebih dari/sama dengan Rp. 10 Juta</option>
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="mt-6 w-full bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-green-600">KIRIM</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>