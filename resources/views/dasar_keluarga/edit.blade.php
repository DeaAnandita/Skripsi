<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Dasar Keluarga
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold mb-4">Edit Data Dasar Keluarga</h2>

                    <form method="POST" action="{{ route('dasar-keluarga.update', $item->id) }}">
                        @csrf
                        @method('PUT')

                        <!-- Surveyor -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Surveyor</label>
                            <select name="user_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                <option value="">-- Pilih Surveyor --</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ $item->user_id == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Jenis Mutasi -->
                            <div>
                                <label for="jenis_mutasi" class="block text-sm font-medium text-gray-700">Jenis Mutasi</label>
                                <select name="jenis_mutasi" id="jenis_mutasi" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    <option value="">-- Silahkan Pilih --</option>
                                    @foreach (['Tetap','Pindah','Datang','Meninggal','Lahir'] as $jenis)
                                        <option value="{{ $jenis }}" {{ $item->jenis_mutasi == $jenis ? 'selected' : '' }}>{{ $jenis }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Tanggal Mutasi -->
                            <div>
                                <label for="tanggal_mutasi" class="block text-sm font-medium text-gray-700">Tanggal Mutasi</label>
                                <input type="date" name="tanggal_mutasi" id="tanggal_mutasi" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                       value="{{ old('tanggal_mutasi', $item->tanggal_mutasi) }}">
                            </div>

                            <!-- No KK -->
                            <div>
                                <label for="no_kk" class="block text-sm font-medium text-gray-700">Nomor KK</label>
                                <select name="no_kk" id="no_kk" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    <option value="">-- Pilih Nomor KK --</option>
                                    @foreach($keluargas as $keluarga)
                                        <option value="{{ $keluarga->id }}"
                                            data-nama="{{ $keluarga->kepala_keluarga }}"
                                            data-dusun="{{ $keluarga->dusun }}"
                                            data-rt="{{ $keluarga->rt }}"
                                            data-rw="{{ $keluarga->rw }}"
                                            data-alamat="{{ $keluarga->alamat }}"
                                            {{ $item->no_kk == $keluarga->no_kk ? 'selected' : '' }}>
                                            {{ $keluarga->no_kk }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Kepala Keluarga -->
                            <div>
                                <label for="kepala_rumah_tangga" class="block text-sm font-medium text-gray-700">Kepala Keluarga</label>
                                <input type="text" name="kepala_rumah_tangga" id="kepala_rumah_tangga" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                       value="{{ old('kepala_rumah_tangga', $item->kepala_rumah_tangga) }}" readonly>
                            </div>

                            <!-- Dusun -->
                            <div>
                                <label for="dusun" class="block text-sm font-medium text-gray-700">Dusun/Lingkungan</label>
                                <input type="text" name="dusun" id="dusun" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                       value="{{ old('dusun', $item->dusun) }}" readonly>
                            </div>

                            <!-- RW -->
                            <div>
                                <label for="rw" class="block text-sm font-medium text-gray-700">RW</label>
                                <input type="text" name="rw" id="rw" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                       value="{{ old('rw', $item->rw) }}" readonly>
                            </div>

                            <!-- RT -->
                            <div>
                                <label for="rt" class="block text-sm font-medium text-gray-700">RT</label>
                                <input type="text" name="rt" id="rt" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                       value="{{ old('rt', $item->rt) }}" readonly>
                            </div>

                            <!-- Alamat -->
                            <div class="md:col-span-2">
                                <label for="alamat_lengkap" class="block text-sm font-medium text-gray-700">Alamat Lengkap</label>
                                <textarea name="alamat_lengkap" id="alamat_lengkap" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" readonly>{{ old('alamat_lengkap', $item->alamat_lengkap) }}</textarea>
                            </div>
                        </div>

                        <!-- Wilayah Datang -->
                        <div id="wilayah_datang" class="mt-6 {{ $item->jenis_mutasi == 'Datang' ? '' : 'hidden' }}">
                            <h3 class="font-bold text-lg mb-2">Wilayah Datang</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                @foreach (['provinsi','kabupaten','kecamatan','desa'] as $wilayah)
                                    <div>
                                        <label for="{{ $wilayah }}" class="block text-sm font-medium text-gray-700">{{ ucfirst($wilayah) }}</label>
                                        <input type="text" name="{{ $wilayah }}" id="{{ $wilayah }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                               value="{{ old($wilayah, $item->$wilayah) }}">
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Tombol -->
                        <div class="mt-6 flex gap-3">
                            <button type="submit" class="bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">Update</button>
                            <a href="{{ route('dasar-keluarga.index') }}" class="bg-gray-500 text-white font-bold py-2 px-4 rounded hover:bg-gray-600">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Script untuk otomatis isi data -->
    <script>
        document.getElementById('no_kk').addEventListener('change', function() {
            const selected = this.options[this.selectedIndex];
            document.getElementById('kepala_rumah_tangga').value = selected.getAttribute('data-nama') || '';
            document.getElementById('dusun').value = selected.getAttribute('data-dusun') || '';
            document.getElementById('rt').value = selected.getAttribute('data-rt') || '';
            document.getElementById('rw').value = selected.getAttribute('data-rw') || '';
            document.getElementById('alamat_lengkap').value = selected.getAttribute('data-alamat') || '';
        });

        document.getElementById('jenis_mutasi').addEventListener('change', function () {
            let wilayah = document.getElementById('wilayah_datang');
            if (this.value === 'Datang') {
                wilayah.classList.remove('hidden');
            } else {
                wilayah.classList.add('hidden');
            }
        });
    </script>
</x-app-layout>
