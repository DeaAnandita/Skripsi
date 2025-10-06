<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Nama Hewan') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('nama-hewan.store') }}" method="POST">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nama Hewan</label>
                        <input type="text" name="nama" value="{{ old('nama') }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mt-4 flex justify-end gap-2">
                        <a href="{{ route('nama-hewan.index') }}"
                           class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">Batal</a>
                        <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
