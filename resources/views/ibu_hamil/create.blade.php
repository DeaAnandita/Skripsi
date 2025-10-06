<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Data Ibu Hamil ') }}
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
                    <h2 class="text-2xl font-bold mb-4">PENDATAAN IBU HAMIL</h2>

                    <form method="POST" action="{{ route('ibu-hamil.store') }}">
                        @csrf

                        <!-- Surveyor -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Surveyor</label>
                            <input type="text" value="{{ auth()->user()->name }}" readonly
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm bg-gray-100 text-gray-700">
                            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Nama Ibu Hamil -->
                            <div>
                                <label for="nama" class="block text-sm font-medium text-gray-700">Nama Ibu Hamil</label>
                                <input type="text" name="nama" id="nama" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            </div>
                            <!--  NIK -->
                            <div>
                                <label for="nik" class="block text-sm font-medium text-gray-700">NIK</label>
                                <input type="text" name="nik" id="nik" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            </div>
                            <!-- Alamat -->
                            <div>
                                <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                                <input type="text" name="alamat" id="alamat" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            </div>

                            <!-- NO.HP -->
                            <div>
                                <label for="no_hp" class="block text-sm font-medium text-gray-700">NO.HP</label>
                                <input type="text" name="no_hp" id="no_hp" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            </div>

                            <!-- Status Hamil -->
                            <div>
                                <label for="status_hamil" class="block text-sm font-medium text-gray-700">Status Hamil</label>
                                <input type="text" name="status_hamil" id="status_hamil" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
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
