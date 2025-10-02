<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Layanan Masyarakat') }}
        </h2>
    </x-slot>

    @if ($errors->any())
        <div class="mb-4 p-4 rounded-md bg-red-100 text-red-800">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold mb-6">FORM INPUT LAYANAN MASYARAKAT</h2>

                    <form method="POST" action="{{ route('layananmasyarakat.store')}}">
                        @csrf

                        {{-- Surveyor --}}
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Surveyor</label>
                            <select name="user_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                <option value="">-- Pilih Surveyor --</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Data Layanan Kependudukan --}}
                        <h3 class="text-lg font-semibold mt-6 mb-2">Layanan Kependudukan</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="flex items-center">
                                    <input type="checkbox" name="layanan_ktp" value="1" class="mr-2"> KTP
                                </label>
                                <input type="text" name="layanan_ktp_lainnya" placeholder="Keterangan lain"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>
                            <div>
                                <label class="flex items-center">
                                    <input type="checkbox" name="layanan_kk" value="1" class="mr-2"> Kartu Keluarga
                                </label>
                                <input type="text" name="layanan_kk_lainnya" placeholder="Keterangan lain"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>
                            <div>
                                <label class="flex items-center">
                                    <input type="checkbox" name="layanan_akta_kelahiran" value="1" class="mr-2"> Akta Kelahiran
                                </label>
                                <input type="text" name="layanan_akta_kelahiran_lainnya" placeholder="Keterangan lain"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>
                            <div>
                                <label class="flex items-center">
                                    <input type="checkbox" name="layanan_akta_kematian" value="1" class="mr-2"> Akta Kematian
                                </label>
                                <input type="text" name="layanan_akta_kematian_lainnya" placeholder="Keterangan lain"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>
                        </div>

                        {{-- Data Layanan Lainnya (contoh BPJS, Pendidikan, dll.) --}}
                        <h3 class="text-lg font-semibold mt-6 mb-2">Layanan Sosial & Kesehatan</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="flex items-center">
                                    <input type="checkbox" name="layanan_bpjs_kesehatan" value="1" class="mr-2"> BPJS Kesehatan
                                </label>
                                <input type="text" name="layanan_bpjs_kesehatan_lainnya" placeholder="Keterangan lain"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>
                            <div>
                                <label class="flex items-center">
                                    <input type="checkbox" name="layanan_bpjs_ketenagakerjaan" value="1" class="mr-2"> BPJS Ketenagakerjaan
                                </label>
                                <input type="text" name="layanan_bpjs_ketenagakerjaan_lainnya" placeholder="Keterangan lain"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>
                            <div>
                                <label class="flex items-center">
                                    <input type="checkbox" name="layanan_bantuan_pendidikan" value="1" class="mr-2"> Bantuan Pendidikan
                                </label>
                                <input type="text" name="layanan_bantuan_pendidikan_lainnya" placeholder="Keterangan lain"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>
                            <div>
                                <label class="flex items-center">
                                    <input type="checkbox" name="layanan_bantuan_kesehatan" value="1" class="mr-2"> Bantuan Kesehatan
                                </label>
                                <input type="text" name="layanan_bantuan_kesehatan_lainnya" placeholder="Keterangan lain"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>
                        </div>

                        {{-- Status Pengajuan --}}
                        <div class="mt-6 mb-4">
                            <label class="block text-sm font-medium text-gray-700">Status Pengajuan</label>
                            <select name="status_pengajuan" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                <option value="">-- Pilih Status --</option>
                                <option value="pending">Pending</option>
                                <option value="proses">Proses</option>
                                <option value="selesai">Selesai</option>
                                <option value="ditolak">Ditolak</option>
                            </select>
                        </div>

                        {{-- Deskripsi --}}
                        <div class="mb-4">
                            <label for="deskripsi_lengkap" class="block text-sm font-medium text-gray-700">Deskripsi Lengkap</label>
                            <textarea name="deskripsi_lengkap" id="deskripsi_lengkap" rows="3"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
                        </div>

                        {{-- Tanggal --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                            <div>
                                <label for="tanggal_pengajuan" class="block text-sm font-medium text-gray-700">Tanggal Pengajuan</label>
                                <input type="date" name="tanggal_pengajuan" id="tanggal_pengajuan"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            </div>
                            <div>
                                <label for="tanggal_selesai" class="block text-sm font-medium text-gray-700">Tanggal Selesai</label>
                                <input type="date" name="tanggal_selesai" id="tanggal_selesai"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            </div>
                        </div>

                        <button type="submit"
                            class="mt-6 w-full bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-green-600">
                            SIMPAN
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
