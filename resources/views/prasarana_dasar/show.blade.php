<x-app-layout>
    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            
            {{-- Header --}}
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-semibold text-gray-800">Detail Data Prasarana Dasar</h2>
                <a href="{{ route('prasarana.index') }}"
                   class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                    ← Kembali
                </a>
            </div>

            {{-- Card Detail --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="table-auto w-full border-collapse">
                    <tbody class="text-gray-700">
                        <tr><td class="font-semibold py-2 w-1/3">Status Pemilik Bangunan</td><td>: {{ $prasarana->status_pemilik_bangunan }}</td></tr>
                        <tr><td class="font-semibold py-2">Status Pemilik Lahan Bangunan</td><td>: {{ $prasarana->status_pemilik_lahan }}</td></tr>
                        <tr><td class="font-semibold py-2">Jenis Fisik Bangunan</td><td>: {{ $prasarana->jenis_fisik_bangunan }}</td></tr>
                        <tr><td class="font-semibold py-2">Jenis Lantai Bangunan</td><td>: {{ $prasarana->jenis_lantai }}</td></tr>
                        <tr><td class="font-semibold py-2">Kondisi Lantai Bangunan</td><td>: {{ $prasarana->kondisi_lantai }}</td></tr>
                        <tr><td class="font-semibold py-2">Jenis Dinding Bangunan</td><td>: {{ $prasarana->jenis_dinding }}</td></tr>
                        <tr><td class="font-semibold py-2">Kondisi Dinding Bangunan</td><td>: {{ $prasarana->kondisi_dinding }}</td></tr>
                        <tr><td class="font-semibold py-2">Jenis Atap Bangunan</td><td>: {{ $prasarana->jenis_atap }}</td></tr>
                        <tr><td class="font-semibold py-2">Kondisi Atap Bangunan</td><td>: {{ $prasarana->kondisi_atap }}</td></tr>
                        <tr><td class="font-semibold py-2">Sumber Air Minum</td><td>: {{ $prasarana->sumber_air_minum }}</td></tr>
                        <tr><td class="font-semibold py-2">Kondisi Sumber Air Minum</td><td>: {{ $prasarana->kondisi_air_minum }}</td></tr>
                        <tr><td class="font-semibold py-2">Cara Memperoleh Air Minum</td><td>: {{ $prasarana->cara_air_minum }}</td></tr>
                        <tr><td class="font-semibold py-2">Sumber Penerangan Utama</td><td>: {{ $prasarana->sumber_penerangan }}</td></tr>
                        <tr><td class="font-semibold py-2">Sumber Daya Terpasang</td><td>: {{ $prasarana->sumber_daya_terpasang }}</td></tr>
                        <tr><td class="font-semibold py-2">Bahan Bakar Memasak</td><td>: {{ $prasarana->bahan_bakar }}</td></tr>
                        <tr><td class="font-semibold py-2">Penggunaan Fasilitas Tempat BAB</td><td>: {{ $prasarana->fasilitas_bab }}</td></tr>
                        <tr><td class="font-semibold py-2">Tempat Pembuangan Akhir Tinja</td><td>: {{ $prasarana->pembuangan_tinja }}</td></tr>
                        <tr><td class="font-semibold py-2">Cara Pembuangan Akhir Sampah</td><td>: {{ $prasarana->pembuangan_sampah }}</td></tr>
                        <tr><td class="font-semibold py-2">Manfaat Danau/Sungai/Waduk/Situ/Mata Air</td><td>: {{ $prasarana->manfaat_air }}</td></tr>
                        <tr><td class="font-semibold py-2">Luas Lantai (m²)</td><td>: {{ $prasarana->luas_lantai }}</td></tr>
                        <tr><td class="font-semibold py-2">Jumlah Kamar</td><td>: {{ $prasarana->jumlah_kamar }}</td></tr>
                        <tr>
                            <td class="font-semibold py-2">Dibuat Pada</td>
                            <td>: {{ $prasarana->created_at->format('d M Y H:i') }}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold py-2">Terakhir Diperbarui</td>
                            <td>: {{ $prasarana->updated_at->format('d M Y H:i') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>