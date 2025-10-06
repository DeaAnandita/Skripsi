<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Data Layanan Masyarakat') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h2 class="text-2xl font-bold mb-4">DETAIL DATA Layanan Masyarakat</h2>

                    <table class="table-auto w-full border border-gray-300 rounded-lg">
                        <tbody class="divide-y divide-gray-200">
                            <tr>
                                <td class="p-3 font-semibold w-1/3 bg-gray-50">Surveyor</td>
                                <td class="p-3">{{ $item->user->name ?? auth()->user()->name }}</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-semibold bg-gray-50">Pengurus RT</td>
                                <td class="p-3">{{ $item->Pengurus_RT ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-semibold bg-gray-50">Anggota Pengurus RT</td>
                                <td class="p-3">{{ $item->Anggota_Pengurus_RT ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-semibold bg-gray-50">Pengurus RW</td>
                                <td class="p-3">{{ $item->Pengurus_RW ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-semibold bg-gray-50">Anggota Pengurus RW</td>
                                <td class="p-3">{{ $item->Anggota_Pengurus_RW ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-semibold bg-gray-50">Pengurus LKMD/K/LPM</td>
                                <td class="p-3">{{ $item->Pengurus_LKMD_K_LPM ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-semibold bg-gray-50">Anggota LKMD/K/LPM</td>
                                <td class="p-3">{{ $item->Anggota_LKMD_K_LPM ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-semibold bg-gray-50">Pengurus PKK</td>
                                <td class="p-3">{{ $item->Pengurus_PKK ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-semibold bg-gray-50">Anggota PKK</td>
                                <td class="p-3">{{ $item->Anggota_PKK ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-semibold bg-gray-50">Pengurus Lembaga Adat</td>
                                <td class="p-3">{{ $item->Pengurus_Lembaga_Adat ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-semibold bg-gray-50">Anggota Lembaga Adat</td>
                                <td class="p-3">{{ $item->Anggota_Lembaga_Adat ?? '-' }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="mt-6 flex gap-3">
                        <a href="{{ route('layanan-masyarakat.index') }}" class="bg-gray-500 text-white font-bold py-2 px-4 rounded hover:bg-gray-600">Kembali</a>
                        <a href="{{ route('layanan-masyarakat.edit', $item->id) }}" class="bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>