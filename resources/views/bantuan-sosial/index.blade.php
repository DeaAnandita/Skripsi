<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Bantuan Sosial') }}
        </h2>
    </x-slot>

    @php
<<<<<<< Updated upstream
        // Helper untuk render nilai Ya/Tidak/Lainnya/- dengan badge
=======
>>>>>>> Stashed changes
        $formatBool = function($v) {
            if ($v === null || $v === '') return '<span class="text-xs text-gray-500">-</span>';
            $s = strtolower((string)$v);
            if (in_array($s, ['1', 'ya', 'yes', 'y', 'true'])) {
                return '<span class="px-2 py-0.5 text-xs bg-green-100 text-green-800 rounded">Ya</span>';
            }
            if (in_array($s, ['0', 'tidak', 'no', 'n', 'false'])) {
                return '<span class="px-2 py-0.5 text-xs bg-gray-100 text-gray-800 rounded">Tidak</span>';
            }
            return '<span class="px-2 py-0.5 text-xs bg-yellow-100 text-yellow-800 rounded">'.e($v).'</span>';
        };

        // Helper untuk status verifikasi
        $formatStatus = function($v) {
            if ($v === null || $v === '') return '<span class="text-xs text-gray-500">-</span>';
            switch ($v) {
                case 'Diverifikasi':
                    return '<span class="px-2 py-0.5 text-xs bg-green-100 text-green-800 rounded">Diverifikasi</span>';
                case 'Ditolak':
                    return '<span class="px-2 py-0.5 text-xs bg-red-100 text-red-800 rounded">Ditolak</span>';
                case 'Sedang Diverifikasi':
                    return '<span class="px-2 py-0.5 text-xs bg-yellow-100 text-yellow-800 rounded">Sedang Diverifikasi</span>';
                default:
                    return '<span class="px-2 py-0.5 text-xs bg-gray-100 text-gray-800 rounded">Belum Diverifikasi</span>';
            }
        };

        // Helper untuk status aktif
        $formatActive = function($v) {
            if ($v === null || $v === '') return '<span class="text-xs text-gray-500">-</span>';
            return $v ? '<span class="px-2 py-0.5 text-xs bg-green-100 text-green-800 rounded">Aktif</span>' : '<span class="px-2 py-0.5 text-xs bg-red-100 text-red-800 rounded">Tidak Aktif</span>';
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
<<<<<<< Updated upstream
                    <!-- Header bar: search + export + add -->
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                        <form action="{{ route('bantuan-sosial.index') }}" method="GET" class="flex gap-2 w-full md:w-1/2">
                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="🔍 Cari berdasarkan nama keluarga..."
                                class="flex-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
=======
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                        <form action="{{ route('bantuan-sosial.index') }}" method="GET" class="flex gap-2 w-full md:w-1/2">
                            <input type="text" name="search" value="{{ request('search') }}"
                                   placeholder="🔍 Cari berdasarkan nama user..."
                                   class="flex-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
>>>>>>> Stashed changes
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

                            <a href="{{ route('bantuan-sosial.create') }}"
<<<<<<< Updated upstream
                                class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                                + Tambah Bantuan
=======
                               class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                                + Tambah Data
>>>>>>> Stashed changes
                            </a>
                        </div>
                    </div>

                    <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-sm">
                        <table class="min-w-full text-sm text-left border-collapse">
                            <thead class="bg-gray-50 text-gray-700">
                                <tr>
<<<<<<< Updated upstream
                                    <th class="px-3 py-2 border">#</th>
                                    <th class="px-3 py-2 border">Keluarga</th>
=======
                                    <th class="px-3 py-2 border">No</th>
>>>>>>> Stashed changes
                                    <th class="px-3 py-2 border">Petugas</th>
                                    <th class="px-3 py-2 border">KKS/KPS</th>
                                    <th class="px-3 py-2 border">PKH</th>
                                    <th class="px-3 py-2 border">Raskin/BPNT</th>
                                    <th class="px-3 py-2 border">KIP</th>
                                    <th class="px-3 py-2 border">KIS</th>
                                    <th class="px-3 py-2 border">Jamsostek</th>
                                    <th class="px-3 py-2 border">Asuransi Lain</th>
<<<<<<< Updated upstream
                                    <th class="px-3 py-2 border">Status Verifikasi</th>
                                    <th class="px-3 py-2 border">Status Aktif</th>
                                    <th class="px-3 py-2 border text-center">Aksi</th>
=======
                                    <th class="px-3 py-2 border">Verifikasi Identitas</th>
                                    <th class="px-3 py-2 border">Data Lintas</th>
                                    <th class="px-3 py-2 border">Konfirmasi Kepala Desa</th>
                                    <th class="px-3 py-2 border">Status Verif.</th>
                                    <th class="px-3 py-2 border">Aksi</th>
>>>>>>> Stashed changes
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($bantuan as $item)
                                    <tr class="hover:bg-gray-50 align-top">
                                        <td class="px-3 py-2 border align-top">{{ $loop->iteration + ($bantuan->currentPage()-1)*$bantuan->perPage() }}</td>
                                        <td class="px-3 py-2 border align-top">{{ $item->keluarga->nama_kepala_keluarga ?? '-' }} (KK: {{ $item->keluarga->nomor_kk ?? '-' }})</td>
                                        <td class="px-3 py-2 border align-top">{{ $item->petugas->name ?? '-' }}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->kks_kps) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->pkh) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->raskin_bpnt) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->kip) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->kis) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->jamsostek_bpjs_ketenagakerjaan) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->peserta_mandiri_asuransi_lain) !!}</td>
<<<<<<< Updated upstream
                                        <td class="px-3 py-2 border align-top">{!! $formatStatus($item->status_verifikasi) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatActive($item->is_active) !!}</td>
=======
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->verifikasi_identitas) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->data_lintas_sektor) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->konfirmasi_kepala_desa) !!}</td>
                                        <td class="px-3 py-2 border align-top">{{ $item->status_verifikasi ?? '-' }}</td>
>>>>>>> Stashed changes
                                        <td class="px-3 py-2 border text-center align-top">
                                            <div class="flex items-center justify-center gap-2">
                                                <a href="{{ route('bantuan-sosial.show', $item->id) }}" class="text-blue-600 hover:text-blue-800 text-xs font-medium">Lihat</a>
                                                <a href="{{ route('bantuan-sosial.edit', $item->id) }}" class="text-yellow-600 hover:text-yellow-800 text-xs font-medium">Edit</a>
<<<<<<< Updated upstream
                                                <form action="{{ route('bantuan-sosial.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus data bantuan ini?')">
=======
                                                <form action="{{ route('bantuan-sosial.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus data ini?')">
>>>>>>> Stashed changes
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-800 text-xs font-medium">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
<<<<<<< Updated upstream
                                        <td colspan="13" class="px-4 py-6 text-center text-gray-500">Belum ada data bantuan sosial.</td>
=======
                                        <td colspan="16" class="px-4 py-6 text-center text-gray-500">Belum ada data bantuan sosial.</td>
>>>>>>> Stashed changes
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $bantuan->appends(['search' => request('search')])->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>