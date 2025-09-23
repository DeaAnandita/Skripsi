<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Aset Lahan & Tanah') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 p-4 rounded-md bg-green-100 text-green-800">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 flex flex-col gap-4">

                    {{-- Header & tombol --}}
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold">Daftar Aset Lahan & Tanah</h3>
                        <a href="{{ route('aset-lahan.create') }}"
                           class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                            + Tambah Aset
                        </a>
                    </div>

                    {{-- Tabel --}}
                    <div class="overflow-x-auto">
                        <table class="w-full border border-gray-300">
                            <thead class="bg-gray-50 text-xs">
                                <tr>
                                    <th class="border border-gray-300 px-2 py-2">#</th>
                                    <th class="border border-gray-300 px-2 py-2">User</th>
                                    <th class="border border-gray-300 px-2 py-2">Kode Lahan</th>
                                    <th class="border border-gray-300 px-2 py-2">Nama Lahan</th>
                                    <th class="border border-gray-300 px-2 py-2">Alamat</th>
                                    <th class="border border-gray-300 px-2 py-2">Luas</th>
                                    <th class="border border-gray-300 px-2 py-2">Status</th>
                                    <th class="border border-gray-300 px-2 py-2">Kepemilikan</th>
                                    <th class="border border-gray-300 px-2 py-2">No Sertifikat</th>
                                    <th class="border border-gray-300 px-2 py-2">Harga Sewa</th>
                                    <th class="border border-gray-300 px-2 py-2">Irigasi</th>
                                    <th class="border border-gray-300 px-2 py-2">Soil Type</th>
                                    <th class="border border-gray-300 px-2 py-2">Slope %</th>
                                    <th class="border border-gray-300 px-2 py-2">Jarak Pasar (km)</th>
                                    <th class="border border-gray-300 px-2 py-2">Akses Jalan</th>
                                    <th class="border border-gray-300 px-2 py-2">Previous Planting</th>
                                    <th class="border border-gray-300 px-2 py-2">Verification</th>
                                    <th class="border border-gray-300 px-2 py-2">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm">
                                @forelse ($asetLahan as $item)
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-2 py-1">{{ $loop->iteration }}</td>
                                        <td class="border border-gray-300 px-2 py-1">{{ $item->user->name ?? '-' }}</td>
                                        <td class="border border-gray-300 px-2 py-1">{{ $item->kode_lahan }}</td>
                                        <td class="border border-gray-300 px-2 py-1">{{ $item->nama_lahan }}</td>
                                        <td class="border border-gray-300 px-2 py-1">
                                            {{ $item->alamat }}, RT/RW {{ $item->rt_rw }}, {{ $item->desa }}, {{ $item->kecamatan }}, {{ $item->kabupaten }}, {{ $item->provinsi }}
                                        </td>
                                        <td class="border border-gray-300 px-2 py-1">{{ $item->luas_m2 }} {{ $item->satuan }}</td>
                                        <td class="border border-gray-300 px-2 py-1">{{ $item->status }}</td>
                                        <td class="border border-gray-300 px-2 py-1">{{ $item->kepemilikan ?? '-' }}</td>
                                        <td class="border border-gray-300 px-2 py-1">{{ $item->nomor_sertifikat ?? '-' }}</td>
                                        <td class="border border-gray-300 px-2 py-1">{{ $item->harga_sewa_bulanan ? 'Rp ' . number_format($item->harga_sewa_bulanan,0,',','.') : '-' }}</td>
                                        <td class="border border-gray-300 px-2 py-1">{{ $item->irigasi ? 'Ya' : 'Tidak' }}</td>
                                        <td class="border border-gray-300 px-2 py-1">{{ $item->soil_type ?? '-' }}</td>
                                        <td class="border border-gray-300 px-2 py-1">{{ $item->slope_percent ?? '-' }}</td>
                                        <td class="border border-gray-300 px-2 py-1">{{ $item->jarak_pasar_km ?? '-' }}</td>
                                        <td class="border border-gray-300 px-2 py-1">{{ $item->akses_jalan }}</td>
                                        <td class="border border-gray-300 px-2 py-1">{{ $item->previous_planting ?? '-' }}</td>
                                        <td class="border border-gray-300 px-2 py-1">{{ $item->verification_status }}</td>
                                        <td class="border border-gray-300 px-2 py-1 flex flex-col sm:flex-row gap-1 justify-center items-center">
                                            <a href="{{ route('aset-lahan.show', $item->id) }}" class="text-blue-600 hover:text-blue-800 text-xs">Lihat</a>
                                            <a href="{{ route('aset-lahan.edit', $item->id) }}" class="text-yellow-600 hover:text-yellow-800 text-xs">Edit</a>
                                            <form action="{{ route('aset-lahan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus aset ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-800 text-xs">Hapus</button>
                                            </form>
                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="18" class="border border-gray-300 px-4 py-6 text-center text-gray-500">
                                            Belum ada data aset lahan & tanah.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div> {{-- overflow-x-auto --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
