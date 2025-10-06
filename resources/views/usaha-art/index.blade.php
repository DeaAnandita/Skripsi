<x-app-layout>
    

    <div class="py-6" x-data="{
        showMutasi: false,
        showTanggal: false,
        applyFilter(url) { window.location.href = url },
    }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Alert -->
            @if(session('success'))
                <div class="mb-4 p-4 rounded-md bg-green-100 text-green-800">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Header -->
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold text-gray-800">Kelola Usaha ART</h2>
                <form action="{{ route('usaha-art.index') }}" method="GET" class="flex gap-2 w-full md:w-1/2">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="🔍 Cari berdasarkan nama user atau lapangan usaha..."
                           class="flex-1 px-4 py-2 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Cari</button>
                </form>
                <div class="flex items-center gap-2">
                    <a href="{{ route('usaha-art.index') }}"
                       class="px-3 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 text-sm">
                        Reset Filter
                    </a>
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
                                    <a href="{{ route('usaha-art.export.csv') }}" class="block px-4 py-2 hover:bg-gray-50">📄 Export CSV</a>
                                    <a href="{{ route('usaha-art.export.pdf') }}" class="block px-4 py-2 hover:bg-gray-50">🖨 Export PDF</a>
                                </div>
                            </div>
                            </div>
                        </div>
                            
                    <a href="{{ route('usaha-art.create') }}"
                       class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                        + Tambah Usaha
                    </a>
                </div>
            </div>

            <!-- Table -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm border-collapse">
                        <thead class="bg-gray-100 text-gray-700 relative">
                            <tr>
                                <th class="px-3 py-2 border text-center w-10">No</th>
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
                                <tr class="hover:bg-gray-50 align-top">
                                    <td class="px-3 py-2 border text-center">
                                        {{ $loop->iteration + ($usaha->currentPage() - 1) * $usaha->perPage() }}
                                    </td>
                                    <td class="px-4 py-2 border">{{ $item->user->name ?? '-' }}</td>
                                    <td class="px-4 py-2 border">{{ $item->lapangan_usaha }}</td>
                                    <td class="px-4 py-2 border">{{ $item->omset_usaha_bulan ?? '-' }}</td>
                                    <td class="px-4 py-2 border">{{ $item->pendapatan_per_bulan ?? '-' }}</td>
                                    <td class="px-4 py-2 border">{{ $item->jumlah_pekerja ?? '-' }}</td>
                                    <td class="px-4 py-2 border">{{ $item->status_kedudukan_kerja ?? '-' }}</td>
                                    <td class="px-4 py-2 border">
                                        <span class="px-2 py-1 rounded text-xs
                                            {{ $item->status_verifikasi == 'verified' ? 'bg-green-100 text-green-800' :
                                               ($item->status_verifikasi == 'rejected' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                                            {{ $item->status_verifikasi ?? '-' }}
                                        </span>
                                    </td>
                                    <td class="px-3 py-2 border text-center">
                                        <div class="flex items-center justify-center gap-2">
                                            <a href="{{ route('usaha-art.show', $item->id) }}"
                                               class="text-blue-600 hover:text-blue-800 text-xs font-medium">Lihat</a>
                                            <a href="{{ route('usaha-art.edit', $item->id) }}"
                                               class="text-yellow-600 hover:text-yellow-800 text-xs font-medium">Edit</a>
                                            <form action="{{ route('usaha-art.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-800 text-xs font-medium">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="px-4 py-6 text-center text-gray-500">
                                        Belum ada data Usaha Art.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="p-4">
                    {{ $usaha->appends(request()->all())->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>