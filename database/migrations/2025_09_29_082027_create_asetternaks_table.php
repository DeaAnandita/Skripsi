<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
<<<<<<< Updated upstream:database/migrations/2025_09_29_082027_create_asetternaks_table.php
        Schema::create('asetternaks', function (Blueprint $table) {
            $table->id();
=======
        Schema::create('lembaga_desas', function (Blueprint $table) {
            $table->id('id_lembaga');
            $table->enum('nama_lembaga', ['Pemerintah Desa', 'BPD'])->default('Pemerintah Desa');
            $table->string('dusun')->nullable(); // Untuk spesifikasi dusun (relevan untuk Kadus)
            $table->json('struktur_jabatan')->nullable(); // JSON untuk hierarki jabatan (Kades, Sekdes, dll.)
            $table->text('keterangan')->nullable();
>>>>>>> Stashed changes:database/migrations/2025_10_02_050859_create_lembaga_desas_table.php
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('asetternaks');
    }
};