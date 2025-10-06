<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Sarana Prasarana Kerja') }}
        </h2>
    </x-slot>

    <style>
        .grid-container {
            display: grid;
            grid-template-columns: auto auto auto;
            gap: 10px;
            padding: 10px;
        }
        .grid-container > div {
            background-color: #f1f1f1;
            color: #000;
            padding: 10px;
            font-size: 30px;
            text-align: center;
        }
    </style>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="mb-4">Edit Data Sarana Prasarana Kerja</h2>

                    <form action="{{ route('sarpras-kerja.update', $item->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- Pilih User --}}
                        <div class="mb-3">
                            <label for="user_id" class="form-label">Pilih User</label>
                            <select name="user_id" id="user_id" class="form-control" required>
                                <option value="">-- Pilih User --</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ $item->user_id == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>


                            <div class="md:col-span-2">
                            <!-- Row 1 -->
                            <div>
                                <label for="mesin_kerja" class="block text-sm font-medium text-gray-700">Memiliki mesin kerja :</label>
                                <select name="mesin_kerja" id="mesin_kerja" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya" {{ $item->mesin_kerja == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ $item->mesin_kerja == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                </select>
                            </div>

                            <!-- Row 2 -->
                            <div>
                                <label for="komputer_kerja" class="block text-sm font-medium text-gray-700">Memiliki komputer kerja :</label>
                                <select name="komputer_kerja" id="komputer_kerja" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya" {{ $item->komputer_kerja == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ $item->komputer_kerja == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                </select>
                            </div>
                            <div></div>

                            <!-- Row 3 -->
                            <div>
                                <label for="meja_kantor" class="block text-sm font-medium text-gray-700">Memiliki meja kantor :</label>
                                <select name="meja_kantor" id="meja_kantor" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya" {{ $item->meja_kantor == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ $item->meja_kantor == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                </select>
                            </div>
                            <div></div>

                            <!-- Row 4 -->
                            <div>
                                <label for="kursi_kantor" class="block text-sm font-medium text-gray-700">Memiliki kursi kantor :</label>
                                <select name="kursi_kantor" id="kursi_kantor" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya" {{ $item->kursi_kantor == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ $item->kursi_kantor == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                </select>
                            </div>
                            <div></div>

                            <!-- Row 5 -->
                            <div>
                                <label for="mobil_operasional" class="block text-sm font-medium text-gray-700">Memiliki mobil operasional :</label>
                                <select name="mobil_operasional" id="mobil_operasional" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya" {{ $item->mobil_operasional == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ $item->mobil_operasional == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                </select>
                            </div>
                            <div></div>

                            <!-- Row 6 -->
                            <div>
                                <label for="sepeda_motor_kerja" class="block text-sm font-medium text-gray-700">Memiliki sepeda motor kerja :</label>
                                <select name="sepeda_motor_kerja" id="sepeda_motor_kerja" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya" {{ $item->sepeda_motor_kerja == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ $item->sepeda_motor_kerja == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                </select>
                            <div></div>

                            <!-- Row 7 -->
                            <div>
                                <label for="alat_berat" class="block text-sm font-medium text-gray-700">Memiliki alat berat :</label>
                                <select name="alat_berat" id="alat_berat" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya" {{ $item->alat_berat == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ $item->alat_berat == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                </select>
                            </div>
                            <div></div>

                            <!-- Row 8 -->
                            <div>
                                <label for="internet_kerja" class="block text-sm font-medium text-gray-700">Memiliki internet kerja :</label>
                                <select name="internet_kerja" id="internet_kerja" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya" {{ $item->internet_kerja == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ $item->internet_kerja == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                </select>
                            <div></div>

                            <!-- Row 9 -->
                            <div>
                                <label for="printer_scanner" class="block text-sm font-medium text-gray-700">Memiliki printer/scanner :</label>
                                <select name="printer_scanner" id="printer_scanner" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya" {{ $item->printer_scanner == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ $item->printer_scanner == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                </select>
                            </div>
                            <div></div>

                            <!-- Row 10 -->
                            <div>
                                <label for="telepon_kantor" class="block text-sm font-medium text-gray-700">Memiliki telepon kantor :</label>
                                <select name="telepon_kantor" id="telepon_kantor" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya" {{ $item->telepon_kantor == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ $item->telepon_kantor == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                </select>
                            </div>
                            <div></div>
                        </div>

                                                <!-- Tombol -->
                        <div class="mt-6 flex gap-3">
                            <button type="submit" class="bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">Update</button>
                            <a href="{{ route('sarpras-kerja.index') }}" class="bg-gray-500 text-white font-bold py-2 px-4 rounded hover:bg-gray-600">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
