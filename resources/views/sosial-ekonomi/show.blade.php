<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Data Sosial Ekonomi') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold mb-4">DETAIL DATA SOSIAL EKONOMI</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Surveyor (Permanen) -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Surveyor</label>
                            <input type="text" value="{{ $item->user->name ?? 'Surveyor Default' }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" readonly>
                        </div>

                        <!-- Partisipasi Sekolah -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Partisipasi Sekolah</label>
                            <input type="text" value="{{ $item->partisipasi_sekolah ?? '-' }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" readonly>
                        </div>

                        <!-- Ijazah Terakhir -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Ijazah Terakhir</label>
                            <input type="text" value="{{ $item->ijazah_terakhir ?? '-' }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" readonly>
                        </div>

                        <!-- Jenis Disabilitas -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Jenis Disabilitas</label>
                            <input type="text" value="{{ $item->jenis_disabilitas ?? '-' }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" readonly>
                        </div>

                        <!-- Tingkat Kesulitan Disabilitas -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tingkat Kesulitan Disabilitas</label>
                            <input type="text" value="{{ $item->tingkat_kesulitan_disabilitas ?? '-' }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" readonly>
                        </div>

                        <!-- Penyakit Kronis/Menahun -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Penyakit Kronis/Menahun</label>
                            <input type="text" value="{{ $item->penyakit_kronis_menahun ?? '-' }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" readonly>
                        </div>

                        <!-- Lapangan Usaha -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Lapangan Usaha</label>
                            <input type="text" value="{{ $item->lapangan_usaha ?? '-' }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" readonly>
                        </div>

                        <!-- Nama Usaha -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nama Usaha</label>
                            <input type="text" value="{{ $item->nama_usaha ?? '-' }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" readonly>
                        </div>

                        <!-- Jumlah Pekerja -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Jumlah Pekerja</label>
                            <input type="text" value="{{ $item->jumlah_pekerja ?? '-' }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" readonly>
                        </div>

                        <!-- Memiliki Tempat Usaha -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Memiliki Tempat Usaha</label>
                            <input type="text" value="{{ $item->memiliki_tempat_usaha ?? '-' }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" readonly>
                        </div>

                        <!-- Omset Usaha/Bulan -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Omset Usaha/Bulan</label>
                            <input type="text" value="{{ $item->omset_usaha_bulan ?? '-' }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" readonly>
                        </div>
                    </div>

                    <div class="mt-6 flex gap-3">
                        <a href="{{ route('sosial-ekonomi.index') }}" class="bg-gray-500 text-white font-bold py-2 px-4 rounded hover:bg-gray-600">Kembali</a>
                        <a href="{{ route('sosial-ekonomi.edit', $item->id) }}" class="bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>