<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home Dashboard') }}
        </h2>
    </x-slot>

    {{-- <div class="p-6 grid grid-cols-2 gap-6">
        <a href="{{ route('buat-soal') }}"
           class="p-6 bg-white rounded-lg shadow text-center hover:shadow-md">
           Buat Soal
        </a>

        <a href="{{ route('menu.utama') }}"
           class="p-6 bg-white rounded-lg shadow text-center hover:shadow-md">
           Menu Utama
        </a>
    </div> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overfl ow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-6">Selamat datang di Sistem Informasi Desa Kaliwungu Kudus 👋</h3>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Aset Keluarga -->
                    <a href="{{ route('buat-soal') }}"
                       class="p-6 bg-blue-100 rounded-2xl shadow hover:bg-blue-200 transition">
                        <h4 class="text-xl font-bold text-blue-800 mb-2">Buat Soal</h4>
                        <p class="text-gray-700">Buat Soal, Edit Soal, dalam bentuk voice</p>
                    </a>

                    <!-- Aset Lahan & Tanah -->
                    <a href="{{ route('menu.utama') }}"
                       class="p-6 bg-green-100 rounded-2xl shadow hover:bg-green-200 transition">
                        <h4 class="text-xl font-bold text-green-800 mb-2">Menu Utama</h4>
                        <p class="text-gray-700">Kelola data</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


