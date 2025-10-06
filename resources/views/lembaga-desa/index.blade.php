<x-app-layout>
    @php
        $formatVal = fn($v) => $v === null || $v === '' ? '<span class="text-xs text-gray-500">-</span>' : e($v);
    @endphp

    <div class="py-6" x-data="{
        showDusun: false,
        showNamaLembaga: false,
        selectedDusun: '{{ request('dusun') ?? '' }}',
        selectedNamaLembaga: '{{ request('nama_lembaga') ?? '' }}',
        applyFilter(url) { window.location.href = url },
    }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-4 p-4 rounded-md bg-green-100 text-green-800">
                    {{ session('success') }}
                </div>
            @endif

            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold text-gray-800">Data Lembaga Desa</h2>
                <form action="{{ route('lembaga-desa.index') }}" method="GET" class="flex gap-2 w-full md:w-1/2">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="🔍 Cari berdasarkan keterangan..." class="flex-1 px-4 py-2 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Cari</button>
                </form>
                <div class="flex items-center gap-2">
                    <a href="{{ route('lembaga-desa.index') }}"
                       class="px-3 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 text-sm">
                        Reset Filter
                    </a>
                    <a href="{{ route('lembaga-desa.create') }}"
                       class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                        + Tambah Data
                    </a>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm border-collapse">
                        <thead class="bg-gray-100 text-gray-700 relative">
                            <tr>
                                <th class="px-3 py-2 border text-center w-10">#</th>
                                <th class="px-3 py-2 border cursor-pointer relative
                                    <div class="flex items-center justify-between">
                                        <span>Dusun</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 inline ml-1 text-gray-400"
                                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </div>
                                    <div x-show="showDusun" @click.away="showDusun=false"
                                         class="absolute z-10 bg-white border rounded-md mt-2 shadow-md w-36">
                                        <a href="{{ route('lembaga-desa.index') }}"
                                           class="block px-3 py-2 hover:bg-gray-100 text-sm">Semua</a>
                                        <a href="{{ route('lembaga-desa.index', array_merge(request()->query(), ['dusun' => 'Dusun A'])) }}"
                                           class="block px-3 py-2 hover:bg-gray-100 text-sm">Dusun A</a>
                                        <a href="{{ route('lembaga-desa.index', array_merge(request()->query(), ['dusun' => 'Dusun B'])) }}"
                                           class="block px-3 py-2 hover:bg-gray-100 text-sm">Dusun B</a>
                                    </div>
                                </th>
                                <th class="px-3 py-2 border cursor-pointer relative
                                    <div class="flex items-center justify-between">
                                        <span>Jenis Lembaga</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 inline ml-1 text-gray-400"
                                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </div>
                                    <div x-show="showNamaLembaga" @click.away="showNamaLembaga=false"
                                         class="absolute z-10 bg-white border rounded-md mt-2 shadow-md w-36">
                                        <a href="{{ route('lembaga-desa.index') }}"
                                           class="block px-3 py-2 hover:bg-gray-100 text-sm">Semua</a>
                                        <a href="{{ route('lembaga-desa.index', array_merge(request()->query(), ['nama_lembaga' => 'Pemerintah Desa'])) }}"
                                           class="block px-3 py-2 hover:bg-gray-100 text-sm">Pemerintah Desa</a>
                                        <a href="{{ route('lembaga-desa.index', array_merge(request()->query(), ['nama_lembaga' => 'BPD'])) }}"
                                           class="block px-3 py-2 hover:bg-gray-100 text-sm">BPD</a>
                                    </div>
                                </th>
                                <th class="px-3 py-2 border">Jenis Lembaga</th>
                                <th class="px-3 py-2 border">Dusun</th>
                                <th class="px-3 py-2 border">Kepala Desa</th>
                                <th class="px-3 py-2 border">Sekretaris Desa</th>
                                <th class="px-3 py-2 border">Kaur Keuangan</th>
                                <th class="px-3 py-2 border">Kepala Dusun</th>
                                <th class="px-3 py-2 border">Ketua BPD</th>
                                <th class="px-3 py-2 border">Keterangan</th>
                                <th class="px-3 py-2 border text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($lembaga as $item)
                                <tr class="hover:bg-gray-50 align-top">
                                    <td class="px-3 py-2 border text-center">
                                        {{ $loop->iteration + ($lembaga->currentPage()-1)*$lembaga->perPage() }}
                                    </td>
                                    <td class="px-3 py-2 border">{!! $formatVal($item->dusun) !!}</td>
                                    <td class="px-3 py-2 border">{!! $formatVal($item->nama_lembaga) !!}</td>
                                    <td class="px-3 py-2 border">{!! $formatVal($item->dusun) !!}</td>
                                    <td>
                                        @php
                                            $struktur = $item->struktur_jabatan ? json_decode($item->struktur_jabatan, true) : [];
                                            $status = isset($struktur['Kepala Desa']) ? ($struktur['Kepala Desa'] > 0 ? 'Ya' : 'Tidak') : 'Lainnya';
                                        @endphp
                                        {{ $status }}
                                    </td>
                                    <td>
                                        @php
                                            $status = isset($struktur['Sekretaris Desa']) ? ($struktur['Sekretaris Desa'] > 0 ? 'Ya' : 'Tidak') : 'Lainnya';
                                        @endphp
                                        {{ $status }}
                                    </td>
                                    <td>
                                        @php
                                            $status = isset($struktur['Kaur Keuangan']) ? ($struktur['Kaur Keuangan'] > 0 ? 'Ya' : 'Tidak') : 'Lainnya';
                                        @endphp
                                        {{ $status }}
                                    </td>
                                    <td>
                                        @php
                                            $status = isset($struktur['Kepala Dusun']) ? ($struktur['Kepala Dusun'] > 0 ? 'Ya' : 'Tidak') : 'Lainnya';
                                        @endphp
                                        {{ $status }}
                                    </td>
                                    <td>
                                        @php
                                            $status = isset($struktur['Ketua BPD']) ? ($struktur['Ketua BPD'] > 0 ? 'Ya' : 'Tidak') : 'Lainnya';
                                        @endphp
                                        {{ $status }}
                                    </td>
                                    <td class="px-3 py-2 border">{!! $formatVal($item->keterangan) !!}</td>
                                    <td class="px-3 py-2 border text-center">
                                        <div class="flex items-center justify-center gap-2">
                                            <a href="{{ route('lembaga-desa.show', $item->id_lembaga) }}" class="text-blue-600 hover:text-blue-800 text-xs font-medium">Lihat</a>
                                            <a href="{{ route('lembaga-desa.edit', $item->id_lembaga) }}" class="text-yellow-600 hover:text-yellow-800 text-xs font-medium">Edit</a>
                                            <form action="{{ route('lembaga-desa.destroy', $item->id_lembaga) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus data ini?')">
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
                                        Belum ada data lembaga desa.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="p-4">
                    {{ $lembaga->appends(request()->all())->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>