<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail Sarana Prasarana Kerja
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Detail dalam tabel --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="table-auto w-full border">
                    <tbody>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Nama Sarana</td>
                            <td class="border px-4 py-2">{{ $item->nama_sarana }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Kategori</td>
                            <td class="border px-4 py-2">{{ $item->kategori }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Nilai Sarana</td>
                            <td class="border px-4 py-2">Rp {{ number_format($item->nilai_sarana, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Tahun Perolehan</td>
                            <td class="border px-4 py-2">{{ $item->tahun_perolehan }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Status Sarana</td>
                            <td class="border px-4 py-2">{{ $item->status_sarana }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Surveyor</td>
                            <td class="border px-4 py-2">{{ $item->user->name ?? '-' }}</td>
                        </tr>
                    </tbody>
                </table>

                <div class="mt-4">
                    <a href="{{ route('sarpras-kerja.edit', $item->id) }}"
                       class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">
                        Edit Data
                    </a>
                    <a href="{{ route('sarpras-kerja.index') }}"
                       class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded ml-2">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>