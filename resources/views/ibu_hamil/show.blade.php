<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Ibu Hamil') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h2 class="text-2xl font-bold mb-4">DETAIL DATA IBU HAMIL</h2>

                    <table class="table-auto w-full border border-gray-300 rounded-lg">
                        <tbody class="divide-y divide-gray-200">
                            <tr>
                                <td class="p-3 font-semibold w-1/3 bg-gray-50">Surveyor</td>
                                <td class="p-3">{{ $item->user->name ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-semibold bg-gray-50"> Nama</td>
                                <td class="p-3">{{ $item->nama }}</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-semibold bg-gray-50">NIK</td>
                                <td class="p-3">{{ $item->nik }}</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-semibold bg-gray-50">Alamat</td>
                                <td class="p-3">{{ $item->alamat }}</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-semibold bg-gray-50">NO.HP</td>
                                <td class="p-3">{{ $item->no_hp }}</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-semibold bg-gray-50">Status Hamil</td>
                                <td class="p-3">{{ $item->status_hamil }}</td>
                            </tr>

                            
                        </tbody>
                    </table>

                    <div class="mt-6 flex gap-3">
                        <a href="{{ route('ibu-hamil.index') }}" class="bg-gray-500 text-white font-bold py-2 px-4 rounded hover:bg-gray-600">Kembali</a>
                        <a href="{{ route('ibu-hamil.edit', $item->id) }}" class="bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
