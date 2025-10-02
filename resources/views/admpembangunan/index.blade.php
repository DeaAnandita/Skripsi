<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Data Administrasi Pembangunan') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Flash Message --}}
            @if(session('success'))
                <div class="mb-4 p-4 rounded-md bg-green-100 text-green-800">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 space-y-6">

                    {{-- Header bar: search + tambah + report --}}
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                        <form action="{{ route('admpembangunan.index') }}" method="GET" class="flex gap-2 w-full md:w-1/2">
                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="🔍 Cari berdasarkan nama kegiatan..."
                                class="flex-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Cari</button>
                        </form>

                        <div class="flex items-center gap-3">
                            <a href="{{ route('admpembangunan.report') }}"
                               class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                                📑 Laporan
                            </a>

                            <a href="{{ route('admpembangunan.create') }}"
                               class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                                + Tambah Data
                            </a>
                        </div>
                    </div>

                    {{-- Table --}}
                    <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-sm">
                        <table class="min-w-full text-sm text-left border-collapse">
                            <thead class="bg-gray-50 text-gray-700">
                                <tr>
                                    <th class="px-3 py-2 border">#</th>
                                    <th class="px-3 py-2 border">Nama Kegiatan</th>
                                    <th class="px-3 py-2 border">Lokasi</th>
                                    <th class="px-3 py-2 border">Tanggal</th>
                                    <th class="px-3 py-2 border">Anggaran</th>
                                    <th class="px-3 py-2 border">Status</th>
                                    <th class="px-3 py-2 border text-center">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($data as $item)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-3 py-2 border">{{ $loop->iteration + ($data->currentPage()-1)*$data->perPage() }}</td>
                                        <td class="px-3 py-2 border">{{ $item->nama_kegiatan }}</td>
                                        <td class="px-3 py-2 border">{{ $item->lokasi }}</td>
                                        <td class="px-3 py-2 border">{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</td>
                                        <td class="px-3 py-2 border">Rp {{ number_format($item->anggaran,0,',','.') }}</td>
                                        <td class="px-3 py-2 border">
                                            @if($item->status == 'selesai')
                                                <span class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded">Selesai</span>
                                            @elseif($item->status == 'proses')
                                                <span class="px-2 py-1 text-xs bg-yellow-100 text-yellow-700 rounded">Proses</span>
                                            @else
                                                <span class="px-2 py-1 text-xs bg-gray-100 text-gray-700 rounded">{{ ucfirst($item->status) }}</span>
                                            @endif
                                        </td>
                                        <td class="px-3 py-2 border text-center">
                                            <div class="flex items-center justify-center gap-2">
                                                <a href="{{ route('admpembangunan.show', $item->id) }}" class="text-blue-600 hover:text-blue-800 text-xs font-medium">Lihat</a>
                                                <a href="{{ route('admpembangunan.edit', $item->id) }}" class="text-yellow-600 hover:text-yellow-800 text-xs font-medium">Edit</a>
                                                <form action="{{ route('admpembangunan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus data ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-800 text-xs font-medium">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="px-4 py-6 text-center text-gray-500">Belum ada data pembangunan.</td>
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
        </div>
    </div>
</x-app-layout>
