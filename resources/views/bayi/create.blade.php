<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Data  Bayi ') }}
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

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold mb-4">PENDATAAN BAYI</h2>

                    <form method="POST" action="{{ route('bayi.store') }}">
                        @csrf

                        <!-- Surveyor -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Surveyor</label>
                            <input type="text" value="{{ auth()->user()->name }}" readonly
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm bg-gray-100 text-gray-700">
                            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Ibu -->
                            <div>
                                <label for="nama_ibu" class="block text-sm font-medium text-gray-700">Nama Ibu </label>
                                <input type="text" name="nama_ibu" id="nama_ibu" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            </div>
                            <!--  Nama Bayi -->
                            <div>
                                <label for="nama_bayi" class="block text-sm font-medium text-gray-700">Nama Bayi</label>
                                <input type="text" name="nama_bayi" id="nama_bayi" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            </div>
                            <!-- Tanggal Lahir -->
                            <div>
                                <label for="tgl_lahir" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                                <input type="text" name="tgl_lahir" id="tgl_lahir" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            </div>

                            <!-- Jenis Kelamin -->
                            <div>
                                <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                                <input type="text" name="jenis_kelamin" id="jenis_kelamin" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            </div>

                            <!--    Berat Badan -->
                            <div>
                                <label for="berat_badan" class="block text-sm font-medium text-gray-700">Berat Badan</label>
                                <input type="text" name="berat_badan" id="berat_badan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            </div>

                             <!--    Tinggi Badan -->
                            <div>
                                <label for="tinggit_badan" class="block text-sm font-medium text-gray-700">Tinggi Badan</label>
                                <input type="text" name="tinggi_badan" id="tinggi_badan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
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

    <!-- Script -->
    <script>
        document.getElementById('jenis_mutasi').addEventListener('change', function () {
            const wilayah = document.getElementById('wilayah_datang');
            if (this.value === 'Datang') wilayah.classList.remove('hidden');
            else wilayah.classList.add('hidden');
        });
    </script>
</x-app-layout>
