<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Menu Layanan Umum') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-4 lg:px-8">
            <div class="bg-white overfl ow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Data Dasar Keluarga -->
                    <a href="{{ route('nama-hewan.index') }}"
                       class="p-6 bg-blue-100 rounded-2xl shadow hover:bg-blue-200 transition">
                        <h4 class="text-xl font-bold text-blue-800 mb-2">Nama Hewan</h4>
                        <p class="text-gray-700">Tambah, Edit dan Hapus Nama Hewan</p>
                    </a>

                                    <a href="{{ route('jenis-hewan.index') }}"
                       class="p-6 bg-blue-100 rounded-2xl shadow hover:bg-blue-200 transition">
                        <h4 class="text-xl font-bold text-blue-800 mb-2">Jenis Hewan</h4>
                        <p class="text-gray-700">Tambah, Edit dan Hapus Jenis Hewan</p>
                    </a>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
