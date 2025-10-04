<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Anggota Keluarga') }}
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

    <style>
        .grid-container {
        display: grid;
        grid-template-columns: auto auto auto;
        gap: 10px;
        padding: 10px;
        }
        .grid-container > div {
        background-color: #f1f1f1;
        color: #000;
        padding: 10px;
        font-size: 30px;
        text-align: center;
        }
        </style>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold mb-4">FORM EDIT ANGGOTA KELUARGA</h2>

                    <form action="{{ route('anggota-keluarga.update', $item->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- Pilih User --}}
                        <div>
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

                        {{-- contoh field lain --}}
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap"
                                   value="{{ old('nama_lengkap', $item->nama_lengkap) }}"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>

                         <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir"
                                   value="{{ old('tanggal_lahir', $item->tanggal_lahir) }}"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                         {{-- Jenis Kelamin --}}
                        <div class="mb-4">
                            <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="laki-laki" {{ $item->tv == 'laki-laki' ? 'selected' : '' }}>Laki-Laki</option>
                                <option value="perempuan" {{ $item->tv == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>

                        {{-- Hubungan Keluarga --}}
                        <div class="mb-4">
                            <label for="hubungan_keluarga" class="block text-sm font-medium text-gray-700">Hubungan Keluarga</label>
                            <select name="hubungan_keluarga" id="hubungan_keluarga" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="Kepala Keluarga" {{ $item->tv == 'kepala keluarga' ? 'selected' : '' }}>Kepala Keluarga</option>
                                <option value="Istri/Suami" {{ $item->tv == 'istri/suami' ? 'selected' : '' }}>Istri/Suami</option>
                                <option value="Anak" {{ $item->tv == 'anak' ? 'selected' : '' }}>Anak</option>
                                <option value="Lainnya" {{ $item->tv == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                        </div>


                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Status Perkawinan</label>
                            <input type="text" name="status_perkawinan"
                                   value="{{ old('status_perkawinan', $item->status_perkawinan) }}"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>

                        {{-- tombol submit --}}
                        <div class="flex justify-end">
                            <button type="submit"
                                    class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                                Update
                            </button>
                        </div>
                    </form>

                </div> {{-- end p-6 --}}
            </div> {{-- end bg-white --}}
        </div> {{-- end max-w --}}
    </div> {{-- end py-12 --}}
</x-app-layout>
