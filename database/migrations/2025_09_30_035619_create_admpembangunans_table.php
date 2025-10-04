<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migration.
     */
    public function up(): void
    {
        Schema::create('admpembangunan', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_buku', 255);
            $table->string('judul', 255);
            $table->string('dokumen')->nullable(); // file dokumen disimpan path nya
            $table->date('tanggal');
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Rollback migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('admpembangunan');
    }
};
