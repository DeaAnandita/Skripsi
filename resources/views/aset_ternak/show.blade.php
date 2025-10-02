<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Aset Ternak') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 flex flex-col gap-4">

                    <h3 class="text-lg font-semibold">Informasi Aset Ternak</h3>

                    <div class="grid md:grid-cols-2 gap-4 text-sm">

                        <div>
                            <strong>Nama Hewan:</strong> {{ $asetternak->namaHewan->nama ?? '-' }}
                        </div>
                        <div>
                            <strong>Jenis Hewan:</strong> {{ $asetternak->jenisHewan->jenis ?? '-' }}
                        </div>

                        <div>
                            <strong>Kategori:</strong> {{ ucfirst($asetternak->kategori) }}
                        </div>
                        <div>
                            <strong>Jumlah:</strong> {{ $asetternak->jumlah }}
                        </div>

                        <div>
                            <strong>Luas Kandang (m²):</strong> {{ $asetternak->luas_kandang ?? '-' }}
                        </div>
                        <div>
                            <strong>Jenis Pakan:</strong> {{ $asetternak->jenis_pakan ?? '-' }}
                        </div>

                        <div>
                            <strong>Kondisi:</strong>
                            @if($asetternak->kondisi)
                                <span class="px-2 py-1 bg-green-200 text-green-800 rounded">Sehat</span>
                            @else
                                <span class="px-2 py-1 bg-red-200 text-red-800 rounded">Sakit</span>
                            @endif
                        </div>

                        <div class="md:col-span-2">
                            <strong>Keterangan:</strong>
                            <p class="mt-1 text-gray-700">{{ $asetternak->keterangan ?? '-' }}</p>
                        </div>

                    </div> {{-- end grid --}}

                    <div class="mt-4">
                        <a href="{{ route('aset-ternak.index') }}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 transition">
                            Kembali
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
