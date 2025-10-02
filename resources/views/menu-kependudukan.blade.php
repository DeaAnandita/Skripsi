<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Menu Kependudukan') }}
        </h2>
    </x-slot>

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
                        <h4 class="text-xl font-bold text-green-800 mb-2">Aset Lahan dan Tanah</h4>
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
                       class="p-6 bg-green-100 rounded-2xl shadow hover:bg-green-200 transition">
                        <h4 class="text-xl font-bold text-green-800 mb-2">Kesejahteraan Keluarga</h4>
                        <p class="text-gray-700">Kelola data kesejahteraan keluarga</p>


                    <!-- Sarpras Kerja -->
                    <a href="{{ route('sarpraskerja.index') }}"
                       class="p-6 bg-blue-100 rounded-2xl shadow hover:bg-blue-200 transition">
                        <h4 class="text-xl font-bold text-blue-800 mb-2">Sarpras kerja</h4>
                        <p class="text-gray-700">Kelola data Sarpras Kerja</p>
                    </a>


                    <!-- Layanan Ekonomi -->
                    <a href="{{ route('umkm.index') }}"

                       class="p-6 bg-blue-100 rounded-2xl shadow hover:bg-blue-200 transition">
                        <h4 class="text-xl font-bold text-blue-800 mb-2">Layanan Ekonomi</h4>
                        <p class="text-gray-700">Kelola data Layanan Ekonomi</p>

                    <!-- Layanan Masyarakat -->
                    <a href="{{ route('layananmasyarakat.index') }}"
                       class="p-6 bg-blue-100 rounded-2xl shadow hover:bg-blue-200 transition">
                        <h4 class="text-xl font-bold text-blue-800 mb-2">Layanan Masyarakat</h4>
                        <p class="text-gray-700">Kelola data Layanan Masyarakat</p>


                       class="p-6 bg-green-100 rounded-2xl shadow hover:bg-green-200 transition">
                        <h4 class="text-xl font-bold text-green-800 mb-2">umkm</h4>
                        <p class="text-gray-700">Kelola data umkm</p>




                    <!-- Bantuan Sosial -->
                    <a href="{{ route('bantuan-sosial.index') }}"
                       class="p-6 bg-blue-100 rounded-2xl shadow hover:bg-blue-200 transition">
                        <h4 class="text-xl font-bold text-blue-800 mb-2">Bantuan Sosial</h4>
                        <p class="text-gray-700">Kelola data Bantuan Sosial</p>


                    <!-- Anggota Keluarga -->
                    <a href="{{ route('anggota-keluarga.index') }}"
                       class="p-6 bg-green-100 rounded-2xl shadow hover:bg-green-200 transition">
                        <h4 class="text-xl font-bold text-green-800 mb-2">Anggota Keluarga</h4>
                        <p class="text-gray-700">Kelola Data Anggota Keluarga</p>

                    <!-- Ibu Hamil -->
                    <a href="{{ route('ibu-hamil.index') }}"
                       class="p-6 bg-blue-100 rounded-2xl shadow hover:bg-blue-200 transition">
                        <h4 class="text-xl font-bold text-blue-800 mb-2">Kualitas Ibu Hamil</h4>
                        <p class="text-gray-700">Kelola data kualitas ibu hamil</p>

                    <!-- Usaha Art -->
                    <a href="{{ route('usaha_art.index') }}"
                       class="p-6 bg-blue-100 rounded-2xl shadow hover:bg-blue-200 transition">
                        <h4 class="text-xl font-bold text-blue-800 mb-2">Usaha Art</h4>
                        <p class="text-gray-700">Kelola data usaha art</p>


                    <!-- Sosial Ekonomi -->
                    <a href="{{ route('sosial_ekonomi.index') }}"
                       class="p-6 bg-blue-100 rounded-2xl shadow hover:bg-blue-200 transition">
                        <h4 class="text-xl font-bold text-blue-800 mb-2">Sosial Ekonomi</h4>
                        <p class="text-gray-700">Kelola data sosial ekonomi</p>

                     <!-- Kelahiran -->
                    <a href="{{ route('kelahiran.index') }}"
                       class="p-6 bg-blue-100 rounded-2xl shadow hover:bg-blue-200 transition">
                        <h4 class="text-xl font-bold text-blue-800 mb-2">Kelahiran</h4>
                        <p class="text-gray-700">Kelahiran</p>

                    <!-- Konflik Sosial -->
                    <a href="{{ route('konfliksosial.index') }}"
                       class="p-6 bg-blue-100 rounded-2xl shadow hover:bg-blue-200 transition">
                        <h4 class="text-xl font-bold text-blue-800 mb-2">Konflik Sosial</h4>
                        <p class="text-gray-700">Kelola data Konflik Sosial</p>

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
