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
                    <div class="p-6 space-y-6">
                    <!-- Header: Search + Export -->
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                        <!-- Search -->
                        <form action="{{ route('aset-lahan.index') }}" method="GET" class="flex w-full md:w-1/2 gap-2">
                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="🔍 Cari aset..."
                                class="flex-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                                Cari
                            </button>
                        </form>

                        <!-- Export Dropdown -->
                        <div x-data="{ open: false }" class="relative">
                            <button @click="open = !open"
                                class="flex items-center gap-2 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-green-700 transition">
                                <span>Export</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div x-show="open" @click.away="open = false"
                                x-transition
                                class="absolute left-0 mt-2 w-44 bg-white border rounded-lg shadow-lg overflow-hidden z-20">
                                <a href="{{ route('aset-lahan.export.csv') }}" class="block px-4 py-2 hover:bg-gray-100">📄 Export CSV</a>
                                <a href="{{ route('aset-lahan.export.pdf') }}" class="block px-4 py-2 hover:bg-gray-100">🖨 Export PDF</a>
                                {{-- <a href="{{ route('reports.export') }}" class="block px-4 py-2 hover:bg-gray-100">📊 Export Excel</a> --}}
                            </div>
                        </div>
                    </div>
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
                    <!-- Pagination -->
                    <div>
                        {{ $asetLahan->appends(['search' => request('search')])->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
