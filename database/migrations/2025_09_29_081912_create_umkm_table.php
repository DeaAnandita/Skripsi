<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('umkm', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');

    // indikator
    $table->enum('Koperasi', ['Ya', 'Tidak', 'Lainnya'])->nullable();
    $table->string('Koperasi_lainnya')->nullable();

    $table->enum('Unit_Usaha_Simpan_Pinjam', ['Ya', 'Tidak', 'Lainnya'])->nullable();
    $table->string('Unit_Usaha_Simpan_Pinjam_lainnya')->nullable();

    $table->enum('Industri_Kerajinan_Tangan', ['Ya', 'Tidak', 'Lainnya'])->nullable();
    $table->string('Industri_Kerajinan_Tangan_lainnya')->nullable();

    $table->enum('Industri_Pakaian', ['Ya', 'Tidak', 'Lainnya'])->nullable();
    $table->string('Industri_Pakaian_lainnya')->nullable();

    $table->enum('Industri_Usaha_Makanan', ['Ya', 'Tidak', 'Lainnya'])->nullable();
    $table->string('Industri_Usaha_Makanan_lainnya')->nullable();

    $table->enum('Industri_Alat_Rumah_Tangga', ['Ya', 'Tidak', 'Lainnya'])->nullable();
    $table->string('Industri_Alat_Rumah_Tangga_lainnya')->nullable();

    $table->enum('Industri_Usaha_Bahan_Bangunan', ['Ya', 'Tidak', 'Lainnya'])->nullable();
    $table->string('Industri_Usaha_Bahan_Bangunan_lainnya')->nullable();

    $table->enum('Industri_Alat_Pertanian', ['Ya', 'Tidak', 'Lainnya'])->nullable();
    $table->string('Industri_Alat_Pertanian_lainnya')->nullable();

    $table->enum('Restoran', ['Ya', 'Tidak', 'Lainnya'])->nullable();
    $table->string('Restoran_lainnya')->nullable();


    $table->timestamps();
 });
    }

    public function down(): void
    {
        Schema::dropIfExists('umkms');
    }
};