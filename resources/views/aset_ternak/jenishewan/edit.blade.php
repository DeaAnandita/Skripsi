<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Jenis Hewan') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('jenis-hewan.update', $jenisHewan->id) }}" method="POST">
                    @csrf @method('PUT')

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Nama Hewan</label>
                        <select name="nama_hewan_id" required
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            @foreach($namaHewan as $nh)
                                <option value="{{ $nh->id }}"
                                    {{ $nh->id == $jenisHewan->nama_hewan_id ? 'selected' : '' }}>
                                    {{ $nh->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Jenis</label>
                        <input type="text" name="jenis" value="{{ old('jenis', $jenisHewan->jenis) }}" required
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="flex justify-end gap-2">
                        <a href="{{ route('jenis-hewan.index') }}"
                           class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">Batal</a>
                        <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
