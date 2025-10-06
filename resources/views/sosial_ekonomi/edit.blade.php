<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Data Sosial Ekonomi') }}
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
                    <h2 class="text-2xl font-bold mb-4">EDIT DATA SOSIAL EKONOMI</h2>
                    <form method="POST" action="{{ route('sosial_ekonomi.update', $item->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Surveyor -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Surveyor</label>
                                <select name="user_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                    <option value="">-- Pilih Surveyor --</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" {{ $item->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                    @endforeach
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

                        <div class="mt-4">
                            <button type="submit" class="bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">Update</button>
                            <a href="{{ route('sosial_ekonomi.index') }}" class="bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-600 ml-2">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
