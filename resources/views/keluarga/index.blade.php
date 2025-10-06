<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Keluarga') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Notifikasi --}}
            @if (session('success'))
                <div class="bg-green-100 text-green-800 px-4 py-2 rounded">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-red-100 text-red-800 px-4 py-2 rounded">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Form Tambah / Edit --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4" id="form-title">Tambah Data Keluarga</h3>

                <form id="keluargaForm" action="{{ route('keluarga.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <input type="hidden" name="_method" value="POST" id="method">

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <x-input-label for="no_kk" value="No KK" />
                            <x-text-input id="no_kk" name="no_kk" type="text" class="mt-1 block w-full" required />
                        </div>

                        <div>
                            <x-input-label for="kepala_keluarga" value="Kepala Keluarga" />
                            <x-text-input id="kepala_keluarga" name="kepala_keluarga" type="text" class="mt-1 block w-full" required />
                        </div>

                        <div>
                            <x-input-label for="dusun" value="Dusun" />
                            <x-text-input id="dusun" name="dusun" type="text" class="mt-1 block w-full" />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <x-input-label for="rt" value="RT" />
                            <x-text-input id="rt" name="rt" type="text" class="mt-1 block w-full" />
                        </div>

                        <div>
                            <x-input-label for="rw" value="RW" />
                            <x-text-input id="rw" name="rw" type="text" class="mt-1 block w-full" />
                        </div>

                        <div class="md:col-span-3">
                            <x-input-label for="alamat" value="Alamat Lengkap" />
                            <x-text-input id="alamat" name="alamat" type="text" class="mt-1 block w-full" />
                        </div>
                    </div>

                    <div class="flex space-x-2 mt-4">
                        <x-primary-button id="btnSubmit">Simpan</x-primary-button>
                        <x-secondary-button id="btnCancel" type="reset" style="display:none;">Batal</x-secondary-button>
                    </div>
                </form>
            </div>

            {{-- Tabel Data --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">Daftar Keluarga</h3>

                <div class="overflow-x-auto">
                    <table class="min-w-full border border-gray-300">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="border px-3 py-2 text-center">No</th>
                                <th class="border px-3 py-2">No KK</th>
                                <th class="border px-3 py-2">Kepala Keluarga</th>
                                <th class="border px-3 py-2">Dusun</th>
                                <th class="border px-3 py-2">RT</th>
                                <th class="border px-3 py-2">RW</th>
                                <th class="border px-3 py-2">Alamat</th>
                                <th class="border px-3 py-2 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($keluargas as $k)
                                <tr class="hover:bg-gray-50">
                                    <td class="border px-3 py-2 text-center">{{ $loop->iteration }}</td>
                                    <td class="border px-3 py-2">{{ $k->no_kk }}</td>
                                    <td class="border px-3 py-2">{{ $k->kepala_keluarga }}</td>
                                    <td class="border px-3 py-2">{{ $k->dusun }}</td>
                                    <td class="border px-3 py-2">{{ $k->rt }}</td>
                                    <td class="border px-3 py-2">{{ $k->rw }}</td>
                                    <td class="border px-3 py-2">{{ $k->alamat }}</td>
                                    <td class="border px-3 py-2 text-center">
                                        <button
                                            class="bg-yellow-500 text-white px-2 py-1 rounded text-sm editBtn"
                                            data-id="{{ $k->id }}"
                                            data-no_kk="{{ $k->no_kk }}"
                                            data-kepala="{{ $k->kepala_keluarga }}"
                                            data-dusun="{{ $k->dusun }}"
                                            data-rt="{{ $k->rt }}"
                                            data-rw="{{ $k->rw }}"
                                            data-alamat="{{ $k->alamat }}">
                                            Edit
                                        </button>

                                        <form action="{{ route('keluarga.destroy', $k->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-600 text-white px-2 py-1 rounded text-sm">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center py-4">Belum ada data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $keluargas->links() }}
                </div>
            </div>
        </div>
    </div>

    {{-- Script Edit --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editButtons = document.querySelectorAll('.editBtn');
            const form = document.getElementById('keluargaForm');
            const methodField = document.getElementById('method');
            const title = document.getElementById('form-title');
            const btnSubmit = document.getElementById('btnSubmit');
            const btnCancel = document.getElementById('btnCancel');

            editButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    const id = this.dataset.id;
                    form.action = `/keluarga/${id}`;
                    methodField.value = "PUT";

                    document.getElementById('no_kk').value = this.dataset.no_kk;
                    document.getElementById('kepala_keluarga').value = this.dataset.kepala;
                    document.getElementById('dusun').value = this.dataset.dusun;
                    document.getElementById('rt').value = this.dataset.rt;
                    document.getElementById('rw').value = this.dataset.rw;
                    document.getElementById('alamat').value = this.dataset.alamat;

                    title.textContent = "Edit Data Keluarga";
                    btnSubmit.textContent = "Update";
                    btnCancel.style.display = "inline-block";
                });
            });

            btnCancel.addEventListener('click', function() {
                form.action = "{{ route('keluarga.store') }}";
                methodField.value = "POST";
                title.textContent = "Tambah Data Keluarga";
                btnSubmit.textContent = "Simpan";
                this.style.display = "none";
                form.reset();
            });
        });
    </script>
</x-app-layout>
