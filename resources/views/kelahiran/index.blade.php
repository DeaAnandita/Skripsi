<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Kelahiran') }}
        </h2>
    </x-slot>

    @php
        // Helper untuk render nilai nullable dengan badge
        $formatBool = function($v) {
            if ($v === null || $v === '') return '<span class="text-xs text-gray-500">-</span>';
            return '<span class="px-2 py-0.5 text-xs bg-green-100 text-green-800 rounded">' . e($v) . '</span>';
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
                        <form action="{{ route('kelahiran.index') }}" method="GET" class="flex gap-2 w-full md:w-1/2">
                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="🔍 Cari berdasarkan surveyor"
                                class="flex-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Cari</button>

                        <a href="{{ route('kelahiran.create') }}"
                           class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                            + Tambah Kelahiran
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
                                    <a href="{{ route('kelahiran.export.csv') }}" class="block px-4 py-2 hover:bg-gray-50">📄 Export CSV</a>
                                    <a href="{{ route('kelahiran.export.pdf') }}" class="block px-4 py-2 hover:bg-gray-50">🖨 Export PDF</a>
                                </div>
                            </div>

                            <a href="{{ route('kelahiran.create') }}"
                               class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                                + Tambah Kelahiran
                            </a>
                        </div>
                    </div>

                    <!-- Table -->
                    <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-sm">
                        <table class="min-w-full text-sm text-left border-collapse">
                            <thead class="bg-gray-50 text-gray-700">
                                <tr>
                                    <th class="px-3 py-2 border">No</th>
                                    <th class="px-3 py-2 border">Surveyor</th>
                                    <th class="px-3 py-2 border">NIK</th>
                                    <th class="px-3 py-2 border">Nama Bayi</th>
                                    <th class="px-3 py-2 border">Tanggal Lahir</th>
                                    <th class="px-3 py-2 border">Tempat Lahir</th>
                                    <th class="px-3 py-2 border">Akta Kelahiran</th>
                                    <th class="px-3 py-2 border text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($kelahiran as $item)
                                    <tr class="hover:bg-gray-50 align-top">
                                        <td class="px-3 py-2 border align-top">{{ $loop->iteration + ($kelahiran->currentPage()-1)*$kelahiran->perPage() }}</td>
                                        <td class="px-3 py-2 border align-top">{{ $item->user->name ?? '-' }}</td>
                                        <td class="px-3 py-2 border align-top">{{ $item->nik ?? '-' }}</td>
                                        <td class="px-3 py-2 border align-top">{{ $item->nama_bayi ?? '-' }}</td>
                                        <td class="px-3 py-2 border align-top">{{ $item->tanggal_lahir ? \Carbon\Carbon::parse($item->tanggal_lahir)->format('d/m/Y') : '-' }}</td>
                                        <td class="px-3 py-2 border align-top">{{ $item->tempat_lahir ?? '-' }}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->akta_kelahiran) !!}</td>
                                        <td class="px-3 py-2 border text-center align-top">
                                            <div class="flex items-center justify-center gap-2">
                                                <a href="{{ route('kelahiran.show', $item->id_kelahiran) }}" class="text-blue-600 hover:text-blue-800 text-xs font-medium">Lihat</a>
                                                <a href="{{ route('kelahiran.edit', $item->id_kelahiran) }}" class="text-yellow-600 hover:text-yellow-800 text-xs font-medium">Edit</a>
                                                <form action="{{ route('kelahiran.destroy', $item->id_kelahiran) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus data kelahiran ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-800 text-xs font-medium">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="px-4 py-6 text-center text-gray-500">Belum ada data kelahiran.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="mt-4">
                        {{ $kelahiran->appends(['search' => request('search')])->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>