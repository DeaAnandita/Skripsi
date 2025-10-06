<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Laporan Penyewaan Lahan') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Filter -->
            <form method="GET" class="flex gap-4 bg-white p-4 rounded shadow">
                <select name="jenis_aset" class="border rounded px-2">
                    <option value="">-- Jenis Aset --</option>
                    @foreach(['Ternak', 'Perikanan'] as $kat)
                        <option value="{{ $kat }}" @selected(request('jenis_aset') == $kat)>{{ $kat }}</option>
                    @endforeach
                </select>

                <select name="status" class="border rounded px-2">
                    <option value="">-- Status --</option>
                    @foreach(['Aktif', 'Selesai', 'Batal'] as $status)
                        <option value="{{ $status }}" @selected(request('status') == $status)>{{ $status }}</option>
                    @endforeach
                </select>

                <input type="number" name="tahun" value="{{ request('tahun') }}" placeholder="Tahun" class="border rounded px-2">

                <button type="submit" class="px-3 py-1 bg-blue-600 text-white rounded">Filter</button>
            </form>

            <!-- Ringkasan -->
            <div class="bg-white p-6 rounded shadow">
                <h3 class="font-bold text-lg mb-4">Ringkasan</h3>
                <p>total biaya : <b>Rp {{ number_format($total_biaya ?: 0, 2) }}</b></p>
                <p>Total Bayar: <b>{{ number_format($total_luas ?: 0, 2) }} m²</b></p>
                <p>Total Data: <b>{{ $penyewaan->count() }}</b> penyewaan</p>

                <div class="grid grid-cols-2 gap-6 mt-4">
                    <div>
                        <h4 class="font-semibold">Per Jenis Aset</h4>
                        <ul>
                            @foreach($perJenisAset as $kat => $jumlah)
                                <li>{{ $kat }}: {{ $jumlah }}</li>
                            @endforeach
                        </ul>
                    </div>

                    <div>
                        <h4 class="font-semibold">Per Status</h4>
                        <ul>
                            @foreach($perStatus as $status => $jumlah)
                                <li>{{ $status }}: {{ $jumlah }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Tabel Detail -->
            <div class="bg-white p-6 rounded shadow">
                <h3 class="font-bold text-lg mb-4">Detail Penyewaan</h3>
                <table class="w-full border">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border p-2">No</th>
                            <th class="border p-2">Nama Penyewa</th>
                            <th class="border p-2">Lokasi</th>
                            <th class="border p-2">Luas (m²)</th>
                            <th class="border p-2">Jenis Aset</th>
                            <th class="border p-2">Tanggal Mulai</th>
                            <th class="border p-2">Tanggal Selesai</th>
                            <th class="border p-2">Biaya Sewa</th>
                            <th class="border p-2">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($penyewaan as $index => $item)
                            <tr>
                                <td class="border p-2">{{ $index + 1 }}</td>
                                <td class="border p-2">{{ $item->nama_penyewa }}</td>
                                <td class="border p-2">{{ $item->lokasi_lahan }}</td>
                                <td class="border p-2">{{ $item->luas_lahan }}</td>
                                <td class="border p-2">{{ $item->jenis_aset }}</td>
                                <td class="border p-2">{{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d/m/Y') }}</td>
                                <td class="border p-2">{{ \Carbon\Carbon::parse($item->tanggal_selesai)->format('d/m/Y') }}</td>
                                <td class="border p-2">Rp {{ number_format($item->biaya_sewa, 2) }}</td>
                                <td class="border p-2">{{ $item->status }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center p-2">Tidak ada data penyewaan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-4">
                {{ $penyewaan->appends(['jenis_aset' => request('jenis_aset'), 'status' => request('status'), 'tahun' => request('tahun')])->links() }}
            </div>
        </div>
    </div>
</x-app-layout>