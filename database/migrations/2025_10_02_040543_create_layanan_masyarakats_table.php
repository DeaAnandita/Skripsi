<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('layanan_masyarakats', function (Blueprint $table) {
            $table->id();
    $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');

    // indikator
    $table->enum('Pengurus_RT', ['Ya', 'Tidak', 'Lainnya'])->nullable();
    $table->string('Pengurus_RT_lainnya')->nullable();

    $table->enum('Anggota_Pengurus_RT', ['Ya', 'Tidak', 'Lainnya'])->nullable();
    $table->string('Anggota_Pengurus_RT_lainnya')->nullable();

    $table->enum('Pengurus_RW', ['Ya', 'Tidak', 'Lainnya'])->nullable();
    $table->string('Pengurus_RW_lainnya')->nullable();

    $table->enum('Anggota_Pengurus_RW', ['Ya', 'Tidak', 'Lainnya'])->nullable();
    $table->string('Anggota_Pengurus_RW_lainnya')->nullable();

    $table->enum('Pengurus_LKMD/K/LPM', ['Ya', 'Tidak', 'Lainnya'])->nullable();
    $table->string('Pengurus_LKMD/K/LPM_lainnya')->nullable();

    $table->enum('Anggota_LKMD/K/LPM', ['Ya', 'Tidak', 'Lainnya'])->nullable();
    $table->string('Anggota_LKMD/K/LPM_Tangga_lainnya')->nullable();

    $table->enum('Pengurus_PKK', ['Ya', 'Tidak', 'Lainnya'])->nullable();
    $table->string('Pengurus_PKK_lainnya')->nullable();

    $table->enum('Anggota_PKK', ['Ya', 'Tidak', 'Lainnya'])->nullable();
    $table->string('Anggota_PKK_lainnya')->nullable();

    $table->enum('Pengurus_Lembaga_Adat', ['Ya', 'Tidak', 'Lainnya'])->nullable();
    $table->string('Pengurus_Lembaga_Adat_lainnya')->nullable();

    $table->enum('Anggota_Lembaga_Adat', ['Ya', 'Tidak', 'Lainnya'])->nullable();
    $table->string('Anggota_Lembaga_Adat_lainnya')->nullable();


            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('layanan_masyarakats');
    }
};