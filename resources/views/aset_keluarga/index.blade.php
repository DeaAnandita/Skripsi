<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Aset Keluarga') }}
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
                <div class="p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold">Daftar Aset Keluarga</h3>
                        <a href="{{ route('aset-keluarga.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                            + Tambah Aset
                        </a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full border border-gray-300 text-sm">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="border border-gray-300 px-2 py-2">#</th>
                                    <th class="border border-gray-300 px-2 py-2">User</th>
                                    <th class="border border-gray-300 px-2 py-2">Nama Aset</th>
                                    <th class="border border-gray-300 px-2 py-2">Kategori</th>
                                    <th class="border border-gray-300 px-2 py-2">Nilai</th>
                                    <th class="border border-gray-300 px-2 py-2">Tahun</th>
                                    <th class="border border-gray-300 px-2 py-2">Status</th>
                                    <th class="border border-gray-300 px-2 py-2">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($aset as $item)
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-2 py-1">{{ $loop->iteration }}</td>
                                        <td class="border border-gray-300 px-2 py-1">{{ $item->user->name ?? '-' }}</td>
                                        <td class="border border-gray-300 px-2 py-1">{{ $item->nama_aset }}</td>
                                        <td class="border border-gray-300 px-2 py-1">{{ $item->kategori }}</td>
                                        <td class="border border-gray-300 px-2 py-1">{{ $item->nilai_aset ? 'Rp '.number_format($item->nilai_aset,0,',','.') : '-' }}</td>
                                        <td class="border border-gray-300 px-2 py-1">{{ $item->tahun_perolehan ?? '-' }}</td>
                                        <td class="border border-gray-300 px-2 py-1">{{ $item->status_aset }}</td>
                                        <td class="border border-gray-300 px-2 py-1 flex items-center gap-2 justify-center">
                                            <a href="{{ route('aset-keluarga.show', $item->id) }}" class="text-blue-600 hover:text-blue-800 text-xs">Lihat</a>
                                            <a href="{{ route('aset-keluarga.edit', $item->id) }}" class="text-yellow-600 hover:text-yellow-800 text-xs">Edit</a>
                                            <form action="{{ route('aset-keluarga.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus aset ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-800 text-xs">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="border border-gray-300 px-4 py-6 text-center text-gray-500">Belum ada data aset keluarga.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div> {{-- overflow-x-auto --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
