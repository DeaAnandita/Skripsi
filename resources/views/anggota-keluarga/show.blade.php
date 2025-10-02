<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Anggota Keluarga') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Detail dalam tabel --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="table-auto w-full border">
                    <tbody>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Nomor KK</td>
                            <td class="border px-4 py-2">{{ $anggota->keluarga->nomor_kk ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Nama Kepala Keluarga</td>
                            <td class="border px-4 py-2">{{ $anggota->keluarga->nama_kepala_keluarga ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">NIK</td>
                            <td class="border px-4 py-2">{{ $anggota->nik }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Nama Lengkap</td>
                            <td class="border px-4 py-2">{{ $anggota->nama_lengkap }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Tanggal Lahir</td>
                            <td class="border px-4 py-2">
                                {{ \Carbon\Carbon::parse($anggota->tanggal_lahir)->format('d-m-Y') }}
                            </td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Jenis Kelamin</td>
                            <td class="border px-4 py-2">{{ ucfirst($anggota->jenis_kelamin) }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Hubungan Keluarga</td>
                            <td class="border px-4 py-2">{{ ucfirst($anggota->hubungan_keluarga) }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Status Perkawina
