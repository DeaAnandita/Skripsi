<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah / Edit Aset Lahan & Tanah') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($errors->any())
                <div class="mb-4 p-4 rounded-md bg-red-100 text-red-800">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ isset($item) ? route('aset-lahan.update', $item->id) : route('aset-lahan.store') }}" method="POST">
                        @csrf
                        @if(isset($item)) @method('PUT') @endif

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">



                            {{-- User --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700">User</label>
                                <select name="user_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    <option value="">-- Pilih User --</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" {{ (old('user_id', $item->user_id ?? '') == $user->id) ? 'selected' : '' }}>
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Kode Lahan --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Kode Lahan</label>
                                <input type="text" name="kode_lahan" value="{{ old('kode_lahan', $item->kode_lahan ?? '') }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            {{-- Nama Lahan --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Nama Lahan</label>
                                <input type="text" name="nama_lahan" value="{{ old('nama_lahan', $item->nama_lahan ?? '') }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            {{-- Luas --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Luas</label>
                                <div class="flex gap-2">
                                    <input type="number" step="0.01" name="luas_m2" value="{{ old('luas_m2', $item->luas_m2 ?? '') }}"
                                        class="mt-1 block w-2/3 border-gray-300 rounded-md shadow-sm">
                                    <select name="satuan" class="mt-1 w-1/3 border-gray-300 rounded-md shadow-sm">
                                        <option value="m2" {{ old('satuan', $item->satuan ?? '')=='m2' ? 'selected' : '' }}>m2</option>
                                        <option value="ha" {{ old('satuan', $item->satuan ?? '')=='ha' ? 'selected' : '' }}>ha</option>
                                    </select>
                                </div>
                            </div>

                            {{-- RT/RW --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700">RT/RW</label>
                                <input type="text" name="rt_rw" value="{{ old('rt_rw', $item->rt_rw ?? '') }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            {{-- Desa --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Desa</label>
                                <input type="text" name="desa" value="{{ old('desa', $item->desa ?? '') }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            {{-- Kecamatan --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Kecamatan</label>
                                <input type="text" name="kecamatan" value="{{ old('kecamatan', $item->kecamatan ?? '') }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            {{-- Kabupaten --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Kabupaten</label>
                                <input type="text" name="kabupaten" value="{{ old('kabupaten', $item->kabupaten ?? '') }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            {{-- Provinsi --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Provinsi</label>
                                <input type="text" name="provinsi" value="{{ old('provinsi', $item->provinsi ?? '') }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            {{-- Status --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Status</label>
                                <select name="status" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    @foreach(['Kosong','Digunakan','Disewa','Sengketa','Terdaftar'] as $status)
                                        <option value="{{ $status }}" {{ old('status', $item->status ?? '')==$status ? 'selected' : '' }}>
                                            {{ $status }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Kepemilikan --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Kepemilikan</label>
                                <select name="kepemilikan" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    <option value="">-- Pilih --</option>
                                    @foreach(['Milik Pribadi','Milik Desa','Sewa','Pinjam Pakai'] as $kep)
                                        <option value="{{ $kep }}" {{ old('kepemilikan', $item->kepemilikan ?? '')==$kep ? 'selected' : '' }}>
                                            {{ $kep }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Nomor Sertifikat --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Nomor Sertifikat</label>
                                <input type="text" name="nomor_sertifikat" value="{{ old('nomor_sertifikat', $item->nomor_sertifikat ?? '') }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            {{-- Harga Sewa --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Harga Sewa (Rp)</label>
                                <input type="number" step="0.01" name="harga_sewa_bulanan" value="{{ old('harga_sewa_bulanan', $item->harga_sewa_bulanan ?? '') }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            {{-- Irigasi --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Irigasi</label>
                                <select name="irigasi" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    <option value="0" {{ old('irigasi', $item->irigasi ?? 0)==0 ? 'selected' : '' }}>Tidak</option>
                                    <option value="1" {{ old('irigasi', $item->irigasi ?? 0)==1 ? 'selected' : '' }}>Ya</option>
                                </select>
                            </div>

                            {{-- Soil Type --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Soil Type</label>
                                <select name="soil_type" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    <option value="">-- Pilih --</option>
                                    @foreach(['Latosol','Alluvial','Regosol','Podsolik','Lainnya'] as $soil)
                                        <option value="{{ $soil }}" {{ old('soil_type', $item->soil_type ?? '')==$soil ? 'selected' : '' }}>
                                            {{ $soil }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Slope % --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Slope (%)</label>
                                <input type="number" step="0.01" name="slope_percent" value="{{ old('slope_percent', $item->slope_percent ?? '') }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            {{-- Jarak Pasar --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Jarak Pasar (km)</label>
                                <input type="number" step="0.01" name="jarak_pasar_km" value="{{ old('jarak_pasar_km', $item->jarak_pasar_km ?? '') }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            {{-- Akses Jalan --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Akses Jalan</label>
                                <select name="akses_jalan" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    @foreach(['Aspal','Tanah','No Access'] as $jalan)
                                        <option value="{{ $jalan }}" {{ old('akses_jalan', $item->akses_jalan ?? '')==$jalan ? 'selected' : '' }}>
                                            {{ $jalan }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Previous Planting --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Previous Planting</label>
                                <input type="text" name="previous_planting" value="{{ old('previous_planting', $item->previous_planting ?? '') }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            {{-- Notes (full row) --}}
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700">Notes</label>
                                <textarea name="notes" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" rows="3">{{ old('notes', $item->notes ?? '') }}</textarea>
                            </div>

                        </div> {{-- grid --}}

                        <div class="mt-6 flex justify-end gap-2">
                            <a href="{{ route('aset-lahan.index') }}" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Batal</a>
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                                {{ isset($item) ? 'Update' : 'Simpan' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
