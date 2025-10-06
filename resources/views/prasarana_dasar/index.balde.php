<x-app-layout>
    @php
        $formatVal = fn($v) => $v === null || $v === '' 
            ? '<span class="text-xs text-gray-500">-</span>' 
            : e($v);
    @endphp

    <div class="py-6" x-data="{ showFilter: false }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Alert --}}
            @if(session('success'))
                <div class="mb-4 p-4 rounded-md bg-green-100 text-green-800">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Header --}}
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold text-gray-800">Data Prasarana Dasar</h2>
                <form action="{{ route('prasarana-dasar.index') }}" method="GET" class="flex gap-2 w-full md:w-1/2">
                    <input type="text" name="search" value="{{ request('search') }}" 
                        placeholder="🔍 Cari berdasarkan status pemilik bangunan..." 
                        class="flex-1 px-4 py-2 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    <button type="submit" 
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                        Cari
                    </button>
                </form>
                <div class="flex items-center gap-2">
                    <a href="{{ route('prasarana-dasar.index') }}"
                        class="px-3 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 text-sm">
                        Reset Filter
                    </a>
                    <a href="{{ route('prasarana-dasar.create') }}"
                        class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                        + Tambah Data
                    </a>
                </div>
            </div>

            {{-- Table --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm border-collapse">
                        <thead class="bg-gray-100 text-gray-700">
                            <tr>
                                <th class="px-3 py-2 border text-center w-10">#</th>
                                <th class="px-3 py-2 border">Status Pemilik Bangunan</th>
                                <th class="px-3 py-2 border">Status Pemilik Lahan</th>
                                <th class="px-3 py-2 border">Jenis Fisik Bangunan</th>
                                <th class="px-3 py-2 border">Jenis Lantai</th>
                                <th class="px-3 py-2 border">Kondisi Lantai</th>
                                <th class="px-3 py-2 border">Jenis Dinding</th>
                                <th class="px-3 py-2 border">Kondisi Dinding</th>
                                <th class="px-3 py-2 border">Jenis Atap</th>
                                <th class="px-3 py-2 border">Kondisi Atap</th>
                                <th class="px-3 py-2 border">Sumber Air Minum</th>
                                <th class="px-3 py-2 border">Kondisi Air Minum</th>
                                <th class="px-3 py-2 border">Cara Peroleh Air</th>
                                <th class="px-3 py-2 border">Sumber Penerangan</th>
                                <th class="px-3 py-2 border">Sumber Daya Terpasang</th>
                                <th class="px-3 py-2 border">Bahan Bakar Masak</th>
                                <th class="px-3 py-2 border">Fasilitas BAB</th>
                                <th class="px-3 py-2 border">Pembuangan Tinja</th>
                                <th class="px-3 py-2 border">Pembuangan Sampah</th>
                                <th class="px-3 py-2 border">Manfaat Air / Sungai</th>
                                <th class="px-3 py-2 border">Luas Lantai (m²)</th>
                                <th class="px-3 py-2 border">Jumlah Kamar</th>
                                <th class="px-3 py-2 border text-center">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($prasarana as $item)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-3 py-2 border text-center">
                                        {{ $loop->iteration + ($prasarana->currentPage()-1)*$prasarana->perPage() }}
                                    </td>
                                    <td class="px-3 py-2 border">{!! $formatVal($item->status_pemilik_bangunan) !!}</td>
                                    <td class="px-3 py-2 border">{!! $formatVal($item->status_pemilik_lahan) !!}</td>
                                    <td class="px-3 py-2 border">{!! $formatVal($item->jenis_fisik_bangunan) !!}</td>
                                    <td class="px-3 py-2 border">{!! $formatVal($item->jenis_lantai) !!}</td>
                                    <td class="px-3 py-2 border">{!! $formatVal($item->kondisi_lantai) !!}</td>
                                    <td class="px-3 py-2 border">{!! $formatVal($item->jenis_dinding) !!}</td>
                                    <td class="px-3 py-2 border">{!! $formatVal($item->kondisi_dinding) !!}</td>
                                    <td class="px-3 py-2 border">{!! $formatVal($item->jenis_atap) !!}</td>
                                    <td class="px-3 py-2 border">{!! $formatVal($item->kondisi_atap) !!}</td>
                                    <td class="px-3 py-2 border">{!! $formatVal($item->sumber_air_minum) !!}</td>
                                    <td class="px-3 py-2 border">{!! $formatVal($item->kondisi_air_minum) !!}</td>
                                    <td class="px-3 py-2 border">{!! $formatVal($item->cara_peroleh_air) !!}</td>
                                    <td class="px-3 py-2 border">{!! $formatVal($item->sumber_penerangan) !!}</td>
                                    <td class="px-3 py-2 border">{!! $formatVal($item->sumber_daya_terpasang) !!}</td>
                                    <td class="px-3 py-2 border">{!! $formatVal($item->bahan_bakar_memasak) !!}</td>
                                    <td class="px-3 py-2 border">{!! $formatVal($item->fasilitas_bab) !!}</td>
                                    <td class="px-3 py-2 border">{!! $formatVal($item->pembuangan_tinja) !!}</td>
                                    <td class="px-3 py-2 border">{!! $formatVal($item->pembuangan_sampah) !!}</td>
                                    <td class="px-3 py-2 border">{!! $formatVal($item->manfaat_air) !!}</td>
                                    <td class="px-3 py-2 border text-center">{!! $formatVal($item->luas_lantai) !!}</td>
                                    <td class="px-3 py-2 border text-center">{!! $formatVal($item->jumlah_kamar) !!}</td>

                                    <td class="px-3 py-2 border text-center">
                                        <div class="flex items-center justify-center gap-2">
                                            <a href="{{ route('prasarana-dasar.show', $item->id) }}" 
                                                class="text-blue-600 hover:text-blue-800 text-xs font-medium">Lihat</a>
                                            <a href="{{ route('prasarana-dasar.edit', $item->id) }}" 
                                                class="text-yellow-600 hover:text-yellow-800 text-xs font-medium">Edit</a>
                                            <form action="{{ route('prasarana-dasar.destroy', $item->id) }}" 
                                                method="POST" onsubmit="return confirm('Yakin ingin hapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                    class="text-red-600 hover:text-red-800 text-xs font-medium">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="100" class="px-4 py-6 text-center text-gray-500">
                                        Belum ada data prasarana dasar.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                <div class="p-4">
                    {{ $prasarana->appends(request()->all())->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>