<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-6">Selamat datang di Sistem Informasi Aset Desa 👋</h3>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Aset Keluarga -->
                    <a href="{{ route('aset-keluarga.index') }}"
                       class="p-6 bg-blue-100 rounded-2xl shadow hover:bg-blue-200 transition">
                        <h4 class="text-xl font-bold text-blue-800 mb-2">Aset Keluarga</h4>
                        <p class="text-gray-700">Kelola data aset keluarga di desa.</p>
                    </a>

                    <!-- Aset Lahan & Tanah -->
                    <a href="{{ route('aset-lahan.index') }}"
                       class="p-6 bg-green-100 rounded-2xl shadow hover:bg-green-200 transition">
                        <h4 class="text-xl font-bold text-green-800 mb-2">Aset Lahan & Tanah</h4>
                        <p class="text-gray-700">Kelola data aset lahan dan tanah.</p>
                    </a>

                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
