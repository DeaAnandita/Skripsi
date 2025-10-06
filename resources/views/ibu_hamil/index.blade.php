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
                <h2 class="text-xl font-semibold text-gray-800">Data Ibu Hamil</h2>
                <form action="{{ route('ibu-hamil.index') }}" method="GET" class="flex gap-2 w-full md:w-1/2">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="🔍 Cari data ibu hamil..." class="flex-1 px-4 py-2 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Cari</button>
                </form>
                <div class="flex items-center gap-2">
                    <a href="{{ route('ibu-hamil.index') }}"
                        class="px-3 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 text-sm">
                        Reset Filter
                    </a>
                    <a href="{{ route('ibu-hamil.create') }}"
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
                                <th class="px-3 py-2 border">Surveyor</th>
                                <th class="px-3 py-2 border">Nama</th>
                                <th class="px-3 py-2 border">NIK</th>
                                <th class="px-3 py-2 border">Alamat</th>
                                <th class="px-3 py-2 border">NO.HP</th>
                                <th class="px-3 py-2 border">Status Hamil</th>
                                <th class="px-3 py-2 border text-center">Aksi</th>
                            </tr>
                        </thead>

                            <tbody>
                                @forelse ($ibuhamil as $item)
                                    <tr class="hover:bg-gray-50 align-top">
                                        <td class="px-3 py-2 border align-top">{{ $loop->iteration + ($ibuhamil->currentPage()-1)*$ibuhamil->perPage() }}</td>
                                        <td class="px-3 py-2 border align-top">{{ $item->user->name ?? '-' }}</td>

                                        {{-- gunakna helper untuk konsistensi --}}
                                        <td class="px-3 py-2 border align-top">{!! $item->nama !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $item->nik !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $item->alamat !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $item->no_hp !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $item->status_hamil !!}</td>

                                        <td class="px-3 py-2 border text-center align-top">
                                            <div class="flex items-center justify-center gap-2">
                                                <a href="{{ route('ibu-hamil.show', $item->id) }}" class="text-blue-600 hover:text-blue-800 text-xs font-medium">Lihat</a>
                                                <a href="{{ route('ibu-hamil.edit', $item->id) }}" class="text-yellow-600 hover:text-yellow-800 text-xs font-medium">Edit</a>
                                                <form action="{{ route('ibu-hamil.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus data ini?')">
                                                    @csrf
                                                    @method('DELETE') 
                                                    <button type="submit" class="text-red-600 hover:text-red-800 text-xs font-medium">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="100" class="px-4 py-6 text-center text-gray-500">Belum ada data ibu hamil.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                <div class="p-4">
                    {{ $ibuhamil->appends(request()->all())->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
