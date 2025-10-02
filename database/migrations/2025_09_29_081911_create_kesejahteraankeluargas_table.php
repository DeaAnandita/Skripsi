<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('kesejahteraan_keluargas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');

            // Field indikator kesejahteraan keluarga
            $table->enum('pendapatan_stabil', ['Ya', 'Tidak', 'Lainnya'])->nullable();
            $table->string('pendapatan_stabil_lainnya')->nullable();

            $table->enum('akses_pendidikan', ['Ya', 'Tidak', 'Lainnya'])->nullable();
            $table->string('akses_pendidikan_lainnya')->nullable();

            $table->enum('akses_kesehatan', ['Ya', 'Tidak', 'Lainnya'])->nullable();
            $table->string('akses_kesehatan_lainnya')->nullable();

            $table->enum('sanitasi_baik', ['Ya', 'Tidak', 'Lainnya'])->nullable();
            $table->string('sanitasi_baik_lainnya')->nullable();

            $table->enum('air_bersih', ['Ya', 'Tidak', 'Lainnya'])->nullable();
            $table->string('air_bersih_lainnya')->nullable();

            $table->enum('listrik_rumah', ['Ya', 'Tidak', 'Lainnya'])->nullable();
            $table->string('listrik_rumah_lainnya')->nullable();

            $table->enum('pangan_cukup', ['Ya', 'Tidak', 'Lainnya'])->nullable();
            $table->string('pangan_cukup_lainnya')->nullable();

            $table->enum('tabungan_aset', ['Ya', 'Tidak', 'Lainnya'])->nullable();
            $table->string('tabungan_aset_lainnya')->nullable();

            $table->enum('jaminan_sosial', ['Ya', 'Tidak', 'Lainnya'])->nullable();
            $table->string('jaminan_sosial_lainnya')->nullable();

            $table->enum('pekerjaan_keluarga', ['Ya', 'Tidak', 'Lainnya'])->nullable();
            $table->string('pekerjaan_keluarga_lainnya')->nullable();

            $table->enum('akses_internet', ['Ya', 'Tidak', 'Lainnya'])->nullable();
            $table->string('akses_internet_lainnya')->nullable();

            $table->enum('transportasi', ['Ya', 'Tidak', 'Lainnya'])->nullable();
            $table->string('transportasi_lainnya')->nullable();

            $table->enum('rumah_layak_huni', ['Ya', 'Tidak', 'Lainnya'])->nullable();
            $table->string('rumah_layak_huni_lainnya')->nullable();

            $table->enum('pakaian_layak', ['Ya', 'Tidak', 'Lainnya'])->nullable();
            $table->string('pakaian_layak_lainnya')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kesejahteraan_keluargas');
    }
};