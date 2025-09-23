<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Aset Keluarga') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6 space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <div><strong>User:</strong> {{ $item->user->name ?? '-' }}</div>
                    <div><strong>Nama Aset:</strong> {{ $item->nama_aset }}</div>
                    <div><strong>Kategori:</strong> {{ $item->kategori }}</div>
                    <div><strong>Status Aset:</strong> {{ $item->status_aset }}</div>
                    <div><strong>Nilai Aset:</strong> {{ $item->nilai_aset ? 'Rp '.number_format($item->nilai_aset,0,',','.') : '-' }}</div>
                    <div><strong>Tahun Perolehan:</strong> {{ $item->tahun_perolehan ?? '-' }}</div>
                </div>

                <div>
                    <strong>Deskripsi:</strong>
                    <p>{{ $item->deskripsi ?? '-' }}</p>
                </div>

                <div>
                    <strong>Dokumen IDs:</strong>
                    <p>{{ $item->dokumen_ids ? implode(', ', json_decode($item->dokumen_ids)) : '-' }}</p>
                </div>

                <div class="flex justify-end gap-2">
                    <a href="{{ route('aset-keluarga.index') }}" class="px-4 py-2 bg-gray-300 rounded-md hover:bg-gray-400">Kembali</a>
                    <a href="{{ route('aset-keluarga.edit', $item->id) }}" class="px-4 py-2 bg-yellow-600 text-white rounded-md hover:bg-yellow-700">Edit</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
