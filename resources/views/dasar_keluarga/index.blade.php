<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Data Dasar Keluarga') }}
        </h2>
    </x-slot>

    @php
        $formatVal = function($v) {
            if ($v === null || $v === '') return '<span class="text-xs text-gray-500">-</span>';
            return e($v);
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

                    {{-- Header bar: search + add --}}
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                        <form action="{{ route('dasar-keluarga.index') }}" method="GET" class="flex gap-2 w-full md:w-1/2">
                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="🔍 Cari berdasarkan kepala rumah tangga..."
                                class="flex-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Cari</button>
                        </form>

                        <a href="{{ route('dasar-keluarga.create') }}"
                           class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                            + Tambah Data Dasar Keluarga
                        </a>
                    </div>

                    {{-- Table --}}
                    <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-sm">
                        <table class="min-w-full text-sm text-left border-collapse">
                            <thead class="bg-gray-50 text-gray-700">
                                <tr>
                                    <th class="px-3 py-2 border">#</th>
                                    <th class="px-3 py-2 border">Jenis Mutasi</th>
                                    <th class="px-3 py-2 border">Tanggal Mutasi</th>
                                    <th class="px-3 py-2 border">Nomor DTKS</th>
                                    <th class="px-3 py-2 border">Kepala Rumah Tangga</th>
                                    <th class="px-3 py-2 border">Dusun</th>
                                    <th class="px-3 py-2 border">RW</th>
                                    <th class="px-3 py-2 border">RT</th>
                                    <th class="px-3 py-2 border">Alamat</th>
                                    <th class="px-3 py-2 border">Provinsi</th>
                                    <th class="px-3 py-2 border">Kabupaten</th>
                                    <th class="px-3 py-2 border">Kecamatan</th>
                                    <th class="px-3 py-2 border">Desa</th>
                                    <th class="px-3 py-2 border text-center">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($dasar as $item)
                                    <tr class="hover:bg-gray-50 align-top">
                                        <td class="px-3 py-2 border">{{ $loop->iteration + ($dasar->currentPage()-1)*$dasar->perPage() }}</td>
                                        <td class="px-3 py-2 border">{!! $formatVal($item->jenis_mutasi) !!}</td>
                                        <td class="px-3 py-2 border">{!! $formatVal($item->tanggal_mutasi) !!}</td>
                                        <td class="px-3 py-2 border">{!! $formatVal($item->nomor_dtks) !!}</td>
                                        <td class="px-3 py-2 border">{!! $formatVal($item->kepala_rumah_tangga) !!}</td>
                                        <td class="px-3 py-2 border">{!! $formatVal($item->dusun) !!}</td>
                                        <td class="px-3 py-2 border">{!! $formatVal($item->rw) !!}</td>
                                        <td class="px-3 py-2 border">{!! $formatVal($item->rt) !!}</td>
                                        <td class="px-3 py-2 border">{!! $formatVal($item->alamat) !!}</td>
                                        <td class="px-3 py-2 border">{!! $formatVal($item->provinsi) !!}</td>
                                        <td class="px-3 py-2 border">{!! $formatVal($item->kabupaten) !!}</td>
                                        <td class="px-3 py-2 border">{!! $formatVal($item->kecamatan) !!}</td>
                                        <td class="px-3 py-2 border">{!! $formatVal($item->desa) !!}</td>

                                        <td class="px-3 py-2 border text-center">
                                            <div class="flex items-center justify-center gap-2">
                                                <a href="{{ route('dasar-keluarga.show', $item->id) }}" class="text-blue-600 hover:text-blue-800 text-xs font-medium">Lihat</a>
                                                <a href="{{ route('dasar-keluarga.edit', $item->id) }}" class="text-yellow-600 hover:text-yellow-800 text-xs font-medium">Edit</a>
                                                <form action="{{ route('dasar-keluarga.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus data ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-800 text-xs font-medium">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="100" class="px-4 py-6 text-center text-gray-500">Belum ada data dasar keluarga.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination --}}
                    <div class="mt-4">
                        {{ $dasar->appends(['search' => request('search')])->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
