<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail Kualitas Bayi
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Detail dalam tabel --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="table-auto w-full border">
                    <tbody>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Nama Ibu</td>
                            <td class="border px-4 py-2">{{ $item->nama_ibu }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Nama Bayi</td>
                            <td class="border px-4 py-2">{{ $item->nama_bayi }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Tanggal Lahir</td>
                            <td class="border px-4 py-2">{{ $item->tgl_lahir }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Jenis Kelamin</td>
                            <td class="border px-4 py-2">{{ $item->jenis_kelamin }} m²</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Berat Badan</td>
                            <td class="border px-4 py-2">{{ $item->berat_badan }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Tinggi Badan</td>
                            <td class="border px-4 py-2">{{ $item->tinggi_badan }}</td>
                        </tr>
                    </tbody>
                </table>

                <div class="mt-4">
                    <a href="{{ route('bayi.edit', $item->id) }}"
                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">
                        Edit Data
                    </a>
                    <a href="{{ route('bayi.index') }}"
                    class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded ml-2">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
