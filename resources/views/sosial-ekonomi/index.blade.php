<x-app-layout>
    <div class="py-6" x-data="{
        showMutasi: false,
        showTanggal: false,
        applyFilter(url) { window.location.href = url },
    }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Alert -->
            @if(session('success'))
                <div class="mb-4 p-4 rounded-md bg-green-100 text-green-800 text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Header -->
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4 md:mb-0">Kelola Data Sosial Ekonomi</h2>
                <div class="flex flex-col md:flex-row gap-4 w-full md:w-auto">
                    <form action="{{ route('sosial-ekonomi.index') }}" method="GET" class="flex gap-2">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="🔍 Cari berdasarkan NIK..."
                               class="flex-1 px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm">
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition text-sm">
                            Cari
                        </button>
                    </form>
                    <div class="flex items-center gap-2">
                        <a href="{{ route('sosial-ekonomi.index') }}"
                           class="px-3 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 text-sm">
                            Reset Filter
                        </a>
                        <a href="{{ route('sosial-ekonomi.create') }}"
                           class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition text-sm">
                            + Tambah Data
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
                                    <a href="{{ route('sosial-ekonomi.export.csv') }}" class="block px-4 py-2 hover:bg-gray-50">📄 Export CSV</a>
                                    <a href="{{ route('sosial-ekonomi.export.pdf') }}" class="block px-4 py-2 hover:bg-gray-50">🖨 Export PDF</a>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm border-collapse">
                        <thead class="bg-gray-100 text-gray-700">
                            <tr>
                                <th class="px-4 py-2 border text-center w-12">No</th>
                                <th class="px-4 py-2 border">Surveyor</th>
                                <th class="px-4 py-2 border">Partisipasi Sekolah</th>
                                <th class="px-4 py-2 border">Ijazah Terakhir</th>
                                <th class="px-4 py-2 border">Jenis Disabilitas</th>
                                <th class="px-4 py-2 border">Tingkat Kesulitan Disabilitas</th>
                                <th class="px-4 py-2 border">Penyakit Kronis/Menahun</th>
                                <th class="px-4 py-2 border">Lapangan Usaha</th>
                                <th class="px-4 py-2 border">Nama Usaha</th>
                                <th class="px-4 py-2 border">Jumlah Pekerja</th>
                                <th class="px-4 py-2 border">Memiliki Tempat Usaha</th>
                                <th class="px-4 py-2 border">Omset Usaha/Bulan</th>
                                <th class="px-4 py-2 border text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($sosialEkonomi as $item)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-2 border text-center">
                                        {{ $loop->iteration + ($sosialEkonomi->currentPage() - 1) * $sosialEkonomi->perPage() }}
                                    </td>
                                    <td class="px-4 py-2 border">{{ $item->user->name ?? '-' }}</td>
                                    <td class="px-4 py-2 border">{{ $item->partisipasi_sekolah ?? '-' }}</td>
                                    <td class="px-4 py-2 border">{{ $item->ijazah_terakhir ?? '-' }}</td>
                                    <td class="px-4 py-2 border">{{ $item->jenis_disabilitas ?? '-' }}</td>
                                    <td class="px-4 py-2 border">{{ $item->tingkat_kesulitan_disabilitas ?? '-' }}</td>
                                    <td class="px-4 py-2 border">{{ $item->penyakit_kronis_menahun ?? '-' }}</td>
                                    <td class="px-4 py-2 border">{{ $item->lapangan_usaha ?? '-' }}</td>
                                    <td class="px-4 py-2 border">{{ $item->nama_usaha ?? '-' }}</td>
                                    <td class="px-4 py-2 border">{{ $item->jumlah_pekerja ?? '-' }}</td>
                                    <td class="px-4 py-2 border">{{ $item->memiliki_tempat_usaha ?? '-' }}</td>
                                    <td class="px-4 py-2 border">{{ $item->omset_usaha_bulan ?? '-' }}</td>
                                    <td class="px-4 py-2 border text-center">
                                        <div class="flex items-center justify-center gap-2">
                                            <a href="{{ route('sosial-ekonomi.show', $item->id) }}" class="text-blue-600 hover:text-blue-800 text-xs font-medium">Lihat</a>
                                            <a href="{{ route('sosial-ekonomi.edit', $item->id) }}" class="text-yellow-600 hover:text-yellow-800 text-xs font-medium">Edit</a>
                                            <form action="{{ route('sosial-ekonomi.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-800 text-xs font-medium">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="13" class="px-4 py-6 text-center text-gray-500 text-sm">
                                        Belum ada data sosial ekonomi.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="p-4">
                    {{ $sosialEkonomi->appends(['search' => request('search')])->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>