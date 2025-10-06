<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Aset Ternak') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 p-4 rounded-md bg-green-100 text-green-800">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Header: Search + Report --}}
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-4">
                {{-- Search --}}
                <form action="{{ route('aset-ternak.index') }}" method="GET" class="flex w-full md:w-1/2 gap-2">
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="🔍 Cari nama atau jenis hewan..."
                        class="flex-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                        Cari
                    </button>
                </form>

<div class="flex gap-2 relative">
    {{-- Export Dropdown --}}
    <div x-data="{ open: false }" class="relative">
        <button @click="open = !open"
                class="px-4 py-2 bg-gray-200 rounded-md hover:bg-gray-300 transition">
            Export ▼
        </button>

      <div x-show="open" @click.away="open = false"
     x-transition
     class="absolute left-0 mt-2 w-44 bg-white border rounded-lg shadow-lg overflow-hidden z-20">
    <a href="{{ route('aset-ternak.export.csv') }}" class="block px-4 py-2 hover:bg-gray-100">📄 Export CSV</a>
    <a href="{{ route('aset-ternak.export.pdf') }}" class="block px-4 py-2 hover:bg-gray-100">🖨 Export PDF</a>
</div>

    </div>

    {{-- Tombol Tambah --}}
    <a href="{{ route('aset-ternak.create') }}"
       class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
        + Tambah Aset Ternak
    </a>
</div>
            </div>

            {{-- Tabel --}}
            <div class="bg-white shadow-sm sm:rounded-lg overflow-x-auto">
                <table class="min-w-full border border-gray-300">
                    <thead class="bg-gray-50 text-xs">
                        <tr>
                            <th class="border px-2 py-2">#</th>
                            <th class="border px-2 py-2">Surveyor</th>
                            <th class="border px-2 py-2">Nama Hewan</th>
                            <th class="border px-2 py-2">Jenis Hewan</th>
                            <th class="border px-2 py-2">Kategori</th>
                            <th class="border px-2 py-2">Jumlah</th>
                            <th class="border px-2 py-2">Luas Kandang (m²)</th>
                            <th class="border px-2 py-2">Jenis Pakan</th>
                            <th class="border px-2 py-2">Kondisi</th>
                            <th class="border px-2 py-2">Keterangan</th>
                            <th class="border px-2 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm">
                        @forelse($data as $item)
                            <tr class="hover:bg-gray-50">
                                <td class="border px-2 py-1">{{ $loop->iteration }}</td>
                                <td class="border px-2 py-1">{{ $item->user->name ?? '-' }}</td>
                                <td class="border px-2 py-1">{{ $item->namaHewan->nama ?? '-' }}</td>
                                <td class="border px-2 py-1">{{ $item->jenisHewan->jenis ?? '-' }}</td>
                                <td class="border px-2 py-1 capitalize">{{ $item->kategori }}</td>
                                <td class="border px-2 py-1">{{ $item->jumlah }}</td>
                                <td class="border px-2 py-1">{{ $item->luas_kandang ?? '-' }}</td>
                                <td class="border px-2 py-1">{{ $item->jenis_pakan ?? '-' }}</td>
                                <td class="border px-2 py-1">
                                    @if($item->kondisi)
                                        <span class="px-2 py-1 bg-green-200 text-green-800 rounded text-xs">Sehat</span>
                                    @else
                                        <span class="px-2 py-1 bg-red-200 text-red-800 rounded text-xs">Sakit</span>
                                    @endif
                                </td>
                                <td class="border px-2 py-1">{{ $item->keterangan ?? '-' }}</td>
                                <td class="border px-2 py-1 flex flex-col sm:flex-row gap-1 justify-center items-center">
                                    <a href="{{ route('aset-ternak.show', $item->id) }}"
                                       class="text-blue-600 hover:text-blue-800 text-xs">Show</a>
                                    <a href="{{ route('aset-ternak.edit', $item->id) }}"
                                       class="text-yellow-600 hover:text-yellow-800 text-xs">Edit</a>
                                    <form action="{{ route('aset-ternak.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin hapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800 text-xs">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="border px-2 py-4 text-center text-gray-500">
                                    Belum ada data aset ternak.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="mt-4">
                {{ $data->appends(['search' => request('search')])->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
