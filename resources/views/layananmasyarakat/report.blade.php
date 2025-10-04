<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Report Layanan Masyarakat') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Filter --}}
            <form method="GET" class="flex gap-4 bg-white p-4 rounded shadow">
                <select name="status_pengajuan" class="border rounded px-2">
                    <option value="">-- Status Pengajuan --</option>
                    @foreach(['pending','proses','selesai','ditolak'] as $status)
                        <option value="{{ $status }}" @selected(request('status_pengajuan')==$status)>{{ ucfirst($status) }}</option>
                    @endforeach
                </select>

                <input type="text" name="nama_pemohon" value="{{ request('nama_pemohon') }}" placeholder="Nama Pemohon" class="border rounded px-2">

                <input type="date" name="tanggal_pengajuan" value="{{ request('tanggal_pengajuan') }}" class="border rounded px-2">

                <button type="submit" class="px-3 py-1 bg-blue-600 text-white rounded">Filter</button>
            </form>

            {{-- Ringkasan --}}
            <div class="bg-white p-6 rounded shadow">
                <h3 class="font-bold text-lg mb-4">Ringkasan</h3>
                <p>Total Pengajuan Layanan: <b>{{ $total }}</b></p>

                <div class="grid grid-cols-2 gap-6 mt-4">
                    <div>
                        <h4 class="font-semibold">Per Status Pengajuan</h4>
                        <ul>
                            @foreach($perStatus as $status => $jumlah)
                                <li>{{ ucfirst($status) }}: {{ $jumlah }}</li>
                            @endforeach
                        </ul>
                    </div>

                    <div>
                        <h4 class="font-semibold">Per Kategori Layanan</h4>
                        <ul>
                            @foreach($perKategori as $kategori => $jumlah)
                                <li>{{ ucfirst($kategori) }}: {{ $jumlah }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            {{-- Tabel detail --}}
            <div class="bg-white p-6 rounded shadow">
                <h3 class="font-bold text-lg mb-4">Detail Pengajuan Layanan</h3>
                <table class="w-full border">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border p-2">ID Pengajuan</th>
                            <th class="border p-2">Pemohon</th>
                            <th class="border p-2">Layanan Diminta</th>
                            <th class="border p-2">Status Pengajuan</th>
                            <th class="border p-2">Tanggal Pengajuan</th>
                            <th class="border p-2">Tanggal Selesai</th>
                            <th class="border p-2">Deskripsi Lengkap</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $row)
                            <tr>
                                <td class="border p-2">{{ $row->id }}</td>
                                <td class="border p-2">{{ $row->user->name ?? '-' }}</td>
                                <td class="border p-2 max-w-xs">
                                    @php
                                        $requested = [];
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
                                        foreach ($services as $field => $label) {
                                            if ($row->$field) {
                                                $detail = $row->{$field . '_lainnya'};
                                                $entry = $label;
                                                if ($detail && trim($detail) !== '') {
                                                    $entry .= ' (' . e(trim($detail)) . ')';
                                                }
                                                $requested[] = $entry;
                                            }
                                        }
                                    @endphp
                                    @if(empty($requested))
                                        -
                                    @else
                                        <div class="text-xs space-y-1">{{ implode('<br>', $requested) }}</div>
                                    @endif
                                </td>
                                <td class="border p-2">
                                    @switch($row->status_pengajuan)
                                        @case('pending')
                                            <span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded text-xs">Pending</span>
                                            @break
                                        @case('proses')
                                            <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded text-xs">Diproses</span>
                                            @break
                                        @case('selesai')
                                            <span class="px-2 py-1 bg-green-100 text-green-800 rounded text-xs">Selesai</span>
                                            @break
                                        @case('ditolak')
                                            <span class="px-2 py-1 bg-red-100 text-red-800 rounded text-xs">Ditolak</span>
                                            @break
                                        @default
                                            <span class="text-gray-500 text-xs">-</span>
                                    @endswitch
                                </td>
                                <td class="border p-2">{{ $row->tanggal_pengajuan ? \Carbon\Carbon::parse($row->tanggal_pengajuan)->format('d-m-Y') : '-' }}</td>
                                <td class="border p-2">{{ $row->tanggal_selesai ? \Carbon\Carbon::parse($row->tanggal_selesai)->format('d-m-Y') : '-' }}</td>
                                <td class="border p-2">{{ Str::limit($row->deskripsi_lengkap ?? '-', 50) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center p-2">Tidak ada data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>