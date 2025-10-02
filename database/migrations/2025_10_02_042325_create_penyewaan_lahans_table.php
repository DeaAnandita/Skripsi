<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('penyewaan_lahan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_penyewa');
            $table->string('lokasi_lahan');
            $table->decimal('luas_lahan', 10, 2);
            $table->enum('jenis_aset', ['ternak', 'perikanan']);
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->decimal('biaya_sewa', 15, 2);
            $table->enum('status', ['aktif', 'selesai', 'batal'])->default('aktif');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penyewaan_lahan');
    }
};