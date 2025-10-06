<x-app-layout>
    @php
        $formatVal = fn($v) => $v === null || $v === '' ? '<span class="text-xs text-gray-500">-</span>' : e($v);
    @endphp

    <div class="py-6" x-data="{
        showMutasi: false,
        showTanggal: false,
        selectedMutasi: '{{ request('jenis_mutasi') ?? '' }}',
        tanggalAwal: '{{ request('tanggal_awal') ?? '' }}',
        tanggalAkhir: '{{ request('tanggal_akhir') ?? '' }}',
        applyFilter(url) { window.location.href = url },
    }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Alert --}}
            @if(session('success'))
                <div class="mb-4 p-4 rounded-md bg-green-100 text-green-800">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Header --}}
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold text-gray-800">Data Kesejahteraan Keluarga</h2>
                <form action="{{ route('konflik-sosial.index') }}" method="GET" class="flex gap-2 w-full md:w-1/2">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="🔍 Cari berdasarkan konflik sosial..." class="flex-1 px-4 py-2 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Cari</button>
                </form>
                <div class="flex items-center gap-2">
                    <a href="{{ route('konflik-sosial.index') }}"
                        class="px-3 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 text-sm">
                        Reset Filter
                    </a>
                    <a href="{{ route('konflik-sosial.create') }}"
                        class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                        + Tambah Data
                    </a>
                </div>
            </div>

                    {{-- Table --}}
                    <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-sm">
                        <table class="min-w-full text-sm text-left border-collapse">
                            <thead class="bg-gray-50 text-gray-700">
                                <tr>
                                    <th class="px-3 py-2 border">#</th>
                                    <th class="px-3 py-2 border">Surveyor</th>

                                    {{-- Semua kolom sesuai create --}}
                                    <th class="px-3 py-2 border">Konflik Tanah</th>
                                    <th class="px-3 py-2 border">Konflik Pemukiman</th>
                                    <th class="px-3 py-2 border">Konflik Ekonomi</th>
                                    <th class="px-3 py-2 border">Konflik Sosial Budaya</th>
                                    <th class="px-3 py-2 border">Konflik Politik</th>
                                    <th class="px-3 py-2 border">Konflik Agraria</th>
                                    <th class="px-3 py-2 border">Konflik Lingkungan</th>
                                    <th class="px-3 py-2 border">Konflik Kriminalitas</th>
                                    <th class="px-3 py-2 border">Konflik Etnis</th>
                                    <th class="px-3 py-2 border">Konflik Agama</th>
                                    <th class="px-3 py-2 border">Konflik Pelayanan Publik</th>

                                    <th class="px-3 py-2 border text-center">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($konflik as $item)
                                    <tr class="hover:bg-gray-50 align-top">
                                        <td class="px-3 py-2 border align-top">{{ $loop->iteration + ($konflik->currentPage()-1)*$konflik->perPage() }}</td>
                                        <td class="px-3 py-2 border align-top">{{ $item->user->name ?? '-' }}</td>

                                        {{-- gunakan helper untuk konsistensi --}}
                                        <td class="px-3 py-2 border align-top">{!! ($item->konflik_tanah) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! ($item->konflik_pemukiman) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! ($item->konflik_ekonomi) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! ($item->konflik_sosial_budaya) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! ($item->konflik_politik) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! ($item->konflik_agraria) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! ($item->konflik_lingkungan) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! ($item->konflik_kriminalitas) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! ($item->konflik_etnis) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! ($item->konflik_agama) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! ($item->konflik_pelayanan_publik) !!}</td>

                                        <td class="px-3 py-2 border text-center align-top">
                                            <div class="flex items-center justify-center gap-2">
                                                <a href="{{ route('konflik-sosial.show', $item->id) }}" class="text-blue-600 hover:text-blue-800 text-xs font-medium">Lihat</a>
                                                <a href="{{ route('konflik-sosial.edit', $item->id) }}" class="text-yellow-600 hover:text-yellow-800 text-xs font-medium">Edit</a>
                                                <form action="{{ route('konflik-sosial.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus data ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-800 text-xs font-medium">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="100" class="px-4 py-6 text-center text-gray-500">Belum ada data konflik sosial.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination --}}
                    <div class="mt-4">
                        {{ $konflik->appends(['search' => request('search')])->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>