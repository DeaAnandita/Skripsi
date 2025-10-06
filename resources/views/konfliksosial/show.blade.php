<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Konflik Sosial') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Detail dalam tabel --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="table-auto w-full border">
                    <tbody>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Nama Kelompok</td>
                            <td class="border px-4 py-2">{{ $item->nama_kelompok }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Jumlah Anggota</td>
                            <td class="border px-4 py-2">{{ $item->jumlah_anggota }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Lokasi</td>
                            <td class="border px-4 py-2">{{ $item->lokasi }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Status Konflik Tanah</td>
                            <td class="border px-4 py-2">{{ $item->konflik_tanah }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Status Konflik Pemukiman</td>
                            <td class="border px-4 py-2">{{ $item->konflik_pemukiman }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Status Konflik Ekonomi</td>
                            <td class="border px-4 py-2">{{ $item->konflik_ekonomi }}</td>
                        </tr>
                    </tbody>
                </table>

                <div class="mt-4">
                    <a href="{{ route('konflik-sosial.edit', $item->id) }}"
                       class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">
                        Edit Data
                    </a>
                    <a href="{{ route('konflik-sosial.index') }}"
                       class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded ml-2">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>