<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Usaha ART') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h2 class="text-2xl font-bold mb-4">DETAIL DATA USAHA ART</h2>

                    <table class="table-auto w-full border border-gray-300 rounded-lg">
                        <tbody class="divide-y divide-gray-200">
                            <tr>
                                <td class="p-3 font-semibold w-1/3 bg-gray-50">Surveyor</td>
                                <td class="p-3">{{ $item->user->name ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-semibold bg-gray-50">Lapangan Usaha</td>
                                <td class="p-3">{{ $item->lapangan_usaha }}</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-semibold bg-gray-50">Omset Usaha/Bulan</td>
                                <td class="p-3">{{ $item->omset_usaha_bulan ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-semibold bg-gray-50">Pendapatan per Bulan</td>
                                <td class="p-3">{{ $item->pendapatan_per_bulan ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-semibold bg-gray-50">Jumlah Pekerja</td>
                                <td class="p-3">{{ $item->jumlah_pekerja ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-semibold bg-gray-50">Status Kedudukan Kerja</td>
                                <td class="p-3">{{ $item->status_kedudukan_kerja ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-semibold bg-gray-50">Dokumen Usaha</td>
                                <td class="p-3">
                                    @if($item->dokumen_usaha)
                                        <a href="{{ Storage::url($item->dokumen_usaha) }}" target="_blank" class="text-blue-600 hover:underline">Lihat dokumen</a>
                                    @else
                                        Tidak ada dokumen
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="p-3 font-semibold bg-gray-50">Status Verifikasi</td>
                                <td class="p-3">
                                    <span class="px-2 py-1 rounded text-xs
                                        {{ $item->status_verifikasi == 'verified' ? 'bg-green-100 text-green-800' :
                                           ($item->status_verifikasi == 'rejected' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                                        {{ $item->status_verifikasi ?? '-' }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="p-3 font-semibold bg-gray-50">Surveyor (Tambahan)</td>
                                <td class="p-3">{{ $item->surveyor->name ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-semibold bg-gray-50">Tanggal Dibuat</td>
                                <td class="p-3">{{ $item->created_at->format('d-m-Y H:i') }}</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-semibold bg-gray-50">Tanggal Diupdate</td>
                                <td class="p-3">{{ $item->updated_at->format('d-m-Y H:i') }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="mt-6 flex gap-3">
                        <a href="{{ route('usaha-art.index') }}" class="bg-gray-500 text-white font-bold py-2 px-4 rounded hover:bg-gray-600">Kembali</a>
                        <a href="{{ route('usaha-art.edit', $item->id) }}" class="bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>