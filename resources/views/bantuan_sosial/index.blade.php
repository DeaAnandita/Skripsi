<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Bantuan Sosial') }}
        </h2>
    </x-slot>

    @php
        // Helper untuk render nilai Ya/Tidak/- dengan badge
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

                    <!-- Header bar: search + export + add -->
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                        <form action="{{ route('bantuan_sosial.index') }}" method="GET" class="flex gap-2 w-full md:w-1/2">
                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="🔍 Cari berdasarkan nama penerima..."
                                class="flex-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Cari</button>
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
                                    <a href="{{ route('bantuan-sosial.export.csv') }}" class="block px-4 py-2 hover:bg-gray-50">📄 Export CSV</a>
                                    <a href="{{ route('bantuan-sosial.export.pdf') }}" class="block px-4 py-2 hover:bg-gray-50">🖨 Export PDF</a>
                                </div>
                            </div>

                            <a href="{{ route('bantuan_sosial.create') }}"
                               class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                                + Tambah Bantuan
                            </a>
                        </div>
                    </div>

                    <!-- Table -->
                    <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-sm">
                        <table class="min-w-full text-sm text-left border-collapse">
                            <thead class="bg-gray-50 text-gray-700">
                                <tr>
                                    <th class="px-3 py-2 border">#</th>
                                    <th class="px-3 py-2 border">Petugas</th>
                                    <th class="px-3 py-2 border">NIK</th>
                                    <th class="px-3 py-2 border">Nama Penerima</th>
                                    <th class="px-3 py-2 border">KKS/KPS</th>
                                    <th class="px-3 py-2 border">PKH</th>
                                    <th class="px-3 py-2 border">Raskin/BPNT</th>
                                    <th class="px-3 py-2 border">KIP</th>
                                    <th class="px-3 py-2 border">KIS</th>
                                    <th class="px-3 py-2 border">Jamsostek/BPJS</th>
                                    <th class="px-3 py-2 border">Asuransi Lain</th>
                                    <th class="px-3 py-2 border">Verif. Identitas</th>
                                    <th class="px-3 py-2 border">Data Lintas</th>
                                    <th class="px-3 py-2 border">Konf. Kepala Desa</th>
                                    <th class="px-3 py-2 border">Status Verif.</th>
                                    <th class="px-3 py-2 border">Alasan Ditolak</th>
                                    <th class="px-3 py-2 border">Jenis Distribusi</th>
                                    <th class="px-3 py-2 border">Jumlah Bantuan</th>
                                    <th class="px-3 py-2 border">Tanggal Distribusi</th>
                                    <th class="px-3 py-2 border">Bukti Distribusi</th>
                                    <th class="px-3 py-2 border">Status Program</th>
                                    <th class="px-3 py-2 border text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($bantuans as $item)
                                    <tr class="hover:bg-gray-50 align-top">
                                        <td class="px-3 py-2 border align-top">{{ $loop->iteration + ($bantuans->currentPage()-1)*$bantuans->perPage() }}</td>
                                        <td class="px-3 py-2 border align-top">{{ $item->petugas->nama_lengkap ?? '-' }}</td>
                                        <td class="px-3 py-2 border align-top">{{ $item->nik_manual ?? '-' }}</td>
                                        <td class="px-3 py-2 border align-top">{{ $item->nama_lengkap ?? '-' }}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->kks_kps) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->pkh) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->raskin_bpnt) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->kip) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->kis) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->jamsostek_bpjs_ketenagakerjaan) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->peserta_mandiri_asuransi_lain) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->verifikasi_identitas) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->data_lintas_sektor) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->konfirmasi_kepala_desa) !!}</td>
                                        <td class="px-3 py-2 border align-top">{{ $item->status_verifikasi ?? '-' }}</td>
                                        <td class="px-3 py-2 border align-top">{{ $item->alasan_ditolak ?? '-' }}</td>
                                        <td class="px-3 py-2 border align-top">{{ $item->jenis_distribusi ?? '-' }}</td>
                                        <td class="px-3 py-2 border align-top">{{ $item->jumlah_bantuan ?? '-' }}</td>
                                        <td class="px-3 py-2 border align-top">{{ $item->tanggal_distribusi ?? '-' }}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->bukti_distribusi) !!}</td>
                                        <td class="px-3 py-2 border align-top">{{ $item->status_program ?? '-' }}</td>
                                        <td class="px-3 py-2 border text-center align-top">
                                            <div class="flex items-center justify-center gap-2">
                                                <a href="{{ route('bantuan_sosial.show', $item->id) }}" class="text-blue-600 hover:text-blue-800 text-xs font-medium">Lihat</a>
                                                <a href="{{ route('bantuan_sosial.edit', $item->id) }}" class="text-yellow-600 hover:text-yellow-800 text-xs font-medium">Edit</a>
                                                <form action="{{ route('bantuan_sosial.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus data ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-800 text-xs font-medium">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="22" class="px-4 py-6 text-center text-gray-500">Belum ada data bantuan sosial.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="mt-4">
                        {{ $bantuans->appends(['search' => request('search')])->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>