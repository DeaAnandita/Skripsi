<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
<<<<<<< Updated upstream
            Detail Bantuan Sosial
=======
            {{ __('Detail Bantuan Sosial') }}
>>>>>>> Stashed changes
        </h2>
    </x-slot>

    <div class="py-6">
<<<<<<< Updated upstream
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
=======
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h2 class="text-2xl font-bold mb-4">DETAIL DATA BANTUAN SOSIAL</h2>

                    <table class="table-auto w-full border border-gray-300 rounded-lg">
                        <tbody class="divide-y divide-gray-200">
                            <tr>
                                <td class="p-3 font-semibold w-1/3 bg-gray-50">Petugas (ID)</td>
                                <td class="p-3">{{ $item->created_by ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-semibold bg-gray-50">NIK Manual</td>
                                <td class="p-3">{{ $item->nik_manual ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-semibold bg-gray-50">Nama Lengkap</td>
                                <td class="p-3">{{ $item->nama_lengkap ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-semibold bg-gray-50">Tanggal Survey</td>
                                <td class="p-3">{{ $item->tanggal_survey ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-semibold bg-gray-50">KKS/KPS</td>
                                <td class="p-3">{{ $item->kks_kps ?? '-' }} {{ $item->kks_kps_lainnya ? '(' . $item->kks_kps_lainnya . ')' : '' }}</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-semibold bg-gray-50">PKH</td>
                                <td class="p-3">{{ $item->pkh ?? '-' }} {{ $item->pkh_lainnya ? '(' . $item->pkh_lainnya . ')' : '' }}</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-semibold bg-gray-50">Raskin/BPNT</td>
                                <td class="p-3">{{ $item->raskin_bpnt ?? '-' }} {{ $item->raskin_bpnt_lainnya ? '(' . $item->raskin_bpnt_lainnya . ')' : '' }}</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-semibold bg-gray-50">KIP</td>
                                <td class="p-3">{{ $item->kip ?? '-' }} {{ $item->kip_lainnya ? '(' . $item->kip_lainnya . ')' : '' }}</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-semibold bg-gray-50">KIS</td>
                                <td class="p-3">{{ $item->kis ?? '-' }} {{ $item->kis_lainnya ? '(' . $item->kis_lainnya . ')' : '' }}</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-semibold bg-gray-50">BPJS Ketenagakerjaan</td>
                                <td class="p-3">{{ $item->bpjs_ketenagakerjaan ?? '-' }} {{ $item->bpjs_ketenagakerjaan_lainnya ? '(' . $item->bpjs_ketenagakerjaan_lainnya . ')' : '' }}</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-semibold bg-gray-50">Asuransi Mandiri</td>
                                <td class="p-3">{{ $item->asuransi_mandiri ?? '-' }} {{ $item->asuransi_mandiri_lainnya ? '(' . $item->asuransi_mandiri_lainnya . ')' : '' }}</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-semibold bg-gray-50">Kriteria</td>
                                <td class="p-3">
                                    @php $kriteria = json_decode($item->kriteria, true) ?? []; @endphp
                                    @if (!empty($kriteria))
                                        <ul class="list-disc pl-5">
                                            @foreach ($kriteria as $krit)
                                                <li>{{ $krit }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        -
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="p-3 font-semibold bg-gray-50">Tanggal Penerimaan</td>
                                <td class="p-3">{{ $item->tanggal_penerimaan ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-semibold bg-gray-50">Tanggal Distribusi</td>
                                <td class="p-3">{{ $item->tanggal_distribusi ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-semibold bg-gray-50">Bukti Lampiran</td>
                                <td class="p-3">
                                    @if ($item->bukti_lampiran)
                                        <a href="{{ asset('storage/' . $item->bukti_lampiran) }}" target="_blank" class="text-blue-600 underline">{{ basename($item->bukti_lampiran) }}</a>
                                    @else
                                        -
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="mt-6 flex gap-3">
                        <a href="{{ route('bantuan-sosial.index') }}" class="bg-gray-500 text-white font-bold py-2 px-4 rounded hover:bg-gray-600">Kembali</a>
                        <a href="{{ route('bantuan-sosial.edit', $item->id) }}" class="bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">Edit</a>
                    </div>
>>>>>>> Stashed changes
                </div>
            </div>
        </div>
    </div>
<<<<<<< Updated upstream
</x-app-layout>
=======
</xaiArtifact>
>>>>>>> Stashed changes
