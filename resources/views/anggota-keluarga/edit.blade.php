<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Anggota Keluarga') }}
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
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold mb-4">FORM EDIT ANGGOTA KELUARGA</h2>

                    <form action="{{ route('anggota-keluarga.update', $item->id) }}" method="POST">
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

                        {{-- contoh field lain --}}
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap"
                                   value="{{ old('nama_lengkap', $anggota->nama_lengkap) }}"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>

                        {{-- tombol submit --}}
                        <div class="flex justify-end">
                            <button type="submit"
                                    class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                                Update
                            </button>
                        </div>
                    </form>

                </div> {{-- end p-6 --}}
            </div> {{-- end bg-white --}}
        </div> {{-- end max-w --}}
    </div> {{-- end py-12 --}}
</x-app-layout>
