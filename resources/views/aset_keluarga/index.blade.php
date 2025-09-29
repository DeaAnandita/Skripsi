{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Aset Keluarga') }}
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
                    <!-- Header: Search + Add -->
                    <div class="flex justify-between items-center">
                        <form action="{{ route('aset-keluarga.index') }}" method="GET" class="flex gap-2">
                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="🔍 Cari berdasarkan nama user..."
                                class="px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                                Cari
                            </button>
                        </form>

                        <a href="{{ route('aset-keluarga.create') }}"
                           class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                            + Tambah Aset
                        </a>
                    </div>

                    <!-- Table -->
                    <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-sm">
                        <table class="w-full text-sm text-left border-collapse">
                            <thead class="bg-gray-100 text-gray-700">
                                <tr>
                                    <th class="px-4 py-3 border">#</th>
                                    <th class="px-4 py-3 border">User</th>
                                    <th class="px-4 py-3 border">TV</th>
                                    <th class="px-4 py-3 border">AC</th>
                                    <th class="px-4 py-3 border">Mobil</th>
                                    <th class="px-4 py-3 border">Emas</th>
                                    <th class="px-4 py-3 border">Tabungan</th>
                                    <th class="px-4 py-3 border text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($aset as $item)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-2 border">{{ $loop->iteration }}</td>
                                        <td class="px-4 py-2 border">{{ $item->user->name ?? '-' }}</td>
                                        <td class="px-4 py-2 border">{{ $item->tv ?? '-' }}</td>
                                        <td class="px-4 py-2 border">{{ $item->ac ?? '-' }}</td>
                                        <td class="px-4 py-2 border">{{ $item->mobil ?? '-' }}</td>
                                        <td class="px-4 py-2 border">{{ $item->emas ?? '-' }}</td>
                                        <td class="px-4 py-2 border">{{ $item->tabungan ?? '-' }}</td>
                                        <td class="px-4 py-2 border text-center">
                                            <div class="flex items-center justify-center gap-3">
                                                <a href="{{ route('aset-keluarga.show', $item->id) }}" class="text-blue-600 hover:text-blue-800 text-xs font-medium">Lihat</a>
                                                <a href="{{ route('aset-keluarga.edit', $item->id) }}" class="text-yellow-600 hover:text-yellow-800 text-xs font-medium">Edit</a>
                                                <form action="{{ route('aset-keluarga.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus aset ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-800 text-xs font-medium">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="px-4 py-6 text-center text-gray-500">Belum ada data aset keluarga.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div>
                        {{ $aset->appends(['search' => request('search')])->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Aset Keluarga') }}
        </h2>
    </x-slot>

    @php
        // helper untuk render nilai Ya/Tidak/- dengan badge
        $formatBool = function($v) {
            if ($v === null || $v === '') return '<span class="text-xs text-gray-500">-</span>';
            $s = strtolower((string)$v);
            if (in_array($s, ['1','ya','yes','y','true'])) {
                return '<span class="px-2 py-0.5 text-xs bg-green-100 text-green-800 rounded">Ya</span>';
            }
            if (in_array($s, ['0','tidak','no','n','false'])) {
                return '<span class="px-2 py-0.5 text-xs bg-gray-100 text-gray-800 rounded">Tidak</span>';
            }
            // bila teks lain (mis. "lainnya")
            return '<span class="px-2 py-0.5 text-xs bg-yellow-100 text-yellow-800 rounded">'.e($v).'</span>';
        };
    @endphp

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
                        <form action="{{ route('aset-keluarga.index') }}" method="GET" class="flex gap-2 w-full md:w-1/2">
                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="🔍 Cari berdasarkan nama user..."
                                class="flex-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Cari</button>

                            <a href="{{ route('aset-keluarga.create') }}"
                           class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                            + Tambah Aset
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
                                    <a href="{{ route('aset-keluarga.export.csv') }}" class="block px-4 py-2 hover:bg-gray-50">📄 Export CSV</a>
                                    <a href="{{ route('aset-keluarga.export.pdf') }}" class="block px-4 py-2 hover:bg-gray-50">🖨 Export PDF</a>
                                </div>
                            </div>

                            <a href="{{ route('aset-keluarga.create') }}"
                               class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                                + Tambah Aset
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
                                    <th class="px-3 py-2 border">Tabung Gas</th>
                                    <th class="px-3 py-2 border">Komputer</th>
                                    <th class="px-3 py-2 border">TV</th>
                                    <th class="px-3 py-2 border">AC</th>
                                    <th class="px-3 py-2 border">Kulkas</th>
                                    <th class="px-3 py-2 border">Water Heater</th>
                                    <th class="px-3 py-2 border">Rumah Lain</th>
                                    <th class="px-3 py-2 border">Diesel/Bbm</th>
                                    <th class="px-3 py-2 border">Motor</th>
                                    <th class="px-3 py-2 border">Mobil</th>
                                    <th class="px-3 py-2 border">Perahu Motor</th>
                                    <th class="px-3 py-2 border">Kapal Barang</th>
                                    <th class="px-3 py-2 border">Kapal Penumpang</th>
                                    <th class="px-3 py-2 border">Kapal Pesiar</th>
                                    <th class="px-3 py-2 border">Helikopter</th>
                                    <th class="px-3 py-2 border">Pesawat</th>
                                    <th class="px-3 py-2 border">Ternak Besar</th>
                                    <th class="px-3 py-2 border">Ternak Kecil</th>
                                    <th class="px-3 py-2 border">Emas</th>
                                    <th class="px-3 py-2 border">Tabungan</th>
                                    <th class="px-3 py-2 border">Surat Berharga</th>
                                    <th class="px-3 py-2 border">Deposito</th>
                                    <th class="px-3 py-2 border">Sert. Tanah</th>
                                    <th class="px-3 py-2 border">Sert. Bangunan</th>
                                    <th class="px-3 py-2 border">Industri Besar</th>
                                    <th class="px-3 py-2 border">Industri Menengah</th>
                                    <th class="px-3 py-2 border">Industri Kecil</th>
                                    <th class="px-3 py-2 border">Perikanan</th>
                                    <th class="px-3 py-2 border">Peternakan</th>
                                    <th class="px-3 py-2 border">Perkebunan</th>
                                    <th class="px-3 py-2 border">Usaha Swalayan</th>
                                    <th class="px-3 py-2 border">Usaha Pasar Swalayan</th>
                                    <th class="px-3 py-2 border">Usaha Pasar Trad.</th>
                                    <th class="px-3 py-2 border">Usaha Pasar Desa</th>
                                    <th class="px-3 py-2 border">Transportasi</th>
                                    <th class="px-3 py-2 border">Saham</th>
                                    <th class="px-3 py-2 border">Telkom</th>
                                    <th class="px-3 py-2 border">HP GSM</th>
                                    <th class="px-3 py-2 border">HP CDMA</th>
                                    <th class="px-3 py-2 border">Wartel</th>
                                    <th class="px-3 py-2 border">Parabola</th>
                                    <th class="px-3 py-2 border">Koran</th>

                                    <th class="px-3 py-2 border text-center">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($aset as $item)
                                    <tr class="hover:bg-gray-50 align-top">
                                        <td class="px-3 py-2 border align-top">{{ $loop->iteration + ($aset->currentPage()-1)*$aset->perPage() }}</td>
                                        <td class="px-3 py-2 border align-top">{{ $item->user->name ?? '-' }}</td>

                                        {{-- gunakna helper untuk konsistensi --}}
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->tabung_gas) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->komputer_laptop) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->tv_elektronik) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->ac_pendingin) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->kulkas) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->water_heater) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->rumah_tempat_lain) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->diesel_listrik) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->sepeda_motor) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->mobil_pribadi) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->perahu_bermotor) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->kapal_barang) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->kapal_penumpang) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->kapal_pesiar) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->helikopter_pribadi) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->pesawat_pribadi) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->ternak_besar) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->ternak_kecil) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->hiasan_emas) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->tabungan_bank) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->surat_berharga) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->sertifikat_deposito) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->sertifikat_tanah) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->sertifikat_bangunan) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->perusahaan_industri_besar) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->perusahaan_industri_menengah) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->perusahaan_industri_kecil) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->usaha_perikanan) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->usaha_peternakan) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->usaha_perkebunan) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->usaha_pasar_swalayan) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->usaha_di_pasar_swalayan) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->usaha_di_pasar_tradisional) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->usaha_di_pasar_desa) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->usaha_transportasi) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->saham_perusahaan) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->pelanggan_telkom) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->hp_gsm) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->hp_cdma) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->usaha_wartel) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->parabola) !!}</td>
                                        <td class="px-3 py-2 border align-top">{!! $formatBool($item->berlangganan_koran) !!}</td>

                                        <td class="px-3 py-2 border text-center align-top">
                                            <div class="flex items-center justify-center gap-2">
                                                <a href="{{ route('aset-keluarga.show', $item->id) }}" class="text-blue-600 hover:text-blue-800 text-xs font-medium">Lihat</a>
                                                <a href="{{ route('aset-keluarga.edit', $item->id) }}" class="text-yellow-600 hover:text-yellow-800 text-xs font-medium">Edit</a>
                                                <form action="{{ route('aset-keluarga.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus aset ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-800 text-xs font-medium">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="100" class="px-4 py-6 text-center text-gray-500">Belum ada data aset keluarga.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination --}}
                    <div class="mt-4">
                        {{ $aset->appends(['search' => request('search')])->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
