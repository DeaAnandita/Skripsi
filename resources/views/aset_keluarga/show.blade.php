<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail Aset Keluarga
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Detail dalam tabel --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="table-auto w-full border">
                    <tbody>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Nama Kepala Keluarga</td>
                            <td class="border px-4 py-2">{{ $item->nama_kepala_keluarga }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Jumlah Anggota</td>
                            <td class="border px-4 py-2">{{ $item->jumlah_anggota }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Alamat</td>
                            <td class="border px-4 py-2">{{ $item->alamat }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Luas Tanah</td>
                            <td class="border px-4 py-2">{{ $item->luas_tanah }} m²</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Jenis Rumah</td>
                            <td class="border px-4 py-2">{{ $item->jenis_rumah }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Sumber Air</td>
                            <td class="border px-4 py-2">{{ $item->sumber_air }}</td>
                        </tr>
                    </tbody>
                </table>

                <div class="mt-4">
                    <a href="{{ route('aset-keluarga.edit', $item->id) }}"
                       class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">
                        Edit Data
                    </a>
                    <a href="{{ route('aset-keluarga.index') }}"
                       class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded ml-2">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
