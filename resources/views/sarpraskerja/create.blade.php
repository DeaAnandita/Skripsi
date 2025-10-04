<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Sarana Prasarana Kerja') }}
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

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold mb-4">PENDATAAN SARANA PRASARANA KERJA</h2>
                    <form method="POST" action="{{ route('sarpraskerja.store') }}">
                        @csrf
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Surveyor</label>
                            <select name="user_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                <option value="">-- Pilih Surveyor --</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="grid-container gap-4">
                            <!-- Row 1 -->
                            <div>
                                <label for="mesin_kerja" class="block text-sm font-medium text-gray-700">Memiliki mesin kerja :</label>
                                <select name="mesin_kerja" id="mesin_kerja" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                            
                            <!-- Row 2 -->
                            <div>
                                <label for="komputer_kerja" class="block text-sm font-medium text-gray-700">Memiliki komputer kerja :</label>
                                <select name="komputer_kerja" id="komputer_kerja" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                            

                            <!-- Row 3 -->
                            <div>
                                <label for="meja_kantor" class="block text-sm font-medium text-gray-700">Memiliki meja kantor :</label>
                                <select name="meja_kantor" id="meja_kantor" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                           
                           

                            <!-- Row 4 -->
                            <div>
                                <label for="kursi_kantor" class="block text-sm font-medium text-gray-700">Memiliki kursi kantor :</label>
                                <select name="kursi_kantor" id="kursi_kantor" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                            

                            <!-- Row 5 -->
                            <div>
                                <label for="mobil_operasional" class="block text-sm font-medium text-gray-700">Memiliki mobil operasional :</label>
                                <select name="mobil_operasional" id="mobil_operasional" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                            

                            <!-- Row 6 -->
                            <div>
                                <label for="sepeda_motor_kerja" class="block text-sm font-medium text-gray-700">Memiliki sepeda motor kerja :</label>
                                <select name="sepeda_motor_kerja" id="sepeda_motor_kerja" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                           

                            <!-- Row 7 -->
                            <div>
                                <label for="alat_berat" class="block text-sm font-medium text-gray-700">Memiliki alat berat :</label>
                                <select name="alat_berat" id="alat_berat" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                           

                            <!-- Row 8 -->
                            <div>
                                <label for="internet_kerja" class="block text-sm font-medium text-gray-700">Memiliki internet kerja :</label>
                                <select name="internet_kerja" id="internet_kerja" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                            

                            <!-- Row 9 -->
                            <div>
                                <label for="printer_scanner" class="block text-sm font-medium text-gray-700">Memiliki printer/scanner :</label>
                                <select name="printer_scanner" id="printer_scanner" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                            

                            <!-- Row 10 -->
                            <div>
                                <label for="telepon_kantor" class="block text-sm font-medium text-gray-700">Memiliki telepon kantor :</label>
                                <select name="telepon_kantor" id="telepon_kantor" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                            
                        </div>
                        <button type="submit" class="mt-6 w-full bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-green-600">KIRIM</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>