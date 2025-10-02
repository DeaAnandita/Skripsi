<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Anggota Keluarga') }}
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

                    {{-- Header bar: search + add --}}
                    <div class="flex justify-between items-center">
                        <form action="{{ route('anggota-keluarga.index') }}" method="GET" class="flex gap-2">
                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="🔍 Cari berdasarkan nama/NIK…"
                                class="px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Cari</button>
                        </form>

                        <a href="{{ route('anggota-keluarga.create') }}"
                           class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                            + Tambah Anggota
                        </a>
                    </div>

                    {{-- Table --}}
                    <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-sm">
                        <table class="min-w-full text-sm text-left border-collapse">
                            <thead class="bg-gray-50 text-gray-700">
                                <tr>
                                    <th class="px-3 py-2 border">No</th>
                                    <th class="px-3 py-2 border">NIK</th>
                                    <th class="px-3 py-2 border">Nama Lengkap</th>
                                    <th class="px-3 py-2 border">Tanggal Lahir</th>
                                    <th class="px-3 py-2 border">Jenis Kelamin</th>
                                    <th class="px-3 py-2 border">Hubungan Keluarga</th>
                                    <th class="px-3 py-2 border">Status Perkawinan</th>
                                    <th class="px-3 py-2 border text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($anggotas as $anggota)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-3 py-2 border">{{ $loop->iteration + ($anggotas->currentPage()-1)*$anggotas->perPage() }}</td>
                                        <td class="px-3 py-2 border">{{ $anggota->nik }}</td>
                                        <td class="px-3 py-2 border">{{ $anggota->nama_lengkap }}</td>
                                        <td class="px-3 py-2 border">{{ $anggota->tanggal_lahir }}</td>
                                        <td class="px-3 py-2 border">{{ $anggota->jenis_kelamin }}</td>
                                        <td class="px-3 py-2 border">{{ $anggota->hubungan_keluarga }}</td>
                                        <td class="px-3 py-2 border">{{ $anggota->status_perkawinan }}</td>
                                        <td class="px-3 py-2 border text-center">
                                            <div class="flex items-center justify-center gap-3">
                                                <a href="{{ route('anggota-keluarga.show', $anggota->id) }}" class="text-blue-600 hover:text-blue-800 text-xs font-medium">Lihat</a>
                                                <a href="{{ route('anggota-keluarga.edit', $anggota->id) }}" class="text-yellow-600 hover:text-yellow-800 text-xs font-medium">Edit</a>
                                                <form action="{{ route('anggota-keluarga.destroy', $anggota->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus anggota ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-800 text-xs font-medium">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="13" class="px-4 py-6 text-center text-gray-500">Belum ada data anggota keluarga.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination --}}
                    <div class="mt-4">
                        {{ $anggotas->appends(['search' => request('search')])->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
