<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Menu Utama') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overfl ow-hidden shadow-sm sm:rounded-lg p-6">

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Menu Kependudukan -->
                    <a href="{{ route('menu.kependudukan') }}"
                       class="p-6 bg-blue-100 rounded-2xl shadow hover:bg-blue-200 transition">
                        <h4 class="text-xl font-bold text-white-800 mb-2">Kependudukan</h4>
                        <p class="text-gray-700">Kelola Data</p>
                    </a>
                    <!-- Menu Layanan Umum -->
                    <a href="{{ route('menu-LayananUmum') }}"
                    class="p-6 bg-green-100 rounded-2xl shadow hover:bg-green-200 transition">
                        <h4 class="text-xl font-bold text-gray-800 mb-2">Layanan Umum</h4>
                        <p class="text-gray-700">Kelola Data</p>
                    </a>
                    <a href="{{ route('menu-master-data') }}"
                    class="p-6 bg-green-100 rounded-2xl shadow hover:bg-green-200 transition">
                        <h4 class="text-xl font-bold text-gray-800 mb-2">Master Data</h4>
                        <p class="text-gray-700">Kelola Master Data</p>
                    </a>
                    {{-- Menu Daftar KK --}}
                    <a href="{{ route('menu-daftarkeluarga') }}"
                    class="p-6 bg-green-100 rounded-2xl shadow hover:bg-green-200 transition">
                        <h4 class="text-xl font-bold text-gray-800 mb-2">Daftar Keluarga</h4>
                        <p class="text-gray-700">Kelola Daftar Keluarga</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="py-8">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-3 gap-6">

                <!-- Kependudukan -->
                <a href="{{ route('menu.kependudukan') }}"
                   class="p-8 bg-white rounded-xl shadow hover:shadow-lg transition flex flex-col items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-purple-600 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 15c2.21 0 4.29.534 6.121 1.482M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <h3 class="text-lg font-semibold">Kependudukan</h3>
                </a>

            </div>
        </div>
    </div> --}}
</x-app-layout>
