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
                <h2 class="text-xl font-semibold text-gray-800">Data Bangun Keluarga</h2>
                <form action="{{ route('bangun-keluarga.index') }}" method="GET" class="flex gap-2 w-full md:w-1/2">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="🔍 Cari berdasarkan Nomer KK..." class="flex-1 px-4 py-2 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Cari</button>
                </form>
                <div class="flex items-center gap-2">
                    <a href="{{ route('bangun-keluarga.index') }}"
                        class="px-3 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 text-sm">
                        Reset Filter
                    </a>
                    <a href="{{ route('bangun-keluarga.create') }}"
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
                                    <th class="px-3 py-2 border">Gila Setres</th>
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
                                                <a href="{{ route('bangun-keluarga.show', $item->id) }}" class="text-blue-600 hover:text-blue-800 text-xs font-medium">Lihat</a>
                                                <a href="{{ route('bangun-keluarga.edit', $item->id) }}" class="text-yellow-600 hover:text-yellow-800 text-xs font-medium">Edit</a>
                                                <form action="{{ route('bangun-keluarga.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus data ini?')">
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
