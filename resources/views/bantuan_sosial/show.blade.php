<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Bantuan Sosial') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Detail dalam tabel -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="table-auto w-full border">
                    <tbody>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Petugas Penanganan</td>
                            <td class="border px-4 py-2">{{ $item->petugas->nama_lengkap ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">NIK Penerima</td>
                            <td class="border px-4 py-2">{{ $item->nik_manual ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Nama Penerima</td>
                            <td class="border px-4 py-2">{{ $item->nama_lengkap ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">KKS/KPS</td>
                            <td class="border px-4 py-2">{{ $item->kks_kps ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">PKH</td>
                            <td class="border px-4 py-2">{{ $item->pkh ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Raskin/BPNT</td>
                            <td class="border px-4 py-2">{{ $item->raskin_bpnt ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">KIP</td>
                            <td class="border px-4 py-2">{{ $item->kip ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">KIS</td>
                            <td class="border px-4 py-2">{{ $item->kis ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Jamsostek/BPJS Ketenagakerjaan</td>
                            <td class="border px-4 py-2">{{ $item->jamsostek_bpjs_ketenagakerjaan ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Asuransi Lain</td>
                            <td class="border px-4 py-2">{{ $item->peserta_mandiri_asuransi_lain ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Verifikasi Identitas</td>
                            <td class="border px-4 py-2">{{ $item->verifikasi_identitas ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Data Lintas Sektor</td>
                            <td class="border px-4 py-2">{{ $item->data_lintas_sektor ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Konfirmasi Kepala Desa</td>
                            <td class="border px-4 py-2">{{ $item->konfirmasi_kepala_desa ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Status Verifikasi</td>
                            <td class="border px-4 py-2">{{ $item->status_verifikasi ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Alasan Ditolak</td>
                            <td class="border px-4 py-2">{{ $item->alasan_ditolak ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Jenis Distribusi</td>
                            <td class="border px-4 py-2">{{ $item->jenis_distribusi ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Jumlah Bantuan</td>
                            <td class="border px-4 py-2">Rp {{ number_format($item->jumlah_bantuan ?? 0, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Tanggal Distribusi</td>
                            <td class="border px-4 py-2">{{ $item->tanggal_distribusi ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Bukti Distribusi</td>
                            <td class="border px-4 py-2">{{ $item->bukti_distribusi ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Status Program</td>
                            <td class="border px-4 py-2">{{ $item->status_program ?? '-' }}</td>
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