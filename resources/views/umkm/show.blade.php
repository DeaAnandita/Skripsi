<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Data UMKM') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h2 class="text-2xl font-bold mb-4">DETAIL DATA UMKM</h2>

                    <table class="table-auto w-full border border-gray-300 rounded-lg">
                        <tbody class="divide-y divide-gray-200">
                            <tr>
                                <td class="p-3 font-semibold w-1/3 bg-gray-50">Surveyor</td>
                                <td class="p-3">{{ $item->user->name ?? auth()->user()->name }}</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-semibold bg-gray-50">Koperasi</td>
                                <td class="p-3">{{ $item->Koperasi ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-semibold bg-gray-50">Unit Usaha Simpan Pinjam</td>
                                <td class="p-3">{{ $item->Unit_Usaha_Simpan_Pinjam ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-semibold bg-gray-50">Industri Kerajinan Tangan</td>
                                <td class="p-3">{{ $item->Industri_Kerajinan_Tangan ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-semibold bg-gray-50">Industri Pakaian</td>
                                <td class="p-3">{{ $item->Industri_Pakaian ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-semibold bg-gray-50">Industri Usaha Makanan</td>
                                <td class="p-3">{{ $item->Industri_Usaha_Makanan ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-semibold bg-gray-50">Industri Alat Rumah Tangga</td>
                                <td class="p-3">{{ $item->Industri_Alat_Rumah_Tangga ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-semibold bg-gray-50">Industri Usaha Bahan Bangunan</td>
                                <td class="p-3">{{ $item->Industri_Usaha_Bahan_Bangunan ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-semibold bg-gray-50">Industri Alat Pertanian</td>
                                <td class="p-3">{{ $item->Industri_Alat_Pertanian ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-semibold bg-gray-50">Restoran</td>
                                <td class="p-3">{{ $item->Restoran ?? '-' }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="mt-6 flex gap-3">
                        <a href="{{ route('umkm.index') }}" class="bg-gray-500 text-white font-bold py-2 px-4 rounded hover:bg-gray-600">Kembali</a>
                        <a href="{{ route('umkm.edit', $item->id) }}" class="bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>