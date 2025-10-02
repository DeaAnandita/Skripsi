<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Report Aset Ternak</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.3/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="p-6">

    <h1 class="text-2xl font-bold mb-4">Laporan Aset Ternak</h1>

    @if($asetTernaks->isEmpty())
        <p class="text-gray-500">Belum ada data aset ternak.</p>
    @else
        <table class="min-w-full border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-2 py-1">#</th>
                    <th class="border px-2 py-1">Nama Ternak</th>
                    <th class="border px-2 py-1">Jenis</th>
                    <th class="border px-2 py-1">Jumlah</th>
                    <th class="border px-2 py-1">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($asetTernaks as $index => $aset)
                    <tr class="{{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-50' }}">
                        <td class="border px-2 py-1">{{ $index + 1 }}</td>
                        <td class="border px-2 py-1">{{ $aset->nama }}</td>
                        <td class="border px-2 py-1">{{ $aset->jenis }}</td>
                        <td class="border px-2 py-1">{{ $aset->jumlah }}</td>
                        <td class="border px-2 py-1">{{ $aset->keterangan }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

</body>
</html>
