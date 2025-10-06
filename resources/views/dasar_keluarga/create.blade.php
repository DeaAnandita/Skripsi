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

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold mb-4">PENDATAAN DASAR KELUARGA</h2>

                    <form method="POST" action="{{ route('dasar-keluarga.store') }}">
                        @csrf

                        <!-- Surveyor -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Surveyor</label>
                            <input type="text" value="{{ auth()->user()->name }}" readonly
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm bg-gray-100 text-gray-700">
                            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Nomor KK -->
                            <div>
                                <label for="no_kk" class="block text-sm font-medium text-gray-700">Nomor Kartu Keluarga</label>
                                <input type="text" name="no_kk" id="no_kk" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            </div>
                            <!-- Kepala Keluarga -->
                            <div>
                                <label for="kepala_keluarga" class="block text-sm font-medium text-gray-700">Kepala Keluarga</label>
                                <input type="text" name="kepala_keluarga" id="kepala_keluarga" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            </div>
                            <!-- Dusun -->
                            <div>
                                <label for="dusun" class="block text-sm font-medium text-gray-700">Dusun/Lingkungan</label>
                                <input type="text" name="dusun" id="dusun" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            </div>

                            <!-- RW -->
                            <div>
                                <label for="rw" class="block text-sm font-medium text-gray-700">RW</label>
                                <input type="text" name="rw" id="rw" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            </div>

                            <!-- RT -->
                            <div>
                                <label for="rt" class="block text-sm font-medium text-gray-700">RT</label>
                                <input type="text" name="rt" id="rt" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            </div>

                            <!-- Alamat Lengkap -->
                            <div class="md:col-span-2">
                                <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat Lengkap</label>
                                <textarea name="alamat" id="alamat" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
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
    </script>
</x-app-layout>
