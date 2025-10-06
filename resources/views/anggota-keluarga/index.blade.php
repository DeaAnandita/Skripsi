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

            {{-- Header bar: search + export + add --}}
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                        <form action="{{ route('anggota-keluarga.index') }}" method="GET" class="flex gap-2 w-full md:w-1/2">
                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="🔍 Cari berdasarkan nama/nik"
                                class="flex-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Cari</button>

                        <a href="{{ route('anggota-keluarga.create') }}"
                           class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                            + Tambah Anggota
                        </a>
                    </form>

                        <div class="flex items-center gap-3">
                            <div x-data="{ open:false }" class="relative">
                                <button @click="open = !open"
                                    class="flex items-center gap-2 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                                    <span>Export</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                <div x-show="open" @click.away="open=false" x-transition
                                     class="absolute right-0 mt-2 w-48 bg-white border rounded-lg shadow z-30">
                                    <a href="{{ route('anggota-keluarga.export.csv') }}" class="block px-4 py-2 hover:bg-gray-50">📄 Export CSV</a>
                                    <a href="{{ route('anggota-keluarga.export.pdf') }}" class="block px-4 py-2 hover:bg-gray-50">🖨 Export PDF</a>
                                </div>
                            </div>

                            <a href="{{ route('anggota-keluarga.create') }}"
                               class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                                + Tambah Anggota
                            </a>
                        </div>
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
