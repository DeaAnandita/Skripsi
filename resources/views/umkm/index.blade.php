<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Data UMKM') }}
        </h2>
    </x-slot>

    @php
        // Helper untuk render nilai Ya/Tidak/Lainnya/- dengan badge
        $formatBool = function($v) {
            if ($v === null || $v === '') return '<span class="text-xs text-gray-500">-</span>';
            $s = strtolower((string)$v);
            if (in_array($s, ['1','ya','yes','y','true'])) {
                return '<span class="px-2 py-0.5 text-xs bg-green-100 text-green-800 rounded">Ya</span>';
            }
            if (in_array($s, ['0','tidak','no','n','false'])) {
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
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                        <form action="{{ route('umkm.index') }}" method="GET" class="flex gap-2 w-full md:w-1/2">
                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="🔍 Cari berdasarkan nama surveyor..."
                                class="flex-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Cari</button>
                        </form>
                        <div class="flex items-center gap-3">
                            <div x-data="{ open: false }" class="relative">
                                <button @click="open = !open"
                                    class="flex items-center gap-2 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                                    <span>Export</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                <div x-show="open" @click.away="open=false" x-transition
                                     class="absolute right-0 mt-2 w-48 bg-white border rounded-lg shadow z-30">
                                    <a href="{{ route('umkm.export.csv') }}" class="block px-4 py-2 hover:bg-gray-50">📄 Export CSV</a>
                                    <a href="{{ route('umkm.export.pdf') }}" class="block px-4 py-2 hover:bg-gray-50">🖨 Export PDF</a>
                                </div>
                            </div>
                            <a href="{{ route('umkm.create') }}"
                               class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                                + Tambah Data
                            </a>
                        </div>
                    </div>
                    <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-sm">
                        <table class="min-w-full text-sm text-left border-collapse">
                            <thead class="bg-gray-50 text-gray-700">
                                <tr>
                                    <th class="px-3 py-2 border text-center w-10">#</th>
                                    <th class="px-3 py-2 border">Surveyor</th>
                                    <th class="px-3 py-2 border">Koperasi</th>
                                    <th class="px-3 py-2 border">Unit Usaha Simpan Pinjam</th>
                                    <th class="px-3 py-2 border">Industri Kerajinan Tangan</th>
                                    <th class="px-3 py-2 border">Industri Pakaian</th>
                                    <th class="px-3 py-2 border">Industri Usaha Makanan</th>
                                    <th class="px-3 py-2 border">Industri Alat Rumah Tangga</th>
                                    <th class="px-3 py-2 border">Industri Usaha Bahan Bangunan</th>
                                    <th class="px-3 py-2 border">Industri Alat Pertanian</th>
                                    <th class="px-3 py-2 border">Restoran</th>
                                    <th class="px-3 py-2 border text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($umkm as $item)
                                    <tr class="hover:bg-gray-50 align-top">
                                        <td class="px-3 py-2 border text-center">
                                            {{ $loop->iteration + ($umkm->currentPage()-1)*$umkm->perPage() }}
                                        </td>
                                        <td class="px-3 py-2 border">{{ $item->user->name ?? auth()->user()->name }}</td>
                                        <td class="px-3 py-2 border">{!! $formatBool($item->Koperasi) !!}</td>
                                        <td class="px-3 py-2 border">{!! $formatBool($item->Unit_Usaha_Simpan_Pinjam) !!}</td>
                                        <td class="px-3 py-2 border">{!! $formatBool($item->Industri_Kerajinan_Tangan) !!}</td>
                                        <td class="px-3 py-2 border">{!! $formatBool($item->Industri_Pakaian) !!}</td>
                                        <td class="px-3 py-2 border">{!! $formatBool($item->Industri_Usaha_Makanan) !!}</td>
                                        <td class="px-3 py-2 border">{!! $formatBool($item->Industri_Alat_Rumah_Tangga) !!}</td>
                                        <td class="px-3 py-2 border">{!! $formatBool($item->Industri_Usaha_Bahan_Bangunan) !!}</td>
                                        <td class="px-3 py-2 border">{!! $formatBool($item->Industri_Alat_Pertanian) !!}</td>
                                        <td class="px-3 py-2 border">{!! $formatBool($item->Restoran) !!}</td>
                                        <td class="px-3 py-2 border text-center">
                                            <div class="flex items-center justify-center gap-2">
                                                <a href="{{ route('umkm.show', $item->id) }}" class="text-blue-600 hover:text-blue-800 text-xs font-medium">Lihat</a>
                                                <a href="{{ route('umkm.edit', $item->id) }}" class="text-yellow-600 hover:text-yellow-800 text-xs font-medium">Edit</a>
                                                <form action="{{ route('umkm.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus data ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-800 text-xs font-medium">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="12" class="px-4 py-6 text-center text-gray-500">Belum ada data UMKM.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="p-4">
                        {{ $umkm->appends(['search' => request('search')])->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>