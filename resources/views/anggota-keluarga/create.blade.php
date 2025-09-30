<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Anggota Keluarga') }}
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
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold mb-4">FORM INPUT ANGGOTA KELUARGA</h2>

                    <form method="POST" action="{{ route('anggota-keluarga.store') }}">
                        @csrf

                        <div>
                                <label class="block text-sm font-medium text-gray-700">Surveyor</label>
                                <select name="user_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    <option value="">-- Pilih Surveyor --</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                        {{-- NIK --}}
                        <div class="mb-4">
                            <label for="nik" class="block text-sm font-medium text-gray-700">Nomor Induk Kependudukan (NIK)</label>
                            <input type="text" name="nik" id="nik" value="{{ old('nik') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>

                        {{-- Nama Lengkap --}}
                        <div class="mb-4">
                            <label for="nama_lengkap" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" id="nama_lengkap" value="{{ old('nama_lengkap') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>

                        {{-- Tanggal Lahir --}}
                        <div class="mb-4">
                            <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>

                        {{-- Jenis Kelamin --}}
                        <div class="mb-4">
                            <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="">Silahkan Pilih</option>
                                <option value="laki-laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>

                        {{-- Hubungan Keluarga --}}
                        <div class="mb-4">
                            <label for="hubungan_keluarga" class="block text-sm font-medium text-gray-700">Hubungan Keluarga</label>
                            <select name="hubungan_keluarga" id="hubungan_keluarga" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="">Silahkan Pilih</option>
                                <option value="kepala keluarga">Kepala Keluarga</option>
                                <option value="istri/suami">Istri/Suami</option>
                                <option value="anak">Anak</option>
                                <option value="lainnya">Lainnya</option>
                            </select>
                        </div>

                        {{-- Status Perkawinan --}}
                        <div class="mb-4">
                            <label for="status_perkawinan" class="block text-sm font-medium text-gray-700">Status Perkawinan</label>
                            <select name="status_perkawinan" id="status_perkawinan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="">Silahkan Pilih</option>
                                <option value="belum kawin">Belum Kawin</option>
                                <option value="kawin">Kawin</option>
                                <option value="cerai hidup">Cerai Hidup</option>
                                <option value="cerai mati">Cerai Mati</option>
                            </select>
                        </div>

                        {{-- Surveyor / User
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Surveyor</label>
                            <select name="created_by" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                <option value="">-- Pilih Surveyor --</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div> --}}

                        <button type="submit" class="mt-6 w-full bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-green-600">SIMPAN</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
