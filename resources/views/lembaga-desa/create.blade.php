<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Lembaga Desa') }}
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

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold mb-4">PENDATAAN LEMBAGA DESA</h2>

                    <form method="POST" action="{{ route('lembaga-desa.store') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="nama_lembaga" class="block text-sm font-medium text-gray-700">Jenis Lembaga</label>
                            <select name="nama_lembaga" id="nama_lembaga" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                <option value="Pemerintah Desa">Pemerintah Desa</option>
                                <option value="BPD">Badan Permusyawaratan Desa (BPD)</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="dusun" class="block text-sm font-medium text-gray-700">Dusun/Lingkungan</label>
                            <input type="text" name="dusun" id="dusun" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="Opsional, misal: Dusun A">
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Struktur Jabatan</label>
                            <div class="mt-2 space-y-2">
                                <div>
                                    <label class="flex items-center">
                                        <input type="checkbox" name="struktur_jabatan[Kepala Desa]" value="1" class="mr-2">
                                        Kepala Desa (Ya)
                                    </label>
                                </div>
                                <div>
                                    <label class="flex items-center">
                                        <input type="checkbox" name="struktur_jabatan[Sekretaris Desa]" value="1" class="mr-2">
                                        Sekretaris Desa (Ya)
                                    </label>
                                </div>
                                <div>
                                    <label class="flex items-center">
                                        <input type="checkbox" name="struktur_jabatan[Kaur Keuangan]" value="1" class="mr-2">
                                        Kaur Keuangan (Ya)
                                    </label>
                                </div>
                                <div>
                                    <label class="flex items-center">
                                        <input type="checkbox" name="struktur_jabatan[Kepala Dusun]" value="1" class="mr-2">
                                        Kepala Dusun (Ya)
                                    </label>
                                </div>
                                <div>
                                    <label class="flex items-center">
                                        <input type="checkbox" name="struktur_jabatan[Ketua BPD]" value="1" class="mr-2">
                                        Ketua BPD (Ya)
                                    </label>
                                </div>
                            </div>
                            <p class="mt-1 text-sm text-gray-500">Centang untuk "Ya", jika tidak ada centang dianggap "Tidak" atau "Lainnya".</p>
                        </div>

                        <div class="mb-4">
                            <label for="keterangan" class="block text-sm font-medium text-gray-700">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="Opsional, tambahkan detail tambahan"></textarea>
                        </div>

                        <button type="submit" class="mt-6 w-full bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">
                            Simpan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>