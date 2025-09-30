<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail Bantuan Sosial
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Detail dalam tabel -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="table-auto w-full border">
                    <tbody>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Nama Kepala Keluarga</td>
                            <td class="border px-4 py-2">{{ $item->keluarga->nama_kepala_keluarga ?? '-' }} (KK: {{ $item->keluarga->nomor_kk ?? '-' }})</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Petugas</td>
                            <td class="border px-4 py-2">{{ $item->petugas->name ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">KKS/KPS</td>
                            <td class="border px-4 py-2">{{ $item->kks_kps ?? '-' }} {{ $item->kks_kps_lainnya ? "({$item->kks_kps_lainnya})" : '' }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">PKH</td>
                            <td class="border px-4 py-2">{{ $item->pkh ?? '-' }} {{ $item->pkh_lainnya ? "({$item->pkh_lainnya})" : '' }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Raskin/BPNT</td>
                            <td class="border px-4 py-2">{{ $item->raskin_bpnt ?? '-' }} {{ $item->raskin_bpnt_lainnya ? "({$item->raskin_bpnt_lainnya})" : '' }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">KIP</td>
                            <td class="border px-4 py-2">{{ $item->kip ?? '-' }} {{ $item->kip_lainnya ? "({$item->kip_lainnya})" : '' }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">KIS</td>
                            <td class="border px-4 py-2">{{ $item->kis ?? '-' }} {{ $item->kis_lainnya ? "({$item->kis_lainnya})" : '' }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Jamsostek/BPJS Ketenagakerjaan</td>
                            <td class="border px-4 py-2">{{ $item->jamsostek_bpjs_ketenagakerjaan ?? '-' }} {{ $item->jamsostek_bpjs_ketenagakerjaan_lainnya ? "({$item->jamsostek_bpjs_ketenagakerjaan_lainnya})" : '' }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Peserta Mandiri Asuransi Lain</td>
                            <td class="border px-4 py-2">{{ $item->peserta_mandiri_asuransi_lain ?? '-' }} {{ $item->peserta_mandiri_asuransi_lain_lainnya ? "({$item->peserta_mandiri_asuransi_lain_lainnya})" : '' }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Status Verifikasi</td>
                            <td class="border px-4 py-2">{{ $item->status_verifikasi ?? '-' }} {{ $item->alasan_ditolak ? "({$item->alasan_ditolak})" : '' }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Tanggal Usul</td>
                            <td class="border px-4 py-2">{{ $item->tanggal_usul ? date('d-m-Y', strtotime($item->tanggal_usul)) : '-' }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Tanggal Verifikasi</td>
                            <td class="border px-4 py-2">{{ $item->tanggal_verifikasi ? date('d-m-Y', strtotime($item->tanggal_verifikasi)) : '-' }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Tanggal Penetapan</td>
                            <td class="border px-4 py-2">{{ $item->tanggal_penetapan ? date('d-m-Y', strtotime($item->tanggal_penetapan)) : '-' }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Nomor SK</td>
                            <td class="border px-4 py-2">{{ $item->sk_nomor ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Jenis Distribusi</td>
                            <td class="border px-4 py-2">{{ $item->jenis_distribusi ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Jumlah Bantuan</td>
                            <td class="border px-4 py-2">Rp {{ number_format($item->jumlah_bantuan, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Tanggal Distribusi</td>
                            <td class="border px-4 py-2">{{ $item->tanggal_distribusi ? date('d-m-Y', strtotime($item->tanggal_distribusi)) : '-' }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Bukti Distribusi</td>
                            <td class="border px-4 py-2">
                                @if($item->bukti_distribusi)
                                    <a href="{{ asset('storage/' . $item->bukti_distribusi) }}" target="_blank" class="text-blue-600 hover:underline">Lihat File</a>
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Catatan Monitoring</td>
                            <td class="border px-4 py-2">{{ $item->catatan_monitoring ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Status Transparansi</td>
                            <td class="border px-4 py-2">{{ $item->status_transparansi ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Status Aktif</td>
                            <td class="border px-4 py-2">{{ $item->is_active ? 'Aktif' : 'Tidak Aktif' }}</td>
                        </tr>
                    </tbody>
                </table>

                <div class="mt-4">
                    <a href="{{ route('bantuan-sosial.edit', $item->id) }}"
                       class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">
                        Edit Data
                    </a>
                    <a href="{{ route('bantuan-sosial.index') }}"
                       class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded ml-2">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>