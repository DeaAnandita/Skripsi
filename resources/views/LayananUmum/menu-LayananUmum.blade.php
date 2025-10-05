<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Menu Layanan Umum') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-4 lg:px-8">
            <div class="bg-white overfl ow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Data Dasar Keluarga -->
                    <a href="{{ route('surat-online.index') }}"
                       class="p-6 bg-blue-100 rounded-2xl shadow hover:bg-blue-200 transition">
                        <h4 class="text-xl font-bold text-blue-800 mb-2">Surat Online</h4>
                        <p class="text-gray-700">Buat Surat Online Berbasis Barcode</p>
                    </a>

                    <a href="{{ route('jenis-surat.index') }}"
                       class="p-6 bg-green-100 rounded-2xl shadow hover:bg-green-200 transition">
                        <h4 class="text-xl font-bold text-green-800 mb-2">Jenis Surat Online</h4>
                        <p class="text-gray-700">Buat Surat Online Berbasis Barcode</p>
                    </a>

                    <a href="{{ route('admpembangunan.index') }}"
                       class="p-6 bg-blue-100 rounded-2xl shadow hover:bg-blue-200 transition">
                        <h4 class="text-xl font-bold text-blue-800 mb-2">Administrasi Pembangunan</h4>
                        <p class="text-gray-700">Kelola Administrasi Pembangunan</p>
                    </a>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
