<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Aset Ternak') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            @if ($errors->any())
                <div class="mb-4 p-4 rounded-md bg-red-100 text-red-800">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('aset-ternak.update', $asetternak->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        {{-- User --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">User</label>
                            <select name="user_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                <option value="">-- Pilih User --</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ $asetternak->user_id == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Nama Hewan --}}
<div>
    <label class="block text-sm font-medium text-gray-700">Nama Hewan</label>
    <select id="namaHewan" name="nama_hewan_id" required 
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        <option value="">-- Pilih Hewan --</option>
        @foreach($namaHewan as $nh)
            <option value="{{ $nh->id }}" {{ $asetternak->nama_hewan_id == $nh->id ? 'selected' : '' }}>
                {{ $nh->nama }}
            </option>
        @endforeach
    </select>
</div>

{{-- Jenis Hewan --}}
<div>
    <label class="block text-sm font-medium text-gray-700">Jenis Hewan</label>
    <select id="jenisHewan" name="jenis_hewan_id" required 
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        <option value="">-- Pilih Jenis --</option>
    </select>
</div>


                        {{-- Kategori --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Kategori</label>
                            <select name="kategori" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                <option value="peternakan" {{ $asetternak->kategori == 'peternakan' ? 'selected' : '' }}>Peternakan</option>
                                <option value="perikanan" {{ $asetternak->kategori == 'perikanan' ? 'selected' : '' }}>Perikanan</option>
                            </select>
                        </div>

                        {{-- Jumlah --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Jumlah</label>
                            <input type="number" name="jumlah" value="{{ old('jumlah', $asetternak->jumlah) }}" min="0"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>

                        {{-- Luas Kandang --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Luas Kandang (m²)</label>
                            <input type="number" step="0.01" name="luas_kandang" value="{{ old('luas_kandang', $asetternak->luas_kandang) }}"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>

                        {{-- Jenis Pakan --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Jenis Pakan</label>
                            <input type="text" name="jenis_pakan" value="{{ old('jenis_pakan', $asetternak->jenis_pakan) }}"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>

                        {{-- Kondisi --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Kondisi</label>
                            <select name="kondisi" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                <option value="1" {{ $asetternak->kondisi ? 'selected' : '' }}>Sehat</option>
                                <option value="0" {{ !$asetternak->kondisi ? 'selected' : '' }}>Sakit</option>
                            </select>
                        </div>

                        {{-- Keterangan --}}
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700">Keterangan</label>
                            <textarea name="keterangan" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('keterangan', $asetternak->keterangan) }}</textarea>
                        </div>

                    </div> {{-- grid --}}

                    <div class="mt-6 flex justify-end gap-2">
                        <a href="{{ route('aset-ternak.index') }}"
                           class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">Batal</a>
                        <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function loadJenisHewan(namaHewanId, selectedId = null) {
        if (namaHewanId) {
            $.ajax({
                url: '/get-jenis-hewan/' + namaHewanId,
                type: 'GET',
                success: function (data) {
                    $('#jenisHewan').empty();
                    $('#jenisHewan').append('<option value="">-- Pilih Jenis --</option>');
                    $.each(data, function (key, value) {
                        let selected = (value.id == selectedId) ? 'selected' : '';
                        $('#jenisHewan').append('<option value="' + value.id + '" ' + selected + '>' + value.jenis + '</option>');
                    });
                }
            });
        } else {
            $('#jenisHewan').empty().append('<option value="">-- Pilih Jenis --</option>');
        }
    }

    // saat halaman edit pertama kali dibuka
    $(document).ready(function () {
        let currentNamaHewanId = $('#namaHewan').val(); // nama hewan yang sudah tersimpan
        let currentJenisHewanId = "{{ $asetternak->jenis_hewan_id }}"; // jenis hewan tersimpan
        loadJenisHewan(currentNamaHewanId, currentJenisHewanId);
    });

    // saat user ganti Nama Hewan
    $('#namaHewan').on('change', function () {
        let namaHewanId = $(this).val();
        loadJenisHewan(namaHewanId);
    });
</script>

</x-app-layout>
