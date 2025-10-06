<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Data Layanan Masyarakat') }}
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

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold mb-4">EDIT DATA LAYANAN MASYARAKAT</h2>

                    <form method="POST" action="{{ route('layanan-masyarakat.update', $item->id) }}">
                        @csrf
                        @method('PUT')

                        <!-- Surveyor -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Surveyor</label>
                            <input type="text" value="{{ auth()->user()->name }}" readonly
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm bg-gray-100 text-gray-700">
                            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <!-- Pengurus RT -->
                            <div>
                                <label for="Pengurus_RT" class="block text-sm font-medium text-gray-700">Pengurus RT</label>
                                <select name="Pengurus_RT" id="Pengurus_RT" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">-- Silahkan Pilih --</option>
                                    <option value="Ya" {{ old('Pengurus_RT', $item->Pengurus_RT) == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ old('Pengurus_RT', $item->Pengurus_RT) == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                    <option value="Lainnya" {{ old('Pengurus_RT', $item->Pengurus_RT) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>

                            <!-- Anggota Pengurus RT -->
                            <div>
                                <label for="Anggota_Pengurus_RT" class="block text-sm font-medium text-gray-700">Anggota Pengurus RT</label>
                                <select name="Anggota_Pengurus_RT" id="Anggota_Pengurus_RT" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">-- Silahkan Pilih --</option>
                                    <option value="Ya" {{ old('Anggota_Pengurus_RT', $item->Anggota_Pengurus_RT) == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ old('Anggota_Pengurus_RT', $item->Anggota_Pengurus_RT) == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                    <option value="Lainnya" {{ old('Anggota_Pengurus_RT', $item->Anggota_Pengurus_RT) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>

                            <!-- Pengurus RW -->
                            <div>
                                <label for="Pengurus_RW" class="block text-sm font-medium text-gray-700">Pengurus RW</label>
                                <select name="Pengurus_RW" id="Pengurus_RW" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">-- Silahkan Pilih --</option>
                                    <option value="Ya" {{ old('Pengurus_RW', $item->Pengurus_RW) == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ old('Pengurus_RW', $item->Pengurus_RW) == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                    <option value="Lainnya" {{ old('Pengurus_RW', $item->Pengurus_RW) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>

                            <!-- Anggota Pengurus RW -->
                            <div>
                                <label for="Anggota_Pengurus_RW" class="block text-sm font-medium text-gray-700">Anggota Pengurus RW</label>
                                <select name="Anggota_Pengurus_RW" id="Anggota_Pengurus_RW" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">-- Silahkan Pilih --</option>
                                    <option value="Ya" {{ old('Anggota_Pengurus_RW', $item->Anggota_Pengurus_RW) == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ old('Anggota_Pengurus_RW', $item->Anggota_Pengurus_RW) == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                    <option value="Lainnya" {{ old('Anggota_Pengurus_RW', $item->Anggota_Pengurus_RW) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>

                            <!-- Pengurus LKMD/K/LPM -->
                            <div>
                                <label for="Pengurus_LKMD_K_LPM" class="block text-sm font-medium text-gray-700">Pengurus LKMD/K/LPM</label>
                                <select name="Pengurus_LKMD_K_LPM" id="Pengurus_LKMD_K_LPM" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">-- Silahkan Pilih --</option>
                                    <option value="Ya" {{ old('Pengurus_LKMD_K_LPM', $item->Pengurus_LKMD_K_LPM) == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ old('Pengurus_LKMD_K_LPM', $item->Pengurus_LKMD_K_LPM) == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                    <option value="Lainnya" {{ old('Pengurus_LKMD_K_LPM', $item->Pengurus_LKMD_K_LPM) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>

                            <!-- Anggota LKMD/K/LPM -->
                            <div>
                                <label for="Anggota_LKMD_K_LPM" class="block text-sm font-medium text-gray-700">Anggota LKMD/K/LPM</label>
                                <select name="Anggota_LKMD_K_LPM" id="Anggota_LKMD_K_LPM" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">-- Silahkan Pilih --</option>
                                    <option value="Ya" {{ old('Anggota_LKMD_K_LPM', $item->Anggota_LKMD_K_LPM) == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ old('Anggota_LKMD_K_LPM', $item->Anggota_LKMD_K_LPM) == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                    <option value="Lainnya" {{ old('Anggota_LKMD_K_LPM', $item->Anggota_LKMD_K_LPM) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>

                            <!-- Pengurus PKK -->
                            <div>
                                <label for="Pengurus_PKK" class="block text-sm font-medium text-gray-700">Pengurus PKK</label>
                                <select name="Pengurus_PKK" id="Pengurus_PKK" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">-- Silahkan Pilih --</option>
                                    <option value="Ya" {{ old('Pengurus_PKK', $item->Pengurus_PKK) == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ old('Pengurus_PKK', $item->Pengurus_PKK) == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                    <option value="Lainnya" {{ old('Pengurus_PKK', $item->Pengurus_PKK) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>

                            <!-- Anggota PKK -->
                            <div>
                                <label for="Anggota_PKK" class="block text-sm font-medium text-gray-700">Anggota PKK</label>
                                <select name="Anggota_PKK" id="Anggota_PKK" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">-- Silahkan Pilih --</option>
                                    <option value="Ya" {{ old('Anggota_PKK', $item->Anggota_PKK) == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ old('Anggota_PKK', $item->Anggota_PKK) == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                    <option value="Lainnya" {{ old('Anggota_PKK', $item->Anggota_PKK) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>

                            <!-- Pengurus Lembaga Adat -->
                            <div>
                                <label for="Pengurus_Lembaga_Adat" class="block text-sm font-medium text-gray-700">Pengurus Lembaga Adat</label>
                                <select name="Pengurus_Lembaga_Adat" id="Pengurus_Lembaga_Adat" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">-- Silahkan Pilih --</option>
                                    <option value="Ya" {{ old('Pengurus_Lembaga_Adat', $item->Pengurus_Lembaga_Adat) == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ old('Pengurus_Lembaga_Adat', $item->Pengurus_Lembaga_Adat) == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                    <option value="Lainnya" {{ old('Pengurus_Lembaga_Adat', $item->Pengurus_Lembaga_Adat) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>

                            <!-- Anggota Lembaga Adat -->
                            <div>
                                <label for="Anggota_Lembaga_Adat" class="block text-sm font-medium text-gray-700">Anggota Lembaga Adat</label>
                                <select name="Anggota_Lembaga_Adat" id="Anggota_Lembaga_Adat" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">-- Silahkan Pilih --</option>
                                    <option value="Ya" {{ old('Anggota_Lembaga_Adat', $item->Anggota_Lembaga_Adat) == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ old('Anggota_Lembaga_Adat', $item->Anggota_Lembaga_Adat) == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                    <option value="Lainnya" {{ old('Anggota_Lembaga_Adat', $item->Anggota_Lembaga_Adat) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>
                        </div>

                        <!-- Tombol -->
                        <div class="mt-6 flex gap-3">
                            <button type="submit" class="bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">Update</button>
                            <a href="{{ route('layanan-masyarakat.index') }}" class="bg-gray-500 text-white font-bold py-2 px-4 rounded hover:bg-gray-600">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>