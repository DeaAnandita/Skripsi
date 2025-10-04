<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Bayi') }}
        </h2>
    </x-slot>

    {{-- <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"> --}}
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
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold mb-4">PENDATAAN BAYI</h2>
                    <form method="POST" action="{{ route('bayi.store') }}">
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
                        <div class="grid-container gap-4">
                            <!-- Row 1 -->
                            {{-- Nama Bayi --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Nama Bayi</label>
                                <input type="text" name="nama_bayi" 
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                             {{-- Nama Ibu --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Nama Ibu</label>
                                <input type="text" name="nama_ibu" 
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                </input>
                            </div>

                             {{-- Tanggal Lahir --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                                <input type="text" name="tgl_lahir" 
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    </input>
                            </div>

                             {{-- Jenis Kelamin--}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                                <input type="text" name="jenis_kelamin"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    </input>
                            </div>

                             {{-- Berat Badan --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Berat Badan</label>
                                <input type="text" name="berat_badan" 
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    </input>
                            </div>

                            {{-- Tinggi Badan --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Tinggi Badan</label>
                                <input type="text" name="tinggi_badan" 
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    </input>
                            </div>
                        </div>
                        <button type="submit" class="mt-6 w-full bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-green-600">KIRIM</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
