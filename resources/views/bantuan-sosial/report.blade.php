<x-app-layout>
<<<<<<< Updated upstream
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Laporan Bantuan Sosial') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Filter -->
            <form method="GET" class="flex gap-4 bg-white p-4 rounded shadow">
                <select name="program" class="border rounded px-2">
                    <option value="">-- Program Bantuan --</option>
                    @foreach(['KKS/KPS', 'PKH', 'Raskin/BPNT', 'KIP', 'KIS', 'Jamsostek/BPJS Ketenagakerjaan', 'Asuransi Lain'] as $prog)
                        <option value="{{ $prog }}" @selected(request('program') == $prog)>{{ $prog }}</option>
                    @endforeach
                </select>

                <select name="status_verifikasi" class="border rounded px-2">
                    <option value="">-- Status Verifikasi --</option>
                    @foreach(['Belum Diverifikasi', 'Sedang Diverifikasi', 'Diverifikasi', 'Ditolak'] as $status)
                        <option value="{{ $status }}" @selected(request('status_verifikasi') == $status)>{{ $status }}</option>
                    @endforeach
                </select>

                <input type="number" name="tahun" value="{{ request('tahun') }}" placeholder="Tahun Usulan" class="border rounded px-2">

                <button type="submit" class="px-3 py-1 bg-blue-600 text-white rounded">Filter</button>
            </form>

            <!-- Ringkasan -->
            <div class="bg-white p-6 rounded shadow">
                <h3 class="font-bold text-lg mb-4">Ringkasan</h3>
                <p>Total Penerima: <b>{{ $total }}</b></p>
                <p>Total Nilai Bantuan: <b>Rp {{ number_format($totalNilai, 0, ',', '.') }}</b></p>

                <div class="grid grid-cols-2 gap-6 mt-4">
                    <div>
                        <h4 class="font-semibold">Per Program Bantuan</h4>
                        <ul>
                            @foreach($perProgram as $prog => $jumlah)
                                <li>{{ $prog }}: {{ $jumlah }}</li>
=======
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h2 class="text-2xl font-bold mb-4">Laporan Bantuan Sosial</h2>

                    <!-- Filter -->
                    <div class="mb-4 flex gap-2">
                        <form action="{{ route('bantuan-sosial.report') }}" method="GET" class="flex gap-2 w-full md:w-1/2">
                            <input type="text" name="search" value="{{ request('search') }}" placeholder="🔍 Cari berdasarkan NIK atau nama..." class="flex-1 px-4 py-2 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Cari</button>
                        </form>
                        <div class="flex items-center gap-2">
                            <a href="{{ route('bantuan-sosial.report') }}"
                               class="px-3 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 text-sm">
                                Reset Filter
                            </a>
                            <a href="{{ route('bantuan-sosial.report', ['export' => 'pdf'] + request()->all()) }}"
                               class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                                Export PDF
                            </a>
                        </div>
                    </div>

                    <!-- Filter Tanggal Survey -->
                    <div class="mb-4" x-data="{ showSurveyDate: false }">
                        <div class="relative inline-block">
                            <button @click="showSurveyDate = !showSurveyDate" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg flex items-center">
                                <span>Filter Tanggal Survey</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div x-show="showSurveyDate" @click.away="showSurveyDate = false" class="absolute z-10 mt-2 w-64 bg-white border rounded-md shadow-lg p-2">
                                <form method="GET" action="{{ route('bantuan-sosial.report') }}" class="space-y-2">
                                    <input type="hidden" name="search" value="{{ request('search') }}">
                                    <label class="block text-sm text-gray-700">Tanggal Survey</label>
                                    <input type="date" name="tanggal_survey" value="{{ request('tanggal_survey') }}" class="w-full px-2 py-1 border rounded-md">
                                    <button type="submit" class="w-full mt-2 bg-blue-600 text-white py-1 rounded-md hover:bg-blue-700">Terapkan</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Summary -->
                    <div class="mb-6">
                        <p class="text-lg font-semibold">Total Data: {{ $total }}</p>
                        <p class="text-md">Per Program:</p>
                        <ul class="list-disc pl-5">
                            @foreach (['Ya', 'Tidak', 'Lainnya'] as $status)
                                <li>{{ $status }}: {{ $perProgram[$status] ?? 0 }}</li>
>>>>>>> Stashed changes
                            @endforeach
                        </ul>
                    </div>

<<<<<<< Updated upstream
                    <div>
                        <h4 class="font-semibold">Per Status Verifikasi</h4>
                        <ul>
                            @foreach($perStatus as $status => $jumlah)
                                <li>{{ $status }}: {{ $jumlah }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Tabel Detail -->
            <div class="bg-white p-6 rounded shadow">
                <h3 class="font-bold text-lg mb-4">Detail Bantuan Sosial</h3>
                <div class="overflow-x-auto">
                    <table class="w-full border">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="border p-2">Keluarga</th>
                                <th class="border p-2">Petugas</th>
                                <th class="border p-2">KKS/KPS</th>
                                <th class="border p-2">PKH</th>
                                <th class="border p-2">Raskin/BPNT</th>
                                <th class="border p-2">KIP</th>
                                <th class="border p-2">KIS</th>
                                <th class="border p-2">Jamsostek</th>
                                <th class="border p-2">Asuransi Lain</th>
                                <th class="border p-2">Status Verifikasi</th>
                                <th class="border p-2">Jumlah Bantuan</th>
                                <th class="border p-2">Tahun Usulan</th>
                                <th class="border p-2">Status Aktif</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $row)
                                <tr>
                                    <td class="border p-2">{{ $row->keluarga->nama_kepala_keluarga ?? '-' }} (KK: {{ $row->keluarga->nomor_kk ?? '-' }})</td>
                                    <td class="border p-2">{{ $row->petugas->name ?? '-' }}</td>
                                    <td class="border p-2">{{ $row->kks_kps ?? '-' }}</td>
                                    <td class="border p-2">{{ $row->pkh ?? '-' }}</td>
                                    <td class="border p-2">{{ $row->raskin_bpnt ?? '-' }}</td>
                                    <td class="border p-2">{{ $row->kip ?? '-' }}</td>
                                    <td class="border p-2">{{ $row->kis ?? '-' }}</td>
                                    <td class="border p-2">{{ $row->jamsostek_bpjs_ketenagakerjaan ?? '-' }}</td>
                                    <td class="border p-2">{{ $row->peserta_mandiri_asuransi_lain ?? '-' }}</td>
                                    <td class="border p-2">{{ $row->status_verifikasi ?? '-' }}</td>
                                    <td class="border p-2">Rp {{ number_format($row->jumlah_bantuan, 0, ',', '.') }}</td>
                                    <td class="border p-2">{{ $row->tanggal_usul ? date('Y', strtotime($row->tanggal_usul)) : '-' }}</td>
                                    <td class="border p-2">{{ $row->is_active ? 'Aktif' : 'Tidak Aktif' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="13" class="text-center p-2">Tidak ada data bantuan sosial</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
=======
                    <!-- Table -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full text-sm border-collapse">
                            <thead class="bg-gray-100 text-gray-700">
                                <tr>
                                    <th class="px-3 py-2 border text-center w-10">#</th>
                                    <th class="px-3 py-2 border">Tanggal Survey</th>
                                    <th class="px-3 py-2 border">NIK Manual</th>
                                    <th class="px-3 py-2 border">Nama Lengkap</th>
                                    <th class="px-3 py-2 border">KKS/KPS</th>
                                    <th class="px-3 py-2 border">PKH</th>
                                    <th class="px-3 py-2 border">KIP</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $index => $item)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-3 py-2 border text-center">{{ $index + 1 }}</td>
                                        <td class="px-3 py-2 border">{{ $item->tanggal_survey ?? '-' }}</td>
                                        <td class="px-3 py-2 border">{{ $item->nik_manual ?? '-' }}</td>
                                        <td class="px-3 py-2 border">{{ $item->nama_lengkap ?? '-' }}</td>
                                        <td class="px-3 py-2 border">{{ $item->kks_kps ?? '-' }} {{ $item->kks_kps_lainnya ? '(' . $item->kks_kps_lainnya . ')' : '' }}</td>
                                        <td class="px-3 py-2 border">{{ $item->pkh ?? '-' }} {{ $item->pkh_lainnya ? '(' . $item->pkh_lainnya . ')' : '' }}</td>
                                        <td class="px-3 py-2 border">{{ $item->kip ?? '-' }} {{ $item->kip_lainnya ? '(' . $item->kip_lainnya . ')' : '' }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="px-4 py-6 text-center text-gray-500">
                                            Belum ada data bantuan sosial.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="p-4">
                        {{ $data->appends(request()->all())->links() }}
                    </div>
>>>>>>> Stashed changes
                </div>
            </div>
        </div>
    </div>
<<<<<<< Updated upstream
</x-app-layout>
=======

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
</xaiArtifact>
>>>>>>> Stashed changes
