<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Bayi ') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold mb-4">EDIT DATA IBU HAMIL</h2>

                    <form method="POST" action="{{ route('bayi.update', $item->id) }}">
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
                            <!-- Nama Ibu-->
                            <div>
                                <label for="nama_ibu" class="block text-sm font-medium text-gray-700">Nama Ibu </label>
                                <input type="text" name="nama_ibu" id="nama_ibu" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                       value="{{ old('nama_ibu', $item->nama_ibu) }}">
                            </div>

                            <!-- Nama Bayi -->
                            <div>
                                <label for="nama_bayi" class="block text-sm font-medium text-gray-700">Nama Bayi</label>
                                <input type="text" name="nama_bayi" id="nama_bayi"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                       value="{{ old('nama_bayi', $item->nama_bayi) }}">
                            </div>

                            <!-- Tanggal Lahir -->
                            <div>
                                <label for="tgl_lahir" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                                <input type="text" name="tgl_lahir" id="tgl_lahir" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                       value="{{ old('tgl_lahir', $item->tgl_lahir) }}">
                            </div>

                            <!-- Jenia Kelamin -->
                            <div>
                                <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                                <input type="text" name="jenis_kelamin" id="jenis_kelamin" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                       value="{{ old('jenis_kelamin', $item->jenis_kelamin) }}">
                            </div>

                            <!-- Berat Badan -->
                            <div>
                                <label for="berat_badan" class="block text-sm font-medium text-gray-700">Berat Badan</label>
                                <input type="text" name="berat_badan" id="berat_badan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                       value="{{ old('berat_badan', $item->berat_badan) }}">
                            </div>

                            <!-- Tinggi Badan -->
                            <div>
                                <label for="tinggi_badan" class="block text-sm font-medium text-gray-700">Tinggi Badan</label>
                                <input type="text" name="tinggi_badan" id="tinggi_badan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                       value="{{ old('tinggi_badan', $item->tinggi_badan) }}">
                            </div>

                        <!-- Tombol -->
                        <div class="mt-6 flex gap-3">
                            <button type="submit" class="bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">Update</button>
                            <a href="{{ route('bayi.index') }}" class="bg-gray-500 text-white font-bold py-2 px-4 rounded hover:bg-gray-600">Kembali</a>
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
