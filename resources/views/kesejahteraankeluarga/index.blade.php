<x-app-layout>
    @php
        $formatVal = fn($v) => $v === null || $v === '' ? '<span class="text-xs text-gray-500">-</span>' : e($v);
    @endphp

    <div class="py-6" x-data="{
        showMutasi: false,
        showTanggal: false,
        selectedMutasi: '{{ request('jenis_mutasi') ?? '' }}',
        tanggalAwal: '{{ request('tanggal_awal') ?? '' }}',
        tanggalAkhir: '{{ request('tanggal_akhir') ?? '' }}',
        applyFilter(url) { window.location.href = url },
    }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Alert --}}
            @if(session('success'))
                <div class="mb-4 p-4 rounded-md bg-green-100 text-green-800">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Header --}}
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold text-gray-800">Data Kesejahteraan Keluarga</h2>
                <form action="{{ route('kesejahteraan-keluarga.index') }}" method="GET" class="flex gap-2 w-full md:w-1/2">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="🔍 Cari berdasarkan kesejahteraan keluarga..." class="flex-1 px-4 py-2 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Cari</button>
                </form>
                <div class="flex items-center gap-2">
                    <a href="{{ route('kesejahteraan-keluarga.index') }}"
                        class="px-3 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 text-sm">
                        Reset Filter
                    </a>
                    <a href="{{ route('kesejahteraan-keluarga.create') }}"
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
                                    <th class="px-3 py-2 border">Surveyor</th>
                                    <th class="px-3 py-2 border">Pendapatan Stabil</th>
                                    <th class="px-3 py-2 border">Akses Pendidikan</th>
                                    <th class="px-3 py-2 border">Akses Kesehatan</th>
                                    <th class="px-3 py-2 border">Sanitasi Baik</th>
                                    <th class="px-3 py-2 border">Air Bersih</th>
                                    <th class="px-3 py-2 border">Listrik Rumah</th>
                                    <th class="px-3 py-2 border">Pangan Cukup</th>
                                    <th class="px-3 py-2 border">Tabungan/Aset</th>
                                    <th class="px-3 py-2 border">Jaminan Sosial</th>
                                    <th class="px-3 py-2 border">Pekerjaan Keluarga</th>
                                    <th class="px-3 py-2 border">Akses Internet</th>
                                    <th class="px-3 py-2 border">Transportasi</th>
                                    <th class="px-3 py-2 border">Rumah Layak Huni</th>
                                    <th class="px-3 py-2 border">Pakaian Layak</th>
                                    <th class="px-3 py-2 border text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $formatVal = fn($v) => $v === null || $v === '' ? '<span class="text-xs text-gray-500">-</span>' : e($v);
                                @endphp
                                @forelse ($kesejahteraan as $item)
                                    <tr class="hover:bg-gray-50 align-top">
                                        <td class="px-3 py-2 border align-top">{{ $loop->iteration + ($kesejahteraan->currentPage()-1)*$kesejahteraan->perPage() }}</td>
                                        <td class="px-3 py-2 border align-top">{{ $formatVal($item->user->name ?? '-') }}</td>
                                        <td class="px-3 py-2 border align-top">{{ $formatVal($item->pendapatan_stabil) }}</td>
                                        <td class="px-3 py-2 border align-top">{{ $formatVal($item->akses_pendidikan) }}</td>
                                        <td class="px-3 py-2 border align-top">{{ $formatVal($item->akses_kesehatan) }}</td>
                                        <td class="px-3 py-2 border align-top">{{ $formatVal($item->sanitasi_baik) }}</td>
                                        <td class="px-3 py-2 border align-top">{{ $formatVal($item->air_bersih) }}</td>
                                        <td class="px-3 py-2 border align-top">{{ $formatVal($item->listrik_rumah) }}</td>
                                        <td class="px-3 py-2 border align-top">{{ $formatVal($item->pangan_cukup) }}</td>
                                        <td class="px-3 py-2 border align-top">{{ $formatVal($item->tabungan_aset) }}</td>
                                        <td class="px-3 py-2 border align-top">{{ $formatVal($item->jaminan_sosial) }}</td>
                                        <td class="px-3 py-2 border align-top">{{ $formatVal($item->pekerjaan_keluarga) }}</td>
                                        <td class="px-3 py-2 border align-top">{{ $formatVal($item->akses_internet) }}</td>
                                        <td class="px-3 py-2 border align-top">{{ $formatVal($item->transportasi) }}</td>
                                        <td class="px-3 py-2 border align-top">{{ $formatVal($item->rumah_layak_huni) }}</td>
                                        <td class="px-3 py-2 border align-top">{{ $formatVal($item->pakaian_layak) }}</td>
                                        <td class="px-3 py-2 border text-center align-top">
                                            <div class="flex items-center justify-center gap-2">
                                                <a href="{{ route('kesejahteraan-keluarga.show', $item->id) }}" class="text-blue-600 hover:text-blue-800 text-xs font-medium">Lihat</a>
                                                <a href="{{ route('kesejahteraan-keluarga.edit', $item->id) }}" class="text-yellow-600 hover:text-yellow-800 text-xs font-medium">Edit</a>
                                                <form action="{{ route('kesejahteraan-keluarga.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus data ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-800 text-xs font-medium">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="17" class="px-4 py-6 text-center text-gray-500">Belum ada data kesejahteraan keluarga.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination --}}
                    <div class="mt-4">
                        {{ $kesejahteraan->appends(['search' => request('search')])->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>