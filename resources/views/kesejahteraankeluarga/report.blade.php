<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Report Kesejahteraan Keluarga') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Filter --}}
            <form method="GET" class="flex gap-4 bg-white p-4 rounded shadow">
                <select name="kategori" class="border rounded px-2">
                    <option value="">-- Kategori --</option>
                    @foreach(['Pendapatan', 'Kesehatan', 'Pendidikan', 'Sanitasi', 'Pangan', 'Lainnya'] as $kat)
                        <option value="{{ $kat }}" @selected(request('kategori')==$kat)>{{ $kat }}</option>
         []           @endforeach
                </select>

                <select name="status_kesejahteraan" class="border rounded px-2">
                    <option value="">-- Status --</option>
                    @foreach(['Baik', 'Cukup', 'Kurang', 'Tidak Memadai'] as $status)
                        <option value="{{ $status }}" @selected(request('status_kesejahteraan')==$status)>{{ $status }}</option>
                    @endforeach
                </select>

                <input type="number" name="tahun" value="{{ request('tahun') }}" placeholder="Tahun" class="border rounded px-2">

                <button type="submit" class="px-3 py-1 bg-blue-600 text-white rounded">Filter</button>
            </form>

            {{-- Ringkasan --}}
            <div class="bg-white p-6 rounded shadow">
                <h3 class="font-bold text-lg mb-4">Ringkasan</h3>
                <p>Total Keluarga: <b>{{ $total }}</b></p>
                <p>Total Skor: <b>{{ number_format($totalSkor,0,',','.') }}</b></p>

                <div class="grid grid-cols-2 gap-6 mt-4">
                    <div>
                        <h4 class="font-semibold">Per Kategori</h4>
                        <ul>
                            @foreach($perKategori as $kat => $jumlah)
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

            {{-- Tabel detail --}}
            <div class="bg-white p-6 rounded shadow">
                <h3 class="font-bold text-lg mb-4">Detail Kesejahteraan</h3>
                <table class="w-full border">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border p-2">Nama Keluarga</th>
                            <th class="border p-2">Kategori</th>
                            <th class="border p-2">Skor</th>
                            <th class="border p-2">Tahun</th>
                            <th class="border p-2">Status</th>
                            <th class="border p-2">Surveyor</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $row)
                            <tr>
                                <td class="border p-2">{{ $row->nama_keluarga }}</td>
                                <td class="border p-2">{{ $row->kategori }}</td>
                                <td class="border p-2">{{ number_format($row->skor_kesejahteraan,0,',','.') }}</td>
                                <td class="border p-2">{{ $row->tahun_survey }}</td>
                                <td class="border p-2">{{ $row->status_kesejahteraan }}</td>
                                <td class="border p-2">{{ $row->user->name }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center p-2">Tidak ada data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>