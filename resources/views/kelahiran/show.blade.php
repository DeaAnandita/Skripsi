<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Kelahiran') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Detail dalam tabel -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="table-auto w-full border">
                    <tbody>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">NIK</td>
                            <td class="border px-4 py-2">{{ $item->nik ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Nama Lengkap</td>
                            <td class="border px-4 py-2">{{ $item->nama_lengkap ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Tempat Lahir</td>
                            <td class="border px-4 py-2">{{ $item->tempat_lahir ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Tanggal Lahir</td>
                            <td class="border px-4 py-2">{{ $item->tanggal_lahir ? \Carbon\Carbon::parse($item->tanggal_lahir)->format('d/m/Y') : '-' }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Jenis Kelamin</td>
                            <td class="border px-4 py-2">{{ $item->jenis_kelamin ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Akta Kelahiran</td>
                            <td class="border px-4 py-2">{{ $item->akta_kelahiran ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="p-3 font-semibold w-1/3 bg-gray-50">Surveyor</td>
                            <td class="p-3">{{ $item->user->name ?? '-' }}</td>
                        </tr>
                    </tbody>
                </table>

                <div class="mt-4 flex gap-2">
                    <a href="{{ route('kelahiran.edit', $item->id_kelahiran) }}"
                       class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">
                        Edit Data
                    </a>
                    <a href="{{ route('kelahiran.index') }}"
                       class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>