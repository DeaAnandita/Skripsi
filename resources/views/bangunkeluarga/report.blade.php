<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-indigo-800 leading-tight flex items-center gap-2">
            🏡 {{ __('Report BangunKeluarga') }}
        </h2>
    </x-slot>

    <div class="py-6 bg-gradient-to-b from-indigo-50 to-white min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Filter --}}
            <form method="GET" class="flex flex-wrap gap-3 bg-white p-4 rounded-xl shadow border border-indigo-100">
                <select name="kategori" class="border rounded-lg px-3 py-1 focus:ring-indigo-400">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach(['Rumah','Kendaraan','Tabungan','Usaha','Elektronik','Lainnya'] as $kat)
                        <option value="{{ $kat }}" @selected(request('kategori')==$kat)>{{ $kat }}</option>
                    @endforeach
                </select>

                <select name="status_aset" class="border rounded-lg px-3 py-1 focus:ring-indigo-400">
                    <option value="">-- Pilih Status --</option>
                    @foreach(['Aktif','Dijual','Dipakai','Rusak','Hilang'] as $status)
                        <option value="{{ $status }}" @selected(request('status_aset')==$status)>{{ $status }}</option>
                    @endforeach
                </select>

                <input type="number" name="tahun" value="{{ request('tahun') }}" placeholder="Tahun"
                       class="border rounded-lg px-3 py-1 focus:ring-indigo-400">

                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                    🔍 Tampilkan
                </button>
            </form>

            {{-- Ringkasan --}}
            <div class="bg-white p-6 rounded-xl shadow border border-indigo-100">
                <h3 class="font-bold text-lg text-indigo-700 mb-4 flex items-center gap-2">📊 Ringkasan Keluarga</h3>
                <p class="text-gray-700">Total Aset: <b>{{ $total }}</b></p>
                <p class="text-gray-700">Total Nilai: <b>Rp {{ number_format($totalNilai,0,',','.') }}</b></p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                    <div class="bg-indigo-50 p-4 rounded-lg">
                        <h4 class="font-semibold text-indigo-600 mb-2">📂 Per Kategori</h4>
                        <ul class="list-disc list-inside text-gray-700 space-y-1">
                            @foreach($perKategori as $kat => $jumlah)
                                <li>{{ $kat }}: <b>{{ $jumlah }}</b></li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="bg-indigo-50 p-4 rounded-lg">
                        <h4 class="font-semibold text-indigo-600 mb-2">📌 Per Status</h4>
                        <ul class="list-disc list-inside text-gray-700 space-y-1">
                            @foreach($perStatus as $status => $jumlah)
                                <li>{{ $status }}: <b>{{ $jumlah }}</b></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            {{-- Detail --}}
            <div class="bg-white p-6 rounded-xl shadow border border-indigo-100">
                <h3 class="font-bold text-lg text-indigo-700 mb-4 flex items-center gap-2">📖 Detail Aset Keluarga</h3>
                <div class="overflow-x-auto">
                    <table class="w-full border border-gray-200 rounded-lg overflow-hidden">
                        <thead class="bg-indigo-100 text-indigo-800">
                            <tr>
                                <th class="border p-2">🏷 Nama Aset</th>
                                <th class="border p-2">📂 Kategori</th>
                                <th class="border p-2">💰 Nilai</th>
                                <th class="border p-2">📅 Tahun</th>
                                <th class="border p-2">📌 Status</th>
                                <th class="border p-2">👨‍👩‍👧 User</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @forelse($data as $row)
                                <tr class="hover:bg-indigo-50 transition">
                                    <td class="border p-2">{{ $row->nama_aset }}</td>
                                    <td class="border p-2">{{ $row->kategori }}</td>
                                    <td class="border p-2 text-right">Rp {{ number_format($row->nilai_aset,0,',','.') }}</td>
                                    <td class="border p-2">{{ $row->tahun_perolehan }}</td>
                                    <td class="border p-2">{{ $row->status_aset }}</td>
                                    <td class="border p-2">{{ $row->user->name }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center p-4 text-gray-500">🙁 Belum ada data aset keluarga.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
