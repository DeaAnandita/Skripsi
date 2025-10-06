<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Dasar Keluarga') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h2 class="text-2xl font-bold mb-4">DETAIL DATA DASAR KELUARGA</h2>

                    <table class="table-auto w-full border border-gray-300 rounded-lg">
                        <tbody class="divide-y divide-gray-200">
                            <tr>
                                <td class="p-3 font-semibold w-1/3 bg-gray-50">Surveyor</td>
                                <td class="p-3">{{ $item->user->name ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-semibold bg-gray-50">Nomor KK</td>
                                <td class="p-3">{{ $item->no_kk }}</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-semibold bg-gray-50">Kepala Rumah Tangga</td>
                                <td class="p-3">{{ $item->kepala_rumah_tangga }}</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-semibold bg-gray-50">Dusun</td>
                                <td class="p-3">{{ $item->dusun }}</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-semibold bg-gray-50">RT / RW</td>
                                <td class="p-3">{{ $item->rt }} / {{ $item->rw }}</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-semibold bg-gray-50">Alamat Lengkap</td>
                                <td class="p-3">{{ $item->alamat_lengkap }}</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-semibold bg-gray-50">Jenis Mutasi</td>
                                <td class="p-3">{{ $item->jenis_mutasi }}</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-semibold bg-gray-50">Tanggal Mutasi</td>
                                <td class="p-3">{{ $item->tanggal_mutasi }}</td>
                            </tr>

                            @if($item->jenis_mutasi == 'Datang')
                                <tr>
                                    <td class="p-3 font-semibold bg-gray-50">Wilayah Datang</td>
                                    <td class="p-3">
                                        <div>Provinsi: {{ $item->provinsi }}</div>
                                        <div>Kabupaten: {{ $item->kabupaten }}</div>
                                        <div>Kecamatan: {{ $item->kecamatan }}</div>
                                        <div>Desa/Kelurahan: {{ $item->desa }}</div>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>

                    <div class="mt-6 flex gap-3">
                        <a href="{{ route('dasar-keluarga.index') }}" class="bg-gray-500 text-white font-bold py-2 px-4 rounded hover:bg-gray-600">Kembali</a>
                        <a href="{{ route('dasar-keluarga.edit', $item->id) }}" class="bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
