<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Anggota Keluarga') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Detail dalam tabel --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="table-auto w-full border">
                    <tbody>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Nomor KK</td>
                            <td class="border px-4 py-2">{{ $item->keluarga->nomor_kk ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Nama Kepala Keluarga</td>
                            <td class="border px-4 py-2">{{ $item->keluarga->nama_kepala_keluarga ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">NIK</td>
                            <td class="border px-4 py-2">{{ $item->nik }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Nama Lengkap</td>
                            <td class="border px-4 py-2">{{ $item->nama_lengkap }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Tanggal Lahir</td>
                            <td class="border px-4 py-2">
                                {{ \Carbon\Carbon::parse($item->tanggal_lahir)->format('d-m-Y') }}
                            </td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Jenis Kelamin</td>
                            <td class="border px-4 py-2">{{ ucfirst($item->jenis_kelamin) }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Hubungan Keluarga</td>
                            <td class="border px-4 py-2">{{ ucfirst($item->hubungan_keluarga) }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Status Perkawinan</td>
                             <td class="border px-4 py-2">{{ ucfirst($item->status_perkawinan) }}</td>
                        </tr>
                    </tbody>
                </table>

                <div class="mt-4">
                    <a href="{{ route('anggota-keluarga.edit', $item->id) }}"
                       class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">
                        Edit Data
                    </a>
                    <a href="{{ route('anggota-keluarga.index') }}"
                       class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded ml-2">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
