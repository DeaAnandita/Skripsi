<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Bangun Keluarga') }}
        </h2>
    </x-slot>

    @php
        // helper badge Ya/Tidak
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

                    {{-- Header bar: search + export + add --}}
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                        <form action="{{ route('bangunkeluarga.index') }}" method="GET" class="flex gap-2 w-full md:w-1/2">
                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="🔍 Cari berdasarkan nama user..."
                                class="flex-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Cari</button>
                        </form>

                        <div class="flex items-center gap-3">
                            <a href="{{ route('bangunkeluarga.export.Pdf') }}"
                               class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                                🖨 Export PDF
                            </a>

                            <a href="{{ route('bangunkeluarga.create') }}"
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

                                    {{-- Kolom utama bangun keluarga --}}
                                    <th class="px-3 py-2 border">Pakaian Berbeda</th>
                                    <th class="px-3 py-2 border">Ikut KB</th>
                                    <th class="px-3 py-2 border">Ikut Kegiatan</th>
                                    <th class="px-3 py-2 border">Ikut Posyandu</th>
                                    <th class="px-3 py-2 border">Remaja PIK</th>
                                    <th class="px-3 py-2 border">Anggota Merokok</th>
                                    <th class="px-3 py-2 border">Anak Mengemisi</th>
                                    <th class="px-3 py-2 border">Anggota Cacat Fisik</th>
                                    <th class="px-3 py-2 border">Protein Hewan</th>
                                    <th class="px-3 py-2 border">Memiliki Tabungan</th>
                                    <th class="px-3 py-2 border">Memiliki akses Informasi</th>
                                    <th class="px-3 py-2 border">Ikut BKB</th>
                                    <th class="px-3 py-2 border">Ikut BKL</th>
                                    <th class="px-3 py-2 border">Ikut BKR</th>
                                    <th class="px-3 py-2 border">Ikut UPPKS</th>
                                    <th class="px-3 py-2 border">Ibadah Agama</th>
                                    <th class="px-3 py-2 border">Komunikasi Keluarga</th>
                                    <th class="px-3 py-2 border">Pengurus Sosial</th>
                                    <th class="px-3 py-2 border">Lansia diatas 60th</th>
                                    <th class="px-3 py-2 border">Anak Jalanan</th>
                                    <th class="px-3 py-2 border">Pengemis</th>
                                    <th class="px-3 py-2 border">Pengamen</th>
                                    <th class="px-3 py-2 border">Kelainan Kulit</th>

                                    <th class="px-3 py-2 border text-center">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($bangun as $item)
                                    <tr class="hover:bg-gray-50 align-top">
                                        <td class="px-3 py-2 border">{{ $loop->iteration + ($bangun->currentPage()-1)*$bangun->perPage() }}</td>
                                        <td class="px-3 py-2 border">{{ $item->user->name ?? '-' }}</td>

                                        <td class="px-3 py-2 border">{{ $item->pakaian_berbeda ?? '-' }}</td>
                                        <td class="px-3 py-2 border">{{ $item->ikut_kb ?? '-' }}</td>
                                        <td class="px-3 py-2 border">{{ $item->ikut_kegiatan_rt ?? '-' }}</td>
                                        <td class="px-3 py-2 border">{{ $item->ikut_posyandu ?? '-' }}</td>
                                        <td class="px-3 py-2 border">{{ $item->remaja_ikut_pik ?? '-' }}</td>
                                        <td class="px-3 py-2 border">{{ $item->anggota_merokok ?? '-' }}</td>
                                        <td class="px-3 py-2 border">{{ $item->anak_mengemisi ?? '-' }}</td>
                                        <td class="px-3 py-2 border">{{ $item->anggota_cacat_fisik ?? '-' }}</td>
                                        <td class="px-3 py-2 border">{{ $item->makan_protein ?? '-' }}</td>
                                        <td class="px-3 py-2 border">{{ $item->memiliki_tabungan ?? '-' }}</td>
                                        <td class="px-3 py-2 border">{{ $item->akses_informasi ?? '-' }}</td>
                                        <td class="px-3 py-2 border">{{ $item->ikut_bkb ?? '-' }}</td>
                                        <td class="px-3 py-2 border">{{ $item->ikut_bkl ?? '-' }}</td>
                                        <td class="px-3 py-2 border">{{ $item->ikut_bkr ?? '-' }}</td>
                                        <td class="px-3 py-2 border">{{ $item->ikut_uppks ?? '-' }}</td>
                                        <td class="px-3 py-2 border">{{ $item->ibadah_sesuai_agama ?? '-' }}</td>
                                        <td class="px-3 py-2 border">{{ $item->komunikasi_keluarga ?? '-' }}</td>
                                        <td class="px-3 py-2 border">{{ $item->pengurus_kegiatan_sosial ?? '-' }}</td>
                                        <td class="px-3 py-2 border">{{ $item->lansia_diatas_60 ?? '-' }}</td>
                                        <td class="px-3 py-2 border">{{ $item->anak_jalanan ?? '-' }}</td>
                                        <td class="px-3 py-2 border">{{ $item->pengemis ?? '-' }}</td>
                                        <td class="px-3 py-2 border">{{ $item->pengamen ?? '-' }}</td>
                                        <td class="px-3 py-2 border">{{ $item->gila_stres ?? '-' }}</td>
                                        <td class="px-3 py-2 border">{{ $item->kelainan_kulit ?? '-' }}</td>

                                        <td class="px-3 py-2 border text-center">
                                            <div class="flex items-center justify-center gap-2">
                                                <a href="{{ route('bangunkeluarga.show', $item->id) }}" class="text-blue-600 hover:text-blue-800 text-xs font-medium">Lihat</a>
                                                <a href="{{ route('bangunkeluarga.edit', $item->id) }}" class="text-yellow-600 hover:text-yellow-800 text-xs font-medium">Edit</a>
                                                <form action="{{ route('bangunkeluarga.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus data ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-800 text-xs font-medium">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="100" class="px-4 py-6 text-center text-gray-500">Belum ada data bangun keluarga.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination --}}
                    <div class="mt-4">
                        {{ $bangun->appends(['search' => request('search')])->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
