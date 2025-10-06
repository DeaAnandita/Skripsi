<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Konflik Sosial') }}
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
                    <h2 class="mb-4">Edit Data Konflik Sosial</h2>

                    <form action="{{ route('konflik-sosial.update', $item->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Surveyor -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Surveyor</label>
                            <select name="user_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                <option value="">-- Pilih User --</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ $item->user_id == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="grid-container gap-4">
                            {{-- Konflik Tanah --}}
                            <div>
                                <label for="konflik_tanah" class="block text-sm font-medium text-gray-700">Konflik tanah :</label>
                                <select name="konflik_tanah" id="konflik_tanah" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya" {{ $item->konflik_tanah == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ $item->konflik_tanah == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                </select>
                            </div>

                            {{-- Konflik Pemukiman --}}
                            <div>
                                <label for="konflik_pemukiman" class="block text-sm font-medium text-gray-700">Konflik pemukiman :</label>
                                <select name="konflik_pemukiman" id="konflik_pemukiman" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya" {{ $item->konflik_pemukiman == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ $item->konflik_pemukiman == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                </select>
                            </div>

                            {{-- Konflik Ekonomi --}}
                            <div>
                                <label for="konflik_ekonomi" class="block text-sm font-medium text-gray-700">Konflik ekonomi :</label>
                                <select name="konflik_ekonomi" id="konflik_ekonomi" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya" {{ $item->konflik_ekonomi == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ $item->konflik_ekonomi == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                </select>
                            </div>

                            {{-- Konflik Sosial Budaya --}}
                            <div>
                                <label for="konflik_sosial_budaya" class="block text-sm font-medium text-gray-700">Konflik sosial budaya :</label>
                                <select name="konflik_sosial_budaya" id="konflik_sosial_budaya" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya" {{ $item->konflik_sosial_budaya == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ $item->konflik_sosial_budaya == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                </select>
                            </div>

                            {{-- Konflik Politik --}}
                            <div>
                                <label for="konflik_politik" class="block text-sm font-medium text-gray-700">Konflik politik :</label>
                                <select name="konflik_politik" id="konflik_politik" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya" {{ $item->konflik_politik == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ $item->konflik_politik == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                </select>
                            </div>

                            {{-- Konflik Agraria --}}
                            <div>
                                <label for="konflik_agraria" class="block text-sm font-medium text-gray-700">Konflik agraria :</label>
                                <select name="konflik_agraria" id="konflik_agraria" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya" {{ $item->konflik_agraria == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ $item->konflik_agraria == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                </select>
                            </div>

                            {{-- Konflik Lingkungan --}}
                            <div>
                                <label for="konflik_lingkungan" class="block text-sm font-medium text-gray-700">Konflik lingkungan :</label>
                                <select name="konflik_lingkungan" id="konflik_lingkungan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya" {{ $item->konflik_lingkungan == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ $item->konflik_lingkungan == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                </select>
                            </div>

                            {{-- Konflik Kriminalitas --}}
                            <div>
                                <label for="konflik_kriminalitas" class="block text-sm font-medium text-gray-700">Konflik kriminalitas :</label>
                                <select name="konflik_kriminalitas" id="konflik_kriminalitas" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya" {{ $item->konflik_kriminalitas == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ $item->konflik_kriminalitas == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                </select>
                            </div>

                            {{-- Konflik Etnis --}}
                            <div>
                                <label for="konflik_etnis" class="block text-sm font-medium text-gray-700">Konflik etnis :</label>
                                <select name="konflik_etnis" id="konflik_etnis" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya" {{ $item->konflik_etnis == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ $item->konflik_etnis == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                </select>
                            </div>

                            {{-- Konflik Agama --}}
                            <div>
                                <label for="konflik_agama" class="block text-sm font-medium text-gray-700">Konflik agama :</label>
                                <select name="konflik_agama" id="konflik_agama" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya" {{ $item->konflik_agama == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ $item->konflik_agama == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                </select>
                            </div>

                            {{-- Konflik Pelayanan Publik --}}
                            <div>
                                <label for="konflik_pelayanan_publik" class="block text-sm font-medium text-gray-700">Konflik pelayanan publik :</label>
                                <select name="konflik_pelayanan_publik" id="konflik_pelayanan_publik" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Ya" {{ $item->konflik_pelayanan_publik == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ $item->konflik_pelayanan_publik == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                </select>
                            </div>
                        </div>

                        </div><!-- Tombol -->
                        <div class="mt-6 flex gap-3">
                            <button type="submit" class="bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">Update</button>
                            <a href="{{ route('dasar-keluarga.index') }}" class="bg-gray-500 text-white font-bold py-2 px-4 rounded hover:bg-gray-600">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
