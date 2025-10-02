<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Layanan Masyarakat') }}
        </h2>
    </x-slot>

    @php
        // Array mapping field ke label layanan
        $services = [
            'layanan_ktp' => 'KTP',
            'layanan_kk' => 'KK',
            'layanan_akta_kelahiran' => 'Akta Kelahiran',
            'layanan_akta_kematian' => 'Akta Kematian',
            'layanan_akta_perkawinan' => 'Akta Perkawinan',
            'layanan_akta_cerai' => 'Akta Cerai',
            'layanan_sim' => 'SIM',
            'layanan_stnk' => 'STNK',
            'layanan_pbb' => 'PBB',
            'layanan_bpjs_kesehatan' => 'BPJS Kesehatan',
            'layanan_bpjs_ketenagakerjaan' => 'BPJS Ketenagakerjaan',
            'layanan_kartu_keluarga_sejahtera' => 'Kartu Keluarga Sejahtera',
            'layanan_bantuan_langsung_tunai' => 'BLT',
            'layanan_sertifikat_tanah' => 'Sertifikat Tanah',
            'layanan_izin_usaha' => 'Izin Usaha',
            'layanan_bantuan_pendidikan' => 'Bantuan Pendidikan',
            'layanan_bantuan_kesehatan' => 'Bantuan Kesehatan',
            'layanan_pengaduan_masyarakat' => 'Pengaduan Masyarakat',
            'layanan_informasi_publik' => 'Informasi Publik',
            'layanan_pendaftaran_sekolah' => 'Pendaftaran Sekolah',
            'layanan_vaksinasi' => 'Vaksinasi',
            'layanan_posyandu' => 'Posyandu',
            'layanan_program_keluarga_berencana' => 'Program KB',
            'layanan_rehabilitasi_narkoba' => 'Rehabilitasi Narkoba',
            'layanan_bantuan_hukum' => 'Bantuan Hukum',
            'layanan_pemakaman' => 'Pemakaman',
            'layanan_transportasi_sosial' => 'Transportasi Sosial',
            'layanan_penerangan_jalan' => 'Penerangan Jalan',
            'layanan_air_bersih' => 'Air Bersih',
        ];

        // Helper untuk daftar layanan yang diminta
        $formatServices = function($item) use ($services) {
            $requested = [];
            foreach ($services as $field => $label) {
                if ($item->$field) {
                    $detail = $item->{$field . '_lainnya'};
                    $entry = $label;
                    if ($detail && trim($detail) !== '') {
                        $entry .= ' (' . e(trim($detail)) . ')';
                    }
                    $requested[] = $entry;
                }
            }
            if (empty($requested)) {
                return '<span class="text-xs text-gray-500">-</span>';
            }
            return '<div class="text-xs space-y-1">' . implode('<br>', $requested) . '</div>';
        };

        // Helper untuk status pengajuan
        $formatStatus = function($v) {
            if ($v === null || $v === '') return '<span class="text-xs text-gray-500">-</span>';
            return match($v) {
                'pending' => '<span class="px-2 py-0.5 text-xs bg-yellow-100 text-yellow-800 rounded">Pending</span>',
                'proses' => '<span class="px-2 py-0.5 text-xs bg-blue-100 text-blue-800 rounded">Diproses</span>',
                'selesai' => '<span class="px-2 py-0.5 text-xs bg-green-100 text-green-800 rounded">Selesai</span>',
                'ditolak' => '<span class="px-2 py-0.5 text-xs bg-red-100 text-red-800 rounded">Ditolak</span>',
                default => '<span class="px-2 py-0.5 text-xs bg-gray-100 text-gray-800 rounded">Belum Diproses</span>'
            };
        };
    @endphp

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            {{-- Alert sukses --}}
            @if(session('success'))
                <div class="mb-4 p-4 rounded-md bg-green-100 text-green-800">
                    ✅ {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 space-y-6">

                    {{-- Header bar: search + export + add --}}
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                        <form action="{{ route('layananmasyarakat.index') }}" method="GET" class="flex gap-2 w-full md:w-1/2">
                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="🔍 Cari berdasarkan nama pemohon..."
                                class="flex-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                                Cari
                            </button>
                        </form>

                        <div class="flex items-center gap-3">
                            {{-- Dropdown Export --}}
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
                                    <a href="{{ route('layananmasyarakat.export.csv') }}" class="block px-4 py-2 hover:bg-gray-50">📄 Export CSV</a>
                                    <a href="{{ route('layananmasyarakat.export.pdf') }}" class="block px-4 py-2 hover:bg-gray-50">🖨 Export PDF</a>
                                </div>
                            </div>

                            {{-- Tambah Layanan --}}
                            <a href="{{ route('layananmasyarakat.create') }}"
                                class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                                + Tambah Layanan
                            </a>
                        </div>
                    </div>

                    {{-- Tabel data --}}
                    <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-sm">
                        <table class="min-w-full text-sm text-left border-collapse">
                            <thead class="bg-gray-50 text-gray-700">
                                <tr>
                                    <th class="px-3 py-2 border">#</th>
                                    <th class="px-3 py-2 border">Pemohon</th>
                                    <th class="px-3 py-2 border">Layanan Diminta</th>
                                    <th class="px-3 py-2 border">Status Pengajuan</th>
                                    <th class="px-3 py-2 border">Tanggal Pengajuan</th>
                                    <th class="px-3 py-2 border text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($layanan as $item)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-3 py-2 border">{{ $loop->iteration + ($layanan->currentPage()-1)*$layanan->perPage() }}</td>
                                        <td class="px-3 py-2 border">
                                            <div class="font-medium text-gray-900">
                                                {{ $item->user->name ?? '-' }}
                                            </div>
                                        </td>
                                        <td class="px-3 py-2 border max-w-xs">{!! $formatServices($item) !!}</td>
                                        <td class="px-3 py-2 border">{!! $formatStatus($item->status_pengajuan) !!}</td>
                                        <td class="px-3 py-2 border">{{ $item->tanggal_pengajuan ? $item->tanggal_pengajuan->format('d/m/Y') : '-' }}</td>
                                        <td class="px-3 py-2 border text-center">
                                            <div class="flex items-center justify-center gap-2">
                                                <a href="{{ route('layananmasyarakat.show', $item->id) }}" class="text-blue-600 hover:text-blue-800 text-xs font-medium">Lihat</a>
                                                <a href="{{ route('layananmasyarakat.edit', $item->id) }}" class="text-yellow-600 hover:text-yellow-800 text-xs font-medium">Edit</a>
                                                <form action="{{ route('layananmasyarakat.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus data layanan ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-800 text-xs font-medium">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-4 py-6 text-center text-gray-500">
                                            Belum ada data layanan masyarakat.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination --}}
                    <div class="mt-4">
                        {{ $layanan->appends(['search' => request('search')])->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>