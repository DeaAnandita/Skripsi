<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Report Kelahiran') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white p-6 rounded shadow">
                <h3 class="font-bold text-lg mb-4">Laporan Data Kelahiran</h3>
                <table class="w-full border">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border p-2 text-left">No</th>
                            <th class="border p-2 text-left">NIK</th>
                            <th class="border p-2 text-left">Nama Bayi</th>
                            <th class="border p-2 text-left">Tanggal Lahir</th>
                            <th class="border p-2 text-left">Tempat Lahir</th>
                            <th class="border p-2 text-left">Akta Kelahiran</th>
                            <th class="border p-2 text-left">Surveyor</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $row)
                            <tr>
                                <td class="border p-2">{{ $loop->iteration }}</td>
                                <td class="border p-2">{{ $row->nik ?? '-' }}</td>
                                <td class="border p-2">{{ $row->nama_bayi ?? '-' }}</td>
                                <td class="border p-2">{{ $row->tanggal_lahir ? \Carbon\Carbon::parse($row->tanggal_lahir)->format('d/m/Y') : '-' }}</td>
                                <td class="border p-2">{{ $row->tempat_lahir ?? '-' }}</td>
                                <td class="border p-2">{{ $row->akta_kelahiran ?? '-' }}</td>
                                <td class="border p-2">{{ $row->user->name ?? '-' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center p-2">Tidak ada data kelahiran</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>