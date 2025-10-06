<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Lembaga Desa') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h2 class="text-2xl font-bold mb-4">DETAIL DATA LEMBAGA DESA</h2>

                    <table class="table-auto w-full border border-gray-300 rounded-lg">
                        <tbody class="divide-y divide-gray-200">
                            <tr>
                                <td class="p-3 font-semibold w-1/3 bg-gray-50">Jenis Lembaga</td>
                                <td class="p-3">{{ $item->nama_lembaga ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-semibold bg-gray-50">Dusun</td>
                                <td class="p-3">{{ $item->dusun ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-semibold bg-gray-50">Kepala Desa</td>
                                <td class="p-3">
                                    @php
                                        $struktur = $item->struktur_jabatan ? json_decode($item->struktur_jabatan, true) : [];
                                        $status = isset($struktur['Kepala Desa']) ? ($struktur['Kepala Desa'] > 0 ? 'Ya' : 'Tidak') : 'Lainnya';
                                    @endphp
                                    {{ $status }}
                                </td>
                            </tr>
                            <tr>
                                <td class="p-3 font-semibold bg-gray-50">Sekretaris Desa</td>
                                <td class="p-3">
                                    @php
                                        $status = isset($struktur['Sekretaris Desa']) ? ($struktur['Sekretaris Desa'] > 0 ? 'Ya' : 'Tidak') : 'Lainnya';
                                    @endphp
                                    {{ $status }}
                                </td>
                            </tr>
                            <tr>
                                <td class="p-3 font-semibold bg-gray-50">Kaur Keuangan</td>
                                <td class="p-3">
                                    @php
                                        $status = isset($struktur['Kaur Keuangan']) ? ($struktur['Kaur Keuangan'] > 0 ? 'Ya' : 'Tidak') : 'Lainnya';
                                    @endphp
                                    {{ $status }}
                                </td>
                            </tr>
                            <tr>
                                <td class="p-3 font-semibold bg-gray-50">Kepala Dusun</td>
                                <td class="p-3">
                                    @php
                                        $status = isset($struktur['Kepala Dusun']) ? ($struktur['Kepala Dusun'] > 0 ? 'Ya' : 'Tidak') : 'Lainnya';
                                    @endphp
                                    {{ $status }}
                                </td>
                            </tr>
                            <tr>
                                <td class="p-3 font-semibold bg-gray-50">Ketua BPD</td>
                                <td class="p-3">
                                    @php
                                        $status = isset($struktur['Ketua BPD']) ? ($struktur['Ketua BPD'] > 0 ? 'Ya' : 'Tidak') : 'Lainnya';
                                    @endphp
                                    {{ $status }}
                                </td>
                            </tr>
                            <tr>
                                <td class="p-3 font-semibold bg-gray-50">Keterangan</td>
                                <td class="p-3">{{ $item->keterangan ?? '-' }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="mt-6 flex gap-3">
                        <a href="{{ route('lembaga-desa.index') }}" class="bg-gray-500 text-white font-bold py-2 px-4 rounded hover:bg-gray-600">Kembali</a>
                        <a href="{{ route('lembaga-desa.edit', $item->id_lembaga) }}" class="bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>