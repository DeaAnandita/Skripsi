<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Aset Lahan & Tanah') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 flex flex-col gap-4">

                    <h3 class="text-lg font-semibold">Informasi Aset Lahan & Tanah</h3>

                    <div class="grid md:grid-cols-2 gap-4 text-sm">

                        <div>
                            <strong>User:</strong> {{ $item->user->name ?? '-' }}
                        </div>
                        <div>
                            <strong>Kode Lahan:</strong> {{ $item->kode_lahan }}
                        </div>

                        <div>
                            <strong>Nama Lahan:</strong> {{ $item->nama_lahan }}
                        </div>
                        <div>
                            <strong>Alamat:</strong> {{ $item->alamat }}, RT/RW {{ $item->rt_rw }}, {{ $item->desa }}, {{ $item->kecamatan }}, {{ $item->kabupaten }}, {{ $item->provinsi }}
                        </div>

                        <div>
                            <strong>Luas:</strong> {{ $item->luas_m2 }} {{ $item->satuan }}
                        </div>
                        <div>
                            <strong>Status:</strong> {{ $item->status }}
                        </div>

                        <div>
                            <strong>Kepemilikan:</strong> {{ $item->kepemilikan ?? '-' }}
                        </div>
                        <div>
                            <strong>No Sertifikat:</strong> {{ $item->nomor_sertifikat ?? '-' }}
                        </div>

                        <div>
                            <strong>Harga Sewa:</strong> {{ $item->harga_sewa_bulanan ? 'Rp ' . number_format($item->harga_sewa_bulanan,0,',','.') : '-' }}
                        </div>
                        <div>
                            <strong>Irigasi:</strong> {{ $item->irigasi ? 'Ya' : 'Tidak' }}
                        </div>

                        <div>
                            <strong>Soil Type:</strong> {{ $item->soil_type ?? '-' }}
                        </div>
                        <div>
                            <strong>Slope %:</strong> {{ $item->slope_percent ?? '-' }}
                        </div>

                        <div>
                            <strong>Jarak Pasar (km):</strong> {{ $item->jarak_pasar_km ?? '-' }}
                        </div>
                        <div>
                            <strong>Akses Jalan:</strong> {{ $item->akses_jalan }}
                        </div>

                        <div>
                            <strong>Previous Planting:</strong> {{ $item->previous_planting ?? '-' }}
                        </div>
                        <div>
                            <strong>Verification:</strong> {{ $item->verification_status }}
                        </div>

                        <div class="md:col-span-2">
                            <strong>Notes:</strong>
                            <p class="mt-1 text-gray-700">{{ $item->notes ?? '-' }}</p>
                        </div>

                    </div> {{-- end grid --}}

                    <div class="mt-4">
                        <a href="{{ route('aset-lahan.index') }}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 transition">
                            Kembali
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
