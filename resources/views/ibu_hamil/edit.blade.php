<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Ibu Hamil ') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold mb-4">EDIT DATA IBU HAMIL</h2>

                    <form method="POST" action="{{ route('ibu-hamil.update', $item->id) }}">
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
                            <!-- Nama Ibu Hamil-->
                            <div>
                                <label for="nama" class="block text-sm font-medium text-gray-700">Nama Ibu Hamil</label>
                                <input type="text" name="nama" id="nama" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                       value="{{ old('nama', $item->nama) }}">
                            </div>

                            <!-- NIK -->
                            <div>
                                <label for="nik" class="block text-sm font-medium text-gray-700">NIK</label>
                                <input type="text" name="nik" id="nik"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                       value="{{ old('nik', $item->nik) }}">
                            </div>

                            <!-- Alamat -->
                            <div>
                                <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                                <input type="text" name="alamat" id="alamat" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                       value="{{ old('alamat', $item->alamat) }}">
                            </div>

                            <!-- NO.HP -->
                            <div>
                                <label for="no_hp" class="block text-sm font-medium text-gray-700">NO.HP</label>
                                <input type="text" name="no_hp" id="no_hp" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                       value="{{ old('no_hp', $item->no_hp) }}">
                            </div>

                            <!-- Status Hamil -->
                            <div>
                                <label for="status_hamil" class="block text-sm font-medium text-gray-700">Status Hamil</label>
                                <input type="text" name="status_hamil" id="status_hamil" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                       value="{{ old('status_hamil', $item->status_hamil) }}">
                            </div>

                        <!-- Tombol -->
                        <div class="mt-6 flex gap-3">
                            <button type="submit" class="bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">Update</button>
                            <a href="{{ route('ibu-hamil.index') }}" class="bg-gray-500 text-white font-bold py-2 px-4 rounded hover:bg-gray-600">Kembali</a>
                        </div>
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
