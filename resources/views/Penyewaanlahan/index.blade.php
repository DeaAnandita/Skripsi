<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Penyewaan Lahan') }}
        </h2>
    </x-slot>

    @php
        // Helper untuk render nilai Ya/Tidak/- dengan badge
        $formatBool = function($v) {
            if ($v === null || $v === '') return '<span class="text-xs text-gray-500">-</span>';
            $s = strtolower((string)$v);
            if (in_array($s, ['1', 'ya', 'yes', 'y', 'true'])) {
                return '<span class="px-2 py-0.5 text-xs bg-green-100 text-green-800 rounded">Ya</span>';
            }
            if (in_array($s, ['0', 'tidak', 'no', 'n', 'false'])) {
                return '<span class="px-2 py-0.5 text-xs bg-gray-100 text-gray-800 rounded">Tidak</span>';
            }
            return '<span class="px-2 py-0.5 text-xs bg-yellow-100 text-yellow-800 rounded">'.e($v).'</span>';
        };
    @endphp

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 p-4 rounded-md bg-green-100 text-green-800">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 space-y-6">
                    {{-- <!-- Header: Search + Add -->
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                        <form action="{{ route('penyewaan-lahan.index') }}" method="GET" class="flex gap-2 w-full md:w-1/2">
                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="🔍 Cari berdasarkan nama penyewa..."
                                class="flex-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                                Cari
                            </button>
                        </form> --}}

                        <a href="{{ route('penyewaan-lahan.create') }}"
                           class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                            + Tambah Penyewaan
                        </a>
                    </div>

                    <!-- Table -->
                    <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-sm">
                        <table class="min-w-full text-sm text-left border-collapse">
                            <thead class="bg-gray-50 text-gray-700">
                                <tr>
                                    <th class="px-3 py-2 border">#</th>
                                    <th class="px-3 py-2 border">Nama Penyewa</th>
                                    <th class="px-3 py-2 border">Lokasi</th>
                                    <th class="px-3 py-2 border">Luas (m²)</th>
                                    <th class="px-3 py-2 border">Jenis Aset</th>
                                    <th class="px-3 py-2 border">Tanggal Mulai</th>
                                    <th class="px-3 py-2 border">Tanggal Selesai</th>
                                    <th class="px-3 py-2 border">Biaya Sewa</th>
                                    <th class="px-3 py-2 border">Status</th>
                                    <th class="px-3 py-2 border text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($penyewaan as $index => $item)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-3 py-2 border">{{ $index + 1 }}</td>
                                        <td class="px-3 py-2 border">{{ $item->nama_penyewa }}</td>
                                        <td class="px-3 py-2 border">{{ $item->lokasi_lahan }}</td>
                                        <td class="px-3 py-2 border">{{ $item->luas_lahan }}</td>
                                        <td class="px-3 py-2 border">{{ $item->jenis_aset }}</td>
                                        <td class="px-3 py-2 border">{{ $item->tanggal_mulai }}</td>
                                        <td class="px-3 py-2 border">{{ $item->tanggal_selesai }}</td>
                                        <td class="px-3 py-2 border">Rp {{ number_format($item->biaya_sewa, 2) }}</td>
                                        <td class="px-3 py-2 border">{{ $item->status }}</td>
                                        <td class="px-3 py-2 border text-center">
                                            <div class="flex items-center justify-center gap-2">
                                                <a href="{{ route('penyewaan-lahan.show', $item->id) }}" class="text-blue-600 hover:text-blue-800 text-xs font-medium">Lihat</a>
                                                <a href="{{ route('penyewaan-lahan.edit', $item->id) }}" class="text-yellow-600 hover:text-yellow-800 text-xs font-medium">Edit</a>
                                                <form action="{{ route('penyewaan-lahan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus penyewaan ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-800 text-xs font-medium">Hapus</button>
                                                </form>
                                                
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" class="px-4 py-6 text-center text-gray-500">Tidak ada data penyewaan.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- <!-- Pagination -->
                    <div class="mt-4">
                       {{ $penyewaan->appends(['search' => request('search')])->links() }}
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>