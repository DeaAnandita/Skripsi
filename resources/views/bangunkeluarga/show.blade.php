<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-indigo-800 leading-tight flex items-center gap-2">
            👨‍👩‍👧 {{ __('Detail BangunKeluarga') }}
        </h2>
    </x-slot>

    <div class="py-6 bg-gradient-to-b from-indigo-50 to-white min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            {{-- Card --}}
            <div class="bg-white overflow-hidden shadow-xl rounded-2xl border border-indigo-100">
                <div class="p-6 space-y-6">

                    {{-- Header keluarga --}}
                    <div class="flex items-center gap-4">
                        <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center text-3xl">
                            🏡
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-indigo-700">
                                {{ $item->nama_kepala_keluarga }}
                            </h3>
                            <p class="text-gray-600">Kepala Keluarga</p>
                        </div>
                    </div>

                    {{-- Tabel detail --}}
                    <div class="overflow-x-auto">
                        <table class="w-full border border-gray-200 rounded-lg">
                            <tbody class="divide-y divide-gray-100">
                                <tr>
                                    <td class="px-4 py-3 font-semibold text-gray-700 bg-indigo-50 w-1/3">👥 Jumlah Anggota</td>
                                    <td class="px-4 py-3">{{ $item->jumlah_anggota }} orang</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3 font-semibold text-gray-700 bg-indigo-50">📍 Alamat</td>
                                    <td class="px-4 py-3">{{ $item->alamat }}</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3 font-semibold text-gray-700 bg-indigo-50">📐 Luas Tanah</td>
                                    <td class="px-4 py-3">{{ $item->luas_tanah }} m²</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3 font-semibold text-gray-700 bg-indigo-50">🏠 Jenis Rumah</td>
                                    <td class="px-4 py-3">{{ $item->jenis_rumah }}</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3 font-semibold text-gray-700 bg-indigo-50">💧 Sumber Air</td>
                                    <td class="px-4 py-3">{{ $item->sumber_air }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    {{-- Action button --}}
                    <div class="flex gap-3 mt-6">
                        <a href="{{ route('aset-keluarga.edit', $item->id) }}"
                           class="flex items-center gap-2 bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg transition">
                            ✏️ Edit Data
                        </a>
                        <a href="{{ route('aset-keluarga.index') }}"
                           class="flex items-center gap-2 bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition">
                            ⬅️ Kembali
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
