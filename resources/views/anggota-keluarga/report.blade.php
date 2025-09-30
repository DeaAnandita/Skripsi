<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Report Anggota Keluarga') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Filter --}}
            <form method="GET" class="flex gap-4 bg-white p-4 rounded shadow">
                <select name="jenis_kelamin" class="border rounded px-2">
                    <option value="">-- Jenis Kelamin --</option>
                    <option value="laki-laki" @selected(request('jenis_kelamin')=='laki-laki')>Laki-laki</option>
                    <option value="perempuan" @selected(request('jenis_kelamin')=='perempuan')>Perempuan</option>
                </select>

                <select name="status_perkawinan" class="border rounded px-2">
                    <option value="">-- Status Perkawinan --</option>
                    @foreach(['belum kawin','kawin','cerai hidup','cerai mati'] as $status)
                        <option value="{{ $status }}" @selected(request('status_perkawinan')==$status)>{{ ucfirst($status) }}</option>
                    @endforeach
                </select>

                <input type="text" name="nama" value="{{ request('nama') }}" placeholder="Nama Anggota" class="border rounded px-2">

                <button type="submit" class="px-3 py-1 bg-blue-600 text-white rounded">Filter</button>
            </form>

            {{-- Ringkasan --}}
            <div class="bg-white p-6 rounded shadow">
                <h3 class="font-bold text-lg mb-4">Ringkasan</h3>
                <p>Total Anggota Keluarga: <b>{{ $total }}</b></p>

                <div class="grid grid-cols-2 gap-6 mt-4">
                    <div>
                        <h4 class="font-semibold">Per Jenis Kelamin</h4>
                        <ul>
                            @foreach($perJenisKelamin as $jk => $jumlah)
                                <li>{{ ucfirst($jk) }}: {{ $jumlah }}</li>
                            @endforeach
                        </ul>
                    </div>

                    <div>
                        <h4 class="font-semibold">Per Status Perkawinan</h4>
                        <ul>
                            @foreach($perStatus as $status => $jumlah)
                                <li>{{ ucfirst($status) }}: {{ $jumlah }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            {{-- Tabel detail --}}
            <div class="bg-white p-6 rounded shadow">
                <h3 class="font-bold text-lg mb-4">Detail Anggota Keluarga</h3>
                <table class="w-full border">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border p-2">NIK</th>
                            <th class="border p-2">Nama Lengkap</th>
                            <th class="border p-2">Tanggal Lahir</th>
                            <th class="border p-2">Jenis Kelamin</th>
                            <th class="border p-2">Hubungan Keluarga</th>
                            <th class="border p-2">Status Perkawinan</th>
                            <th class="border p-2">Keluarga</th>
                            <th class="border p-2">Surveyor</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $row)
                            <tr>
                                <td class="border p-2">{{ $row->nik }}</td>
                                <td class="border p-2">{{ $row->nama_lengkap }}</td>
                                <td class="border p-2">{{ \Carbon\Carbon::parse($row->tanggal_lahir)->format('d-m-Y') }}</td>
                                <td class="border p-2">{{ ucfirst($row->jenis_kelamin) }}</td>
                                <td class="border p-2">{{ ucfirst($row->hubungan_keluarga) }}</td>
                                <td class="border p-2">{{ ucfirst($row->status_perkawinan) }}</td>
                                <td class="border p-2">
                                    {{ $row->keluarga->nomor_kk ?? '-' }}
                                    ({{ $row->keluarga->nama_kepala_keluarga ?? '' }})
                                </td>
                                <td class="border p-2">{{ $row->user->name ?? '-' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center p-2">Tidak ada data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
