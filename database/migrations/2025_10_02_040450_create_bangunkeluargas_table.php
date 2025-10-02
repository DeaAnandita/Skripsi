<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('bangun_keluargas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');

            // Field indikator (enum: Ya / Tidak / Lainnya)
            $table->enum('pakaian_berbeda', ['Ya','Tidak','Lainnya'])->nullable();
            $table->enum('ikut_kb', ['Ya','Tidak','Lainnya'])->nullable();
            $table->enum('ikut_kegiatan_rt', ['Ya','Tidak','Lainnya'])->nullable();
            $table->enum('ikut_posyandu', ['Ya','Tidak','Lainnya'])->nullable();
            $table->enum('remaja_ikut_pik', ['Ya','Tidak','Lainnya'])->nullable();
            $table->enum('anggota_merokok', ['Ya','Tidak','Lainnya'])->nullable();
            $table->enum('anak_mengemisi', ['Ya','Tidak','Lainnya'])->nullable();
            $table->enum('anggota_cacat_fisik', ['Ya','Tidak','Lainnya'])->nullable();
            $table->enum('makan_protein', ['Ya','Tidak','Lainnya'])->nullable();
            $table->enum('memiliki_tabungan', ['Ya','Tidak','Lainnya'])->nullable();
            $table->enum('akses_informasi', ['Ya','Tidak','Lainnya'])->nullable();
            $table->enum('ikut_bkb', ['Ya','Tidak','Lainnya'])->nullable();
            $table->enum('ikut_bkl', ['Ya','Tidak','Lainnya'])->nullable();
            $table->enum('ikut_bkr', ['Ya','Tidak','Lainnya'])->nullable();
            $table->enum('ikut_uppks', ['Ya','Tidak','Lainnya'])->nullable();
            $table->enum('ibadah_sesuai_agama', ['Ya','Tidak','Lainnya'])->nullable();
            $table->enum('komunikasi_keluarga', ['Ya','Tidak','Lainnya'])->nullable();
            $table->enum('pengurus_kegiatan_sosial', ['Ya','Tidak','Lainnya'])->nullable();
            $table->enum('lansia_diatas_60', ['Ya','Tidak','Lainnya'])->nullable();
            $table->enum('anak_jalanan', ['Ya','Tidak','Lainnya'])->nullable();
            $table->enum('pengemis', ['Ya','Tidak','Lainnya'])->nullable();
            $table->enum('pengamen', ['Ya','Tidak','Lainnya'])->nullable();
            $table->enum('gila_stres', ['Ya','Tidak','Lainnya'])->nullable();
            $table->enum('kelainan_kulit', ['Ya','Tidak','Lainnya'])->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bangun_keluargas');
    }
};
