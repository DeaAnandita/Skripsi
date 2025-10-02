<x-app-layout>
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
                            @endforeach
                        </ul>
                    </div>

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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>