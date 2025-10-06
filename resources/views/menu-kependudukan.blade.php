<x-app-layout>
<<<<<<< Updated upstream
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Menu Kependudukan') }}
        </h2>
    </x-slot>
=======
    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
            @php
                $categories = [
                    'Data Keluarga' => [
                        ['title' => 'Data Dasar Keluarga', 'color' => 'blue', 'desc' => 'Kelola data dasar keluarga', 'route' => 'dasar-keluarga.index'],
                        ['title' => 'Anggota Keluarga', 'color' => 'green', 'desc' => 'Kelola data anggota keluarga', 'route' => 'anggota-keluarga.index'],
                        ['title' => 'Bangun Keluarga', 'color' => 'blue', 'desc' => 'Kelola data bangun keluarga', 'route' => 'bangun-keluarga.index'],
                        ['title' => 'Kesejahteraan Keluarga', 'color' => 'green', 'desc' => 'Kelola data kesejahteraan keluarga', 'route' => 'kesejahteraan-keluarga.index'],
                    ],
                    'Aset & Ekonomi' => [
                        ['title' => 'Aset Keluarga', 'color' => 'blue', 'desc' => 'Kelola data aset keluarga', 'route' => 'aset-keluarga.index'],
                        ['title' => 'Aset Lahan & Tanah', 'color' => 'green', 'desc' => 'Kelola data aset lahan dan tanah', 'route' => 'aset-lahan.index'],
                        ['title' => 'Aset Ternak & Perikanan', 'color' => 'blue', 'desc' => 'Kelola data aset ternak & perikanan', 'route' => 'aset-ternak.index'],
                        ['title' => 'Penyewaan Lahan', 'color' => 'green', 'desc' => 'Kelola data penyewaan lahan ternak & perikanan', 'route' => 'penyewaan-lahan.index'],
                        ['title' => 'UMKM', 'color' => 'blue', 'desc' => 'Kelola data UMKM', 'route' => 'umkm.index'],
                        ['title' => 'Layanan Ekonomi', 'color' => 'green', 'desc' => 'Kelola data layanan ekonomi', 'route' => 'umkm.index'],
                        ['title' => 'Sarana & Prasarana Kerja', 'color' => 'blue', 'desc' => 'Kelola data sarpras kerja', 'route' => 'sarpras-kerja.index'],
                        ['title' => 'Usaha ART', 'color' => 'green', 'desc' => 'Kelola data usaha anggota rumah tangga', 'route' => 'usaha-art.index'],
                    ],
                    'Pelayanan & Sosial' => [
                        ['title' => 'Layanan Masyarakat', 'color' => 'blue', 'desc' => 'Kelola data layanan masyarakat', 'route' => 'layanan-masyarakat.index'],
                        ['title' => 'Lembaga Desa', 'color' => 'blue', 'desc' => 'Kelola data lembaga desa', 'route' => 'lembaga-desa.index'],
                        ['title' => 'Bantuan Sosial', 'color' => 'green', 'desc' => 'Kelola data bantuan sosial', 'route' => 'bantuan-sosial.index'],
                        ['title' => 'Konflik Sosial', 'color' => 'blue', 'desc' => 'Kelola data konflik sosial', 'route' => 'konflik-sosial.index'],
                        ['title' => 'Sosial Ekonomi', 'color' => 'green', 'desc' => 'Kelola data sosial ekonomi', 'route' => 'sosial-ekonomi.index'],
                    ],
                    'Kesehatan' => [
                        ['title' => 'Kualitas Ibu Hamil', 'color' => 'blue', 'desc' => 'Kelola data ibu hamil', 'route' => 'ibu-hamil.index'],
                        ['title' => 'Kualitas Bayi', 'color' => 'green', 'desc' => 'Kelola data bayi', 'route' => 'bayi.index'],
                        ['title' => 'Kelahiran', 'color' => 'blue', 'desc' => 'Kelola data kelahiran', 'route' => 'kelahiran.index'],
                    ],
                ];
            @endphp
>>>>>>> Stashed changes

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-4 lg:px-8">
            <div class="bg-white overfl ow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Data Dasar Keluarga -->
                    <a href="{{ route('aset-keluarga.index') }}"
                       class="p-6 bg-blue-100 rounded-2xl shadow hover:bg-blue-200 transition">
                        <h4 class="text-xl font-bold text-blue-800 mb-2">Data Dasar Keluarga</h4>
                        <p class="text-gray-700">Kelola Data Dasar Keluarga</p>
                    </a>

                    <!-- Prasarana Dasar -->
                    <a href="{{ route('aset-lahan.index') }}"
                       class="p-6 bg-green-100 rounded-2xl shadow hover:bg-green-200 transition">
                        <h4 class="text-xl font-bold text-green-800 mb-2">Prasarana Dasar</h4>
                        <p class="text-gray-700">Kelola data Prasarana Dasar</p>
                    </a>

                    <!-- Aset Keluarga -->
                    <a href="{{ route('aset-keluarga.index') }}"
                       class="p-6 bg-blue-100 rounded-2xl shadow hover:bg-blue-200 transition">
                        <h4 class="text-xl font-bold text-blue-800 mb-2">Aset Keluarga</h4>
                        <p class="text-gray-700">Kelola data Aset Keluarga</p>
                    </a>

                    <!-- Aset Lahan & Tanah -->
                    <a href="{{ route('aset-lahan.index') }}"
                       class="p-6 bg-green-100 rounded-2xl shadow hover:bg-green-200 transition">
                        <h4 class="text-xl font-bold text-blue-800 mb-2">Aset Lahan dan Tanah</h4>
                        <p class="text-gray-700">Kelola data Aset Lahan dan Tanah</p>
                    </a>

                    <!-- Aset Ternak -->
                    <a href="{{ route('kesejahteraankeluarga.index') }}"
                       class="p-6 bg-blue-100 rounded-2xl shadow hover:bg-blue-200 transition">
                        <h4 class="text-xl font-bold text-blue-800 mb-2">Aset Ternak</h4>
                        <p class="text-gray-700">Kelola data Aset Ternak</p>
                    </a>

                    <!-- Kesejahteraan Keluarga -->
                    <a href="{{ route('kesejahteraankeluarga.index') }}"
                       class="p-6 bg-blue-100 rounded-2xl shadow hover:bg-blue-200 transition">
                        <h4 class="text-xl font-bold text-blue-800 mb-2">Kesejahteraan Keluarga</h4>
                        <p class="text-gray-700">Kelola data kesejahteraan keluarga</p>


                    <!-- Sarpras Kerja -->
                    <a href="{{ route('sarpraskerja.index') }}"
                       class="p-6 bg-blue-100 rounded-2xl shadow hover:bg-blue-200 transition">
                        <h4 class="text-xl font-bold text-blue-800 mb-2">Sarpras kerja</h4>
                        <p class="text-gray-700">Kelola data Sarpras Kerja</p>
                    </a>


                    <!-- umkm -->
                    <a href="{{ route('umkm.index') }}"
                       class="p-6 bg-blue-100 rounded-2xl shadow hover:bg-blue-200 transition">
                        <h4 class="text-xl font-bold text-blue-800 mb-2">umkm</h4>
                        <p class="text-gray-700">Kelola data umkm</p>



                    <!-- Bantuan Sosial -->
                    <a href="{{ route('bantuan-sosial.index') }}"
                       class="p-6 bg-blue-100 rounded-2xl shadow hover:bg-blue-200 transition">
                        <h4 class="text-xl font-bold text-blue-800 mb-2">Bantuan Sosial</h4>
                        <p class="text-gray-700">Kelola data Bantuan Sosial</p>


                    <!-- Anggota Keluarga -->
                    <a href="{{ route('anggota-keluarga.index') }}"
                       class="p-6 bg-blue-100 rounded-2xl shadow hover:bg-blue-200 transition">
                        <h4 class="text-xl font-bold text-blue-800 mb-2">Anggota Keluarga</h4>
                        <p class="text-gray-700">Kelola Data Anggota Keluarga</p>

                    <!-- Ibu Hamil -->
                    <a href="{{ route('ibu-hamil.index') }}"
                       class="p-6 bg-blue-100 rounded-2xl shadow hover:bg-blue-200 transition">
                        <h4 class="text-xl font-bold text-blue-800 mb-2">Kualitas Ibu Hamil</h4>
                        <p class="text-gray-700">Kelola data kualitas ibu hamil</p>




                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="py-8">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-3 gap-6">

                <!-- Data Dasar Keluarga -->
                <a href="{{ route('aset-keluarga.index') }}"
                   class="p-8 bg-white rounded-xl shadow hover:shadow-lg transition flex flex-col items-center">
                    <h3 class="text-lg font-semibold">Data Dasar Keluarga</h3>
                </a>

                <!-- Prasarana Keluarga -->
                <a href="{{ route('aset-keluarga.index') }}"
                   class="p-8 bg-white rounded-xl shadow hover:shadow-lg transition flex flex-col items-center">
                    <h3 class="text-lg font-semibold">Prasarana Keluarga</h3>
                </a>

                <!-- Aset Keluarga -->
                <a href="{{ route('aset-keluarga.index') }}"
                   class="p-8 bg-white rounded-xl shadow hover:shadow-lg transition flex flex-col items-center">
                    <h3 class="text-lg font-semibold">Aset Keluarga</h3>
                </a>

                <!-- Aset Lahan & Tanah -->
                <a href="{{ route('aset-lahan.index') }}"
                   class="p-8 bg-white rounded-xl shadow hover:shadow-lg transition flex flex-col items-center">
                    <h3 class="text-lg font-semibold">Aset Lahan & Tanah</h3>
                </a>

            </div>
        </div>
    </div> --}}
</x-app-layout>
