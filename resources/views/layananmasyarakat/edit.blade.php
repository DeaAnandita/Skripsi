<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Data Layanan Masyarakat
        </h2>
    </x-slot>

    <style>
        .form-control {
            margin-top: 0.25rem;
            width: 100%;
            border-radius: 0.375rem;
            border: 1px solid #d1d5db;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        }
        .form-control:focus {
            border-color: #4f46e5;
            outline: none;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.2);
        }
        .btn {
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            font-weight: bold;
        }
        .btn-primary {
            background-color: #2563eb;
            color: white;
        }
        .btn-primary:hover {
            background-color: #1d4ed8;
        }
        .btn-secondary {
            background-color: #6b7280;
            color: white;
        }
        .btn-secondary:hover {
            background-color: #4b5563;
        }
    </style>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="mb-4 text-2xl font-bold">Edit Layanan Masyarakat</h2>

                    <form action="{{ route('layanan-masyarakat.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Pilih Keluarga -->
                        <div class="mb-3">
                            <label for="keluarga_id" class="block text-sm font-medium text-gray-700">Pilih Keluarga</label>
                            <select name="keluarga_id" id="keluarga_id" class="form-control" required>
                                <option value="">-- Pilih Keluarga --</option>
                                @foreach($keluargas as $keluarga)
                                    <option value="{{ $keluarga->id }}" {{ $item->keluarga_id == $keluarga->id ? 'selected' : '' }}>
                                        {{ $keluarga->nama_kepala_keluarga }} (KK: {{ $keluarga->nomor_kk }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Jenis Layanan -->
                        <div class="mb-3">
                            <label for="jenis_layanan" class="block text-sm font-medium text-gray-700">Jenis Layanan</label>
                            <select name="jenis_layanan" id="jenis_layanan" class="form-control" required>
                                <option value="">-- Pilih Jenis Layanan --</option>
                                <option value="Surat Pengantar" {{ $item->jenis_layanan == 'Surat Pengantar' ? 'selected' : '' }}>Surat Pengantar</option>
                                <option value="Surat Keterangan Usaha" {{ $item->jenis_layanan == 'Surat Keterangan Usaha' ? 'selected' : '' }}>Surat Keterangan Usaha</option>
                                <option value="Surat Domisili" {{ $item->jenis_layanan == 'Surat Domisili' ? 'selected' : '' }}>Surat Domisili</option>
                                <option value="Lainnya" {{ $item->jenis_layanan == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                        </div>

                        <!-- Keterangan -->
                        <div class="mb-3">
                            <label for="keterangan" class="block text-sm font-medium text-gray-700">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" class="form-control" rows="3">{{ $item->keterangan }}</textarea>
                        </div>

                        <!-- Status Permohonan -->
                        <div class="mb-3">
                            <label for="status_permohonan" class="block text-sm font-medium text-gray-700">Status Permohonan</label>
                            <select name="status_permohonan" id="status_permohonan" class="form-control">
                                <option value="Diajukan" {{ $item->status_permohonan == 'Diajukan' ? 'selected' : '' }}>Diajukan</option>
                                <option value="Diproses" {{ $item->status_permohonan == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                                <option value="Selesai" {{ $item->status_permohonan == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                <option value="Ditolak" {{ $item->status_permohonan == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                            </select>
                        </div>

                        <!-- Tanggal Permohonan -->
                        <div class="mb-3">
                            <label for="tanggal_permohonan" class="block text-sm font-medium text-gray-700">Tanggal Permohonan</label>
                            <input type="date" name="tanggal_permohonan" id="tanggal_permohonan" class="form-control" value="{{ $item->tanggal_permohonan }}">
                        </div>

                        <!-- Petugas -->
                        <div class="mb-3">
                            <label for="petugas_id" class="block text-sm font-medium text-gray-700">Petugas</label>
                            <select name="petugas_id" id="petugas_id" class="form-control">
                                <option value="">-- Pilih Petugas --</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ $item->petugas_id == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Upload Lampiran -->
                        <div class="mb-3">
                            <label for="lampiran" class="block text-sm font-medium text-gray-700">Lampiran (Opsional)</label>
                            <input type="file" name="lampiran" id="lampiran" class="form-control" accept="application/pdf,image/*">
                            @if($item->lampiran)
                                <p class="text-sm text-gray-600 mt-1">File saat ini: {{ basename($item->lampiran) }}</p>
                            @endif
                        </div>

                        <!-- Status Aktif -->
                        <div class="mb-3">
                            <label for="is_active" class="block text-sm font-medium text-gray-700">Status Aktif</label>
                            <select name="is_active" id="is_active" class="form-control">
                                <option value="1" {{ $item->is_active ? 'selected' : '' }}>Aktif</option>
                                <option value="0" {{ !$item->is_active ? 'selected' : '' }}>Tidak Aktif</option>
                            </select>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('layanan-masyarakat.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
