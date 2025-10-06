<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Kesejahteraan Keluarga') }}
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

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold mb-4">PENDATAAN KESEJAHTERAAN KELUARGA</h2>
                    <form method="POST" action="{{ route('kesejahteraan-keluarga.store') }}">
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
                        </div>
                            
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Row 1 -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Pendapatan Stabil</label>
                                <input type="text" name="pendapatan_stabil" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>
                            {{-- isian --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Akses Pendidikan</label>
                                <input type="text" name="akses_pendidikan" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Akses Kesehatan</label>
                                <input type="text" name="akses_kesehatan" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            <!-- Row 2 -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Sanitasi Baik</label>
                                <input type="text" name="sanitasi_baik" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Air Bersih</label>
                                <input type="text" name="air_bersih" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>
                           <div>
                                <label class="block text-sm font-medium text-gray-700">Listrik Rumah</label>
                                <input type="text" name="listrik_rumah" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            <!-- Row 3 -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Pangan Cukup</label>
                                <input type="text" name="pangan_cukup" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Tabungan Aset</label>
                                <input type="text" name="tabungan_aset" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Jaminan Sosial</label>
                                <input type="text" name="jaminan_sosial" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            <!-- Row 4 -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Pekerjaan Keluarga</label>
                                <input type="text" name="pekerjaan_keluarga" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>
                           <div>
                                <label class="block text-sm font-medium text-gray-700">Akses Internet</label>
                                <input type="text" name="akses_internet" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Transportasi</label>
                                <input type="text" name="transportasi" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            <!-- Row 5 -->
                           <div>
                                <label class="block text-sm font-medium text-gray-700">Rumah Layak Huni</label>
                                <input type="text" name="rumah_layak_huni" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Pakaian Layak</label>
                                <input type="text" name="pakaian_layak" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
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
</x-app-layout>
