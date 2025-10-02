{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola data umkm') }}
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
                    <!-- Header: Search + Add -->
                    <div class="flex justify-between items-center">
                        <form action="{{ route('umkm.index') }}" method="GET" class="flex gap-2">
                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="🔍 Cari berdasarkan nama user..."
                                class="px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                                Cari
                            </button>
                        </form>

                        <a href="{{ route('umkm.create') }}"
                           class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                            + Tambah Data
                        </a>
                    </div>

                    <!-- Table -->
                    <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-sm">
                        <table class="w-full text-sm text-left border-collapse">
                            <thead class="bg-gray-100 text-gray-700">
                                <tr>
                                    <th class="px-4 py-3 border">#</th>
                                    <th class="px-4 py-3 border">User</th>
                                    <th class="px-4 py-3 border">npwp</th>
                                    <th class="px-4 py-3 border">nib</th>
                                    <th class="px-4 py-3 border">sku</th>
                                    <th class="px-4 py-3 border">iumk</th>
                                    <th class="px-4 py-3 border text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($aset as $item)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-2 border">{{ $loop->iteration }}</td>
                                        <td class="px-4 py-2 border">{{ $item->user->name ?? '-' }}</td>
                                        <td class="px-4 py-2 border">{{ $item->npwp ?? '-' }}</td>
                                        <td class="px-4 py-2 border">{{ $item->nib ?? '-' }}</td>
                                        <td class="px-4 py-2 border">{{ $item->sku ?? '-' }}</td>
                                        <td class="px-4 py-2 border">{{ $item->iumk?? '-' }}</td>
                                        <td class="px-4 py-2 border text-center">
                                            <div class="flex items-center justify-center gap-3">
                                                <a href="{{ route('umkm.show', $item->id) }}" class="text-blue-600 hover:text-blue-800 text-xs font-medium">Lihat</a>
                                                <a href="{{ route('umkm.edit', $item->id) }}" class="text-yellow-600 hover:text-yellow-800 text-xs font-medium">Edit</a>
                                                <form action="{{ route('umkm.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus aset ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-800 text-xs font-medium">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="px-4 py-6 text-center text-gray-500">Belum ada data aset keluarga.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div>
                        {{ $aset->appends(['search' => request('search')])->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola umkm') }}
        </h2>
    </x-slot>

    @php
        // helper untuk render nilai Ya/Tidak/- dengan badge
        $formatBool = function($v) {
            if ($v === null || $v === '') return '<span class="text-xs text-gray-500">-</span>';
            $s = strtolower((string)$v);
            if (in_array($s, ['1','ya','yes','y','true'])) {
                return '<span class="px-2 py-0.5 text-xs bg-green-100 text-green-800 rounded">Ya</span>';
            }
            if (in_array($s, ['0','tidak','no','n','false'])) {
                return '<span class="px-2 py-0.5 text-xs bg-gray-100 text-gray-800 rounded">Tidak</span>';
            }
            // bila teks lain (mis. "lainnya")
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

                    {{-- Header bar: search + export + add --}}
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                        <form action="{{ route('umkm.index') }}" method="GET" class="flex gap-2 w-full md:w-1/2">
                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="🔍 Cari berdasarkan nama user..."
                                class="flex-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Cari</button>

                            <a href="{{ route('umkm.create') }}"
                           class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                            + Tambah umkm
                        </a>
                        </form>

                        <div class="flex items-center gap-3">
                            <div x-data="{ open:false }" class="relative">
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
                                + Tambah umkm
                            </a>
                        </div>
                    </div>

                    {{-- Table --}}
                    <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-sm">
                        <table class="min-w-full text-sm text-left border-collapse">
                            <thead class="bg-gray-50 text-gray-700">
                                <tr>
                                    <th class="px-3 py-2 border">#</th>
                                    <th class="px-3 py-2 border">Surveyor</th>

                                    {{-- Semua kolom sesuai create --}}
                                    <th class="px-3 py-2 border">npwp</th>
                                    <th class="px-3 py-2 border">nib</th>
                                    <th class="px-3 py-2 border">sku</th>
                                    <th class="px-3 py-2 border">iumk</th>
                                    
                                    <th class="px-3 py-2 border text-center">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($umkm as $item)
                                    <tr class="hover:bg-gray-50 align-top">
                                        <td class="px-3 py-2 border align-top">{{ $loop->iteration + ($umkm->currentPage()-1)*$umkm->perPage() }}</td>
                                        <td class="px-3 py-2 border align-top">{{ $item->user->name ?? '-' }}</td>

                                        {{-- gunakna helper untuk konsistensi --}}
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->npwp) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->nib) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->sku) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->iumk) !!}</td>
                                        <td class="px-3 py-2 border text-center align-top">
                                            <div class="flex items-center justify-center gap-2">
                                                <a href="{{ route('umkm.show', $item->id) }}" class="text-blue-600 hover:text-blue-800 text-xs font-medium">Lihat</a>
                                                <a href="{{ route('umkm.edit', $item->id) }}" class="text-yellow-600 hover:text-yellow-800 text-xs font-medium">Edit</a>
                                                <form action="{{ route('umkm.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus aset ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-800 text-xs font-medium">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="100" class="px-4 py-6 text-center text-gray-500">Belum ada data umkm.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination --}}
                    <div class="mt-4">
                        {{ $umkm->appends(['search' => request('search')])->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

                                        
