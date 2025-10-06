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
                <h2 class="text-xl font-semibold text-gray-800">Data Dasar Keluarga</h2>
                <form action="{{ route('dasar-keluarga.index') }}" method="GET" class="flex gap-2 w-full md:w-1/2">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="🔍 Cari berdasarkan kepala keluarga..." class="flex-1 px-4 py-2 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Cari</button>
                </form>
                <div class="flex items-center gap-2">
                    <a href="{{ route('dasar-keluarga.index') }}"
                        class="px-3 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 text-sm">
                        Reset Filter
                    </a>
                    <a href="{{ route('dasar-keluarga.create') }}"
                        class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                        + Tambah Data
                    </a>
                </div>
            </div>

            {{-- Table --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm border-collapse">
                        <thead class="bg-gray-100 text-gray-700 relative">
                            <tr>
                                <th class="px-3 py-2 border text-center w-10">#</th>

                                {{-- Filter Jenis Mutasi --}}
                                <th class="px-3 py-2 border cursor-pointer relative"
                                    @click="showMutasi = !showMutasi; showTanggal = false">
                                    <div class="flex items-center justify-between">
                                    <span>Jenis Mutasi</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 inline ml-1 text-gray-400"
                                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M19 9l-7 7-7-7" />
                                    </svg>
                                    </div>

                                    {{-- Dropdown filter --}}
                                    <div x-show="showMutasi" @click.away="showMutasi=false"
                                        class="absolute z-10 bg-white border rounded-md mt-2 shadow-md w-36">
                                        <a href="{{ route('dasar-keluarga.index') }}"
                                           class="block px-3 py-2 hover:bg-gray-100 text-sm">Semua</a>
                                        @foreach (['Tetap', 'Datang', 'Pindah', 'Lainnya'] as $opt)
                                            <a href="{{ route('dasar-keluarga.index', array_merge(request()->query(), ['jenis_mutasi'=>$opt])) }}"
                                               class="block px-3 py-2 hover:bg-gray-100 text-sm">
                                                {{ $opt }}
                                            </a>
                                        @endforeach
                                    </div>
                                </th>

                                {{-- Filter Tanggal Mutasi --}}
                                <th
                                    class="px-3 py-2 border cursor-pointer relative select-none"
                                    @click="showTanggal = !showTanggal; showMutasi = false"
                                >
                                    <div class="flex items-center justify-between">
                                        <span>Tanggal Mutasi</span>
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-4 h-4 ml-1 text-gray-400 transition-transform duration-200"
                                            :class="{ 'rotate-180': showTanggal }"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </div>

                                    {{-- Dropdown tanggal --}}
                                    <div
                                        x-show="showTanggal"
                                        @click.away="showTanggal=false"
                                        x-transition
                                        class="absolute z-20 bg-white border rounded-md mt-2 shadow-md p-3 w-60 right-0"
                                    >
                                        <form method="GET" action="{{ route('dasar-keluarga.index') }}" class="space-y-2">
                                            <input type="hidden" name="search" value="{{ request('search') }}">

                                            <label class="block text-xs text-gray-500">Dari:</label>
                                            <input type="date" name="tanggal_awal"
                                                class="w-full border px-2 py-1 rounded-md text-sm"
                                                value="{{ request('tanggal_awal') }}">

                                            <label class="block text-xs text-gray-500">Sampai:</label>
                                            <input type="date" name="tanggal_akhir"
                                                class="w-full border px-2 py-1 rounded-md text-sm"
                                                value="{{ request('tanggal_akhir') }}">

                                            <button type="submit"
                                                class="w-full mt-2 bg-blue-600 text-white text-sm px-3 py-1.5 rounded hover:bg-blue-700 transition">
                                                Terapkan
                                            </button>
                                        </form>
                                    </div>
                                </th>


                                <th class="px-3 py-2 border">No KK</th>
                                <th class="px-3 py-2 border">Kepala Keluarga</th>
                                <th class="px-3 py-2 border">Dusun / RW / RT</th>
                                <th class="px-3 py-2 border">Alamat</th>
                                <th class="px-3 py-2 border text-center">Info Tambahan</th>
                                <th class="px-3 py-2 border text-center">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($dasar as $item)
                                <tr class="hover:bg-gray-50 align-top">
                                    <td class="px-3 py-2 border text-center">
                                        {{ $loop->iteration + ($dasar->currentPage()-1)*$dasar->perPage() }}
                                    </td>
                                    <td class="px-3 py-2 border font-semibold
                                        {{ $item->jenis_mutasi === 'Datang' ? 'text-green-700' :
                                           ($item->jenis_mutasi === 'Pindah' ? 'text-orange-700' : 'text-blue-700') }}">
                                        {!! $formatVal($item->jenis_mutasi) !!}
                                    </td>
                                    <td class="px-3 py-2 border">{!! $formatVal($item->tanggal_mutasi) !!}</td>
                                    <td class="px-3 py-2 border">{!! $formatVal($item->no_kk) !!}</td>
                                    <td class="px-3 py-2 border">{!! $formatVal($item->kepala_keluarga) !!}</td>
                                    <td class="px-3 py-2 border">
                                        Dusun: {!! $formatVal($item->dusun) !!}<br>
                                        RW: {!! $formatVal($item->rw) !!} / RT: {!! $formatVal($item->rt) !!}
                                    </td>
                                    <td class="px-3 py-2 border">{!! $formatVal($item->alamat) !!}</td>

                                    <td class="px-3 py-2 border">
                                        @if ($item->jenis_mutasi === 'Datang')
                                            <div class="text-xs leading-relaxed">
                                                <p><strong>Provinsi:</strong> {!! $formatVal($item->provinsi) !!}</p>
                                                <p><strong>Kabupaten:</strong> {!! $formatVal($item->kabupaten) !!}</p>
                                                <p><strong>Kecamatan:</strong> {!! $formatVal($item->kecamatan) !!}</p>
                                                <p><strong>Desa:</strong> {!! $formatVal($item->desa) !!}</p>
                                            </div>
                                        @else
                                            <span class="text-gray-400 text-xs italic">Tidak ada info tambahan</span>
                                        @endif
                                    </td>

                                    <td class="px-3 py-2 border text-center">
                                        <div class="flex items-center justify-center gap-2">
                                            <a href="{{ route('dasar-keluarga.show', $item->id) }}" class="text-blue-600 hover:text-blue-800 text-xs font-medium">Lihat</a>
                                            <a href="{{ route('dasar-keluarga.edit', $item->id) }}" class="text-yellow-600 hover:text-yellow-800 text-xs font-medium">Edit</a>
                                            <form action="{{ route('dasar-keluarga.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-800 text-xs font-medium">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="100" class="px-4 py-6 text-center text-gray-500">
                                        Belum ada data dasar keluarga.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                <div class="p-4">
                    {{ $dasar->appends(request()->all())->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
