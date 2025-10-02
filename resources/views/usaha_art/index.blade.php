<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Usaha ART') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 p-4 rounded-md bg-green-100 text-green-800">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 space-y-6">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                        <form action="{{ route('usaha_art.index') }}" method="GET" class="flex gap-2 w-full md:w-1/2">
                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="🔍 Cari berdasarkan nama user atau lapangan usaha..."
                                class="flex-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Cari</button>
                        </form>
                        <div class="flex items-center gap-3">
                            <a href="{{ route('usaha_art.export.pdf') }}"
                               class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                                Export PDF
                            </a>
                            <a href="{{ route('usaha_art.create') }}"
                               class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                                + Tambah Usaha
                            </a>
                        </div>
                    </div>

                    <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-sm">
                        <table class="min-w-full text-sm text-left border-collapse">
                            <thead class="bg-gray-50 text-gray-700">
                                <tr>
                                    <th class="px-4 py-3 border">#</th>
                                    <th class="px-4 py-3 border">User</th>
                                    <th class="px-4 py-3 border">Lapangan Usaha</th>
                                    <th class="px-4 py-3 border">Omset/Bulan</th>
                                    <th class="px-4 py-3 border">Pendapatan/Bulan</th>
                                    <th class="px-4 py-3 border">Jumlah Pekerja</th>
                                    <th class="px-4 py-3 border">Status Kerja</th>
                                    <th class="px-4 py-3 border">Status Verifikasi</th>
                                    <th class="px-4 py-3 border text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($usaha as $item)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-3 py-2 border">{{ $loop->iteration + ($usaha->currentPage() - 1) * $usaha->perPage() }}</td>
                                        <td class="px-4 py-2 border">{{ $item->user->name ?? '-' }}</td>
                                        <td class="px-4 py-2 border">{{ $item->lapangan_usaha }}</td>
                                        <td class="px-4 py-2 border">{{ $item->omset_usaha_bulan }}</td>
                                        <td class="px-4 py-2 border">{{ $item->pendapatan_per_bulan }}</td>
                                        <td class="px-4 py-2 border">{{ $item->jumlah_pekerja }}</td>
                                        <td class="px-4 py-2 border">{{ $item->status_kedudukan_kerja }}</td>
                                        <td class="px-4 py-2 border">
                                            <span class="px-2 py-1 rounded text-xs
                                                {{ $item->status_verifikasi == 'verified' ? 'bg-green-100 text-green-800' : 
                                                   ($item->status_verifikasi == 'rejected' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                                                {{ $item->status_verifikasi }}
                                            </span>
                                        </td>
                                        <td class="px-3 py-2 border text-center">
                                            <div class="flex justify-center gap-2">
                                                <a href="{{ route('usaha_art.show', $item->id) }}"
                                                   class="px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">Lihat</a>
                                                <a href="{{ route('usaha_art.edit', $item->id) }}"
                                                   class="px-2 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</a>
                                                <form action="{{ route('usaha_art.destroy', $item->id) }}" method="POST" class="inline"
                                                      onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                            class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="px-4 py-6 text-center text-gray-500">Belum ada data Usaha Art.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $usaha->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>