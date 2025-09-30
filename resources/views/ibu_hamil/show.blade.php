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
                            <td class="border px-4 py-2 font-semibold">Nama Ibu Hamil</td>
                            <td class="border px-4 py-2">{{ $item->nama_ibu_hamil }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">NIK</td>
                            <td class="border px-4 py-2">{{ $item->nik }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Alamat</td>
                            <td class="border px-4 py-2">{{ $item->alamat }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">NO.HP</td>
                            <td class="border px-4 py-2">{{ $item->no_hp }} m²</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Status Ibu Hamil</td>
                            <td class="border px-4 py-2">{{ $item->status_ibu_hamil }}</td>
                        </tr>
                    </tbody>
                </table>

                <div class="mt-4">
                    <a href="{{ route('ibu-hamil'.edit', $item->id) }}"
                       class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">
                        Edit Data
                    </a>
                    <a href="{{ route('ibu-hamil.index') }}"
                       class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded ml-2">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
