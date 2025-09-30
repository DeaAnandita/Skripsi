<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Surat') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 p-4 rounded-md bg-green-100 text-green-800">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 space-y-6">
                    {{-- Header & tombol --}}
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold">Daftar Surat</h3>
                        <a href="{{ route('surats.create') }}"
                           class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                            + Buat Surat
                        </a>
                    </div>

                    {{-- Tabel --}}
                    <div class="overflow-x-auto">
                        <table class="w-full border border-gray-300 text-sm">
                            <thead class="bg-gray-50 text-xs">
                                <tr>
                                    <th class="border border-gray-300 px-2 py-2">#</th>
                                    <th class="border border-gray-300 px-2 py-2">Nomor Surat</th>
                                    <th class="border border-gray-300 px-2 py-2">Jenis Surat</th>
                                    <th class="border border-gray-300 px-2 py-2">Nama</th>
                                    <th class="border border-gray-300 px-2 py-2">NIK</th>
                                    <th class="border border-gray-300 px-2 py-2">Alamat</th>
                                    <th class="border border-gray-300 px-2 py-2">Keperluan</th>
                                    <th class="border border-gray-300 px-2 py-2">QR Code</th>
                                    <th class="border border-gray-300 px-2 py-2">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($surats as $surat)
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-2 py-1">{{ $loop->iteration }}</td>
                                        <td class="border border-gray-300 px-2 py-1">{{ $surat->nomor_surat }}</td>
                                        <td class="border border-gray-300 px-2 py-1">{{ $surat->jenisSurat->nama_jenis ?? '-' }}</td>
                                        <td class="border border-gray-300 px-2 py-1">{{ $surat->nama }}</td>
                                        <td class="border border-gray-300 px-2 py-1">{{ $surat->nik }}</td>
                                        <td class="border border-gray-300 px-2 py-1">{{ $surat->alamat }}</td>
                                        <td class="border border-gray-300 px-2 py-1">{{ $surat->keperluan }}</td>
                                        <td class="border border-gray-300 px-2 py-1">
                                            @if($surat->barcode_download)
                                                <img src="{{ asset('storage/barcodes/' . $surat->barcode_download) }}" 
                                                     alt="QR Code" class="h-10">
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td class="border border-gray-300 px-2 py-1 flex gap-2">
                                            <a href="{{ route('surats.show', $surat->id) }}" 
                                               class="text-blue-600 hover:text-blue-800 text-xs">
                                               Lihat
                                            </a>
                                            <a href="{{ route('surats.edit', $surat->id) }}" 
                                               class="text-yellow-600 hover:text-yellow-800 text-xs">
                                               Edit
                                            </a>
                                            <form action="{{ route('surats.destroy', $surat->id) }}" method="POST" 
                                                  onsubmit="return confirm('Yakin ingin hapus surat ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="text-red-600 hover:text-red-800 text-xs">
                                                        Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="border border-gray-300 px-4 py-6 text-center text-gray-500">
                                            Belum ada data surat.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination --}}
                    <div>
                        {{ $surats->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
