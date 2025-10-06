<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Kelahiran') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold mb-4">Edit Data Kelahiran</h2>

                    @if ($errors->any())
                        <div class="mb-4 p-4 rounded-md bg-red-100 text-red-800">
                            <ul class="list-disc pl-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('kelahiran.update', $item->id_kelahiran) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- NIK -->
                            <div>
                                <label for="nik" class="block text-sm font-medium text-gray-700">NIK</label>
                                <input type="text" name="nik" id="nik" value="{{ old('nik', $item->nik) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" maxlength="16">
                                @error('nik')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Nama Bayi -->
                            <div>
                                <label for="nama_bayi" class="block text-sm font-medium text-gray-700">Nama Bayi</label>
                                <input type="text" name="nama_bayi" id="nama_bayi" value="{{ old('nama_bayi', $item->nama_bayi) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" maxlength="100">
                                @error('nama_bayi')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Tanggal Lahir -->
                            <div>
                                <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir', $item->tanggal_lahir) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @error('tanggal_lahir')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Tempat Lahir -->
                            <div>
                                <label for="tempat_lahir" class="block text-sm font-medium text-gray-700">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir', $item->tempat_lahir) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" maxlength="100">
                                @error('tempat_lahir')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Akta Kelahiran -->
                            <div>
                                <label for="akta_kelahiran" class="block text-sm font-medium text-gray-700">Akta Kelahiran</label>
                                <input type="text" name="akta_kelahiran" id="akta_kelahiran" value="{{ old('akta_kelahiran', $item->akta_kelahiran) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" maxlength="50">
                                @error('akta_kelahiran')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Surveyor -->
                            <div>
                                <label for="created_by" class="block text-sm font-medium text-gray-700">Surveyor</label>
                                <select name="created_by" id="created_by" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">-- Pilih Surveyor --</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" {{ old('created_by', $item->created_by) == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @error('created_by')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-6 flex space-x-4">
                            <button type="submit" class="w-full bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">Update</button>
                            <a href="{{ route('kelahiran.index') }}" class="w-full bg-gray-600 text-white font-bold py-2 px-4 rounded hover:bg-gray-700 text-center">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
