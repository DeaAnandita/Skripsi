<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Ibu Hamil') }}
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

       <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold mb-4">PENDATAAN IBU HAMIL</h2>
                    <form method="POST" action="{{ route('ibu-hamil.store') }}">
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
                            {{-- Nama Ibu Hamil --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Nama Ibu Hamil</label>
                                <input type="text" name="nama"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                             {{-- NIK Ibu Hamil --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700">NIK Ibu Hamil</label>
                                <input type="text" name="nik"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                </input>
                            </div>

                             {{-- Alamat Ibu Hamil --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Alamat Ibu Hamil</label>
                                <input type="text" name="alamat"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    </input>
                            </div>

                             {{-- NO.HP Ibu Hamil --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700">NO.HP Ibu Hamil</label>
                                <input type="text" name="no_hp"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    </input>
                            </div>

                             {{-- Status Ibu Hamil --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Status Ibu Hamil</label>
                                <input type="text" name="status_hamil"
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
