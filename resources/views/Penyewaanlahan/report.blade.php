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
                    <option value="ternak" {{ request('jenis_aset') == 'ternak' ? 'selected' : '' }}>Ternak</option>
                    <option value="perikanan" {{ request('jenis_aset') == 'perikanan' ? 'selected' : '' }}>Perikanan</option>
                </select>

                <select name="status" class="border rounded px-2">
                    <option value="">-- Status --</option>
                    <option value="aktif" {{ request('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                    <option value="batal" {{ request('status') == 'batal' ? 'selected' : '' }}>Batal</option>
                </select>

                <button type="submit" class="px-3 py-1 bg-blue-600 text-white rounded">Filter</button>
                <a href="{{ route('penyewaan-lahan.report') }}" class="px-3 py-1 bg-gray-500 text-white rounded">Reset</a>
            </form>

            <!-- Ringkasan -->
            <div class="bg-white p-6 rounded shadow">
                <h3 class="font-bold text-lg mb-4">Ringkasan</h3>
                <p>Total Biaya Sewa: <b>Rp {{ number_format($total_biaya, 2) }}</b></p>
                <p>Total Luas Lahan: <b>{{ number_format($total_luas, 2) }} m²</b></p>
                <p>Total Data: <b>{{ $penyewaan->count() }} penyewaan</b></p>
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
                                <td class="border p-2">{{ $item->tanggal_mulai }}</td>
                                <td class="border p-2">{{ $item->tanggal_selesai }}</td>
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

            <a href="{{ route('penyewaan-lahan.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition">Kembali ke Daftar</a>
        </div>
    </div>
</x-app-layout>