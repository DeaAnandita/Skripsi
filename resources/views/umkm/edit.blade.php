<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit umkm
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
        <h2 class="mb-4">Edit Data umkm</h2>

        <form action="{{ route('umkm.update', $item->id) }}" method="POST">
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
            <div class="grid-container gap-4">
                {{-- npwp --}}
                <div>
                    <label for="npwp" class="block text-sm font-medium text-gray-700">Memiliki npwp :</label>
                    <select name="npwp" id="npwp" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">                            <option value="">Silahkan Pilih</option>
                        <option value="Ya" {{ $item->npwp == 'Ya' ? 'selected' : '' }}>Ya</option>
                        <option value="Tidak">Tidak</option>
                    </select>
                </div>

                {{-- nib --}}
                <div class="col">
                    <label class="form-label">nib</label>
                    <select name="nib" class="form-control">
                        <option value="Tidak" {{ $item->nib == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                        <option value="Ya" {{ $item->nib == 'Ya' ? 'selected' : '' }}>Ya</option>
                        <option value="Lainnya" {{ $item->nib== 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>

                {{-- sku --}}
                <div class="col">
                    <label class="form-label">sku</label>
                    <select name="tv" class="form-control">
                        <option value="Tidak" {{ $item->tv == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                        <option value="Ya" {{ $item->tv == 'Ya' ? 'selected' : '' }}>Ya</option>
                        <option value="Lainnya" {{ $item->tv == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>

                {{-- sku --}}
                <div class="col">
                    <label class="form-label">sku</label>
                    <select name="ac" class="form-control">
                        <option value="Tidak" {{ $item->ac == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                        <option value="Ya" {{ $item->ac == 'Ya' ? 'selected' : '' }}>Ya</option>
                        <option value="Lainnya" {{ $item->ac == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>
                {{-- iumk --}}
                <div class="col">
                    <label class="form-label">iumk</label>
                    <select name="iumk" class="form-control">
                        <option value="Tidak" {{ $item->iumk == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                        <option value="Ya" {{ $item->iumk == 'Ya' ? 'selected' : '' }}>Ya</option>
                        <option value="Lainnya" {{ $item->iumk == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>
                  </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('aset-keluarga.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

