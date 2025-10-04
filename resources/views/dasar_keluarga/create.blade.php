<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Dasar Keluarga') }}
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

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold mb-4">PENDATAAN DASAR KELUARGA</h2>

                    <form method="POST" action="{{ route('dasar-keluarga.store') }}">
                        @csrf

                        <!-- Surveyor -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Surveyor</label>
                            <select name="user_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                <option value="">-- Pilih Surveyor --</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                            <!-- Nomor KK -->
                            <div>
                                <label for="no_kk" class="block text-sm font-medium text-gray-700">Nomor Kartu Keluarga</label>
                                <select name="no_kk" id="no_kk" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    <option value="">-- Pilih Nomor KK --</option>
                                    @foreach($keluarga as $kk)
                                        <option value="{{ $kk->id }}" 
                                            data-kepala="{{ $kk->nama_kepala_keluarga }}"
                                            data-dusun="{{ $kk->dusun }}"
                                            data-rt="{{ $kk->rt }}"
                                            data-rw="{{ $kk->rw }}"
                                            data-alamat="{{ $kk->alamat }}">
                                            {{ $kk->no_kk }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Kepala Rumah Tangga -->
                            <div>
                                <label for="kepala_rumah_tangga" class="block text-sm font-medium text-gray-700">Kepala Rumah Tangga</label>
                                <input type="text" name="kepala_rumah_tangga" id="kepala_rumah_tangga" readonly class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-gray-100">
                            </div>

                            <!-- Dusun -->
                            <div>
                                <label for="dusun" class="block text-sm font-medium text-gray-700">Dusun/Lingkungan</label>
                                <input type="text" name="dusun" id="dusun" readonly class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-gray-100">
                            </div>

                            <!-- RW -->
                            <div>
                                <label for="rw" class="block text-sm font-medium text-gray-700">RW</label>
                                <input type="text" name="rw" id="rw" readonly class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-gray-100">
                            </div>

                            <!-- RT -->
                            <div>
                                <label for="rt" class="block text-sm font-medium text-gray-700">RT</label>
                                <input type="text" name="rt" id="rt" readonly class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-gray-100">
                            </div>

                            <!-- Alamat Lengkap -->
                            <div class="md:col-span-2">
                                <label for="alamat_lengkap" class="block text-sm font-medium text-gray-700">Alamat Lengkap</label>
                                <textarea name="alamat_lengkap" id="alamat_lengkap" rows="3" readonly class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-gray-100"></textarea>
                            </div>

                            <!-- Jenis Mutasi -->
                            <div>
                                <label for="jenis_mutasi" class="block text-sm font-medium text-gray-700">Jenis Mutasi</label>
                                <select name="jenis_mutasi" id="jenis_mutasi" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    <option value="">-- Silahkan Pilih --</option>
                                    <option value="Tetap">Tetap</option>
                                    <option value="Pindah">Pindah</option>
                                    <option value="Datang">Datang</option>
                                    <option value="Meninggal">Meninggal</option>
                                    <option value="Lahir">Lahir</option>
                                </select>
                            </div>

                            <!-- Tanggal Mutasi -->
                            <div>
                                <label for="tanggal_mutasi" class="block text-sm font-medium text-gray-700">Tanggal Mutasi</label>
                                <input type="date" name="tanggal_mutasi" id="tanggal_mutasi" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            </div>
                        </div>

                        <!-- Form Wilayah Datang -->
                        <div id="wilayah_datang" class="mt-6 hidden">
                            <h3 class="font-bold text-lg mb-2">Wilayah Datang</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="provinsi" class="block text-sm font-medium text-gray-700">Provinsi</label>
                                    <input type="text" name="provinsi" id="provinsi" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                </div>
                                <div>
                                    <label for="kabupaten" class="block text-sm font-medium text-gray-700">Kabupaten</label>
                                    <input type="text" name="kabupaten" id="kabupaten" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                </div>
                                <div>
                                    <label for="kecamatan" class="block text-sm font-medium text-gray-700">Kecamatan</label>
                                    <input type="text" name="kecamatan" id="kecamatan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                </div>
                                <div>
                                    <label for="desa" class="block text-sm font-medium text-gray-700">Desa/Kelurahan</label>
                                    <input type="text" name="desa" id="desa" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                </div>
                            </div>
                        </div>

                        <!-- Submit -->
                        <button type="submit" class="mt-6 w-full bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">
                            Simpan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Script -->
    <script>
        document.getElementById('jenis_mutasi').addEventListener('change', function () {
            const wilayah = document.getElementById('wilayah_datang');
            if (this.value === 'Datang') wilayah.classList.remove('hidden');
            else wilayah.classList.add('hidden');
        });

        // Saat pilih No KK, otomatis isi data keluarga
        document.getElementById('no_kk').addEventListener('change', function() {
            const selected = this.options[this.selectedIndex];
            document.getElementById('kepala_rumah_tangga').value = selected.dataset.kepala || '';
            document.getElementById('dusun').value = selected.dataset.dusun || '';
            document.getElementById('rw').value = selected.dataset.rw || '';
            document.getElementById('rt').value = selected.dataset.rt || '';
            document.getElementById('alamat_lengkap').value = selected.dataset.alamat || '';
        });
    </script>
</x-app-layout>
