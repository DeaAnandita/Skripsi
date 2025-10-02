<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Usaha ART') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold mb-4">Detail Usaha ART</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm font-medium text-gray-700">User</p>
                            <p class="mt-1 text-gray-900">{{ $item->user->name ?? '-' }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-700">Lapangan Usaha</p>
                            <p class="mt-1 text-gray-900">{{ $item->lapangan_usaha }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-700">Omset per Bulan</p>
                            <p class="mt-1 text-gray-900">{{ $item->omset_per_bulan }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-700">Pendapatan per Bulan</p>
                            <p class="mt-1 text-gray-900">{{ $item->pendapatan_per_bulan }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-700">Jumlah Pekerja</p>
                            <p class="mt-1 text-gray-900">{{ $item->jumlah_pekerja }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-700">Status Kedudukan Kerja</p>
                            <p class="mt-1 text-gray-900">{{ $item->status_kedudukan_kerja }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-700">Dokumen Usaha</p>
                            <p class="mt-1 text-gray-900">
                                @if($item->dokumen_usaha)
                                    <a href="{{ Storage::url($item->dokumen_usaha) }}" target="_blank" class="text-blue-600 hover:underline">Lihat dokumen</a>
                                @else
                                    Tidak ada dokumen
                                @endif
                            </p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-700">Status Verifikasi</p>
                            <p class="mt-1 text-gray-900">
                                <span class="px-2 py-1 rounded text-xs
                                    {{ $item->status_verifikasi == 'verified' ? 'bg-green-100 text-green-800' : 
                                       ($item->status_verifikasi == 'rejected' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                                    {{ $item->status_verifikasi }}
                                </span>
                            </p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-700">Surveyor</p>
                            <p class="mt-1 text-gray-900">{{ $item->surveyor->name ?? '-' }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-700">Tanggal Dibuat</p>
                            <p class="mt-1 text-gray-900">{{ $item->created_at->format('d-m-Y H:i') }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-700">Tanggal Diupdate</p>
                            <p class="mt-1 text-gray-900">{{ $item->updated_at->format('d-m-Y H:i') }}</p>
                        </div>
                    </div>
                    <div class="mt-6 flex gap-4">
                        <a href="{{ route('usaha-art.edit', $item->id) }}"
                           class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</a>
                        <form action="{{ route('usaha-art.destroy', $item->id) }}" method="POST"
                              onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

