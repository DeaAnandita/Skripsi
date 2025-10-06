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
                <h2 class="text-xl font-semibold text-gray-800">Data Sarpras Kerja</h2>
                <form action="{{ route('sarpras-kerja.index') }}" method="GET" class="flex gap-2 w-full md:w-1/2">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="🔍 Cari berdasarkan sarpras kerja..." class="flex-1 px-4 py-2 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Cari</button>
                </form>
                <div class="flex items-center gap-2">
                    <a href="{{ route('sarpras-kerja.index') }}"
                        class="px-3 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 text-sm">
                        Reset Filter
                    </a>
                    <a href="{{ route('sarpras-kerja.create') }}"
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

                                    <!-- Semua kolom sesuai create -->
                                    <th class="px-3 py-2 border">Mesin Kerja</th>
                                    <th class="px-3 py-2 border">Komputer Kerja</th>
                                    <th class="px-3 py-2 border">Meja Kantor</th>
                                    <th class="px-3 py-2 border">Kursi Kantor</th>
                                    <th class="px-3 py-2 border">Mobil Operasional</th>
                                    <th class="px-3 py-2 border">Sepeda Motor Kerja</th>
                                    <th class="px-3 py-2 border">Alat Berat</th>
                                    <th class="px-3 py-2 border">Internet Kerja</th>
                                    <th class="px-3 py-2 border">Printer/Scanner</th>
                                    <th class="px-3 py-2 border">Telepon Kantor</th>

                                    <th class="px-3 py-2 border text-center">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($sarpraskerja as $item)
                                    <tr class="hover:bg-gray-50 align-top">
                                        <td class="px-3 py-2 border align-top">{{ $loop->iteration + ($sarpraskerja->currentPage()-1)*$sarpraskerja->perPage() }}</td>
                                        <td class="px-3 py-2 border align-top">{{ $item->user->name ?? '-' }}</td>

                                        <!-- Gunakan helper untuk konsistensi -->
                                        <td class="px-3 py-2 border align-top">{!! ($item->mesin_kerja) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! ($item->komputer_kerja) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! ($item->meja_kantor) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! ($item->kursi_kantor) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! ($item->mobil_operasional) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! ($item->sepeda_motor_kerja) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! ($item->alat_berat) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! ($item->internet_kerja) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! ($item->printer_scanner) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! ($item->telepon_kantor) !!}</td>

                                        <td class="px-3 py-2 border text-center align-top">
                                            <div class="flex items-center justify-center gap-2">
                                                <a href="{{ route('sarpras-kerja.show', $item->id) }}" class="text-blue-600 hover:text-blue-800 text-xs font-medium">Lihat</a>
                                                <a href="{{ route('sarpras-kerja.edit', $item->id) }}" class="text-yellow-600 hover:text-yellow-800 text-xs font-medium">Edit</a>
                                                <form action="{{ route('sarpras-kerja.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus data ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-800 text-xs font-medium">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="13" class="px-4 py-6 text-center text-gray-500">Belum ada data sarana prasarana kerja.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination --}}
                    <div class="mt-4">
                        {{ $sarpraskerja->appends(['search' => request('search')])->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>