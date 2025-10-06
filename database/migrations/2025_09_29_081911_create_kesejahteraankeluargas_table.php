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
            $table->string('pendapatan_stabil')->nullable();
            $table->string('akses_pendidikan')->nullable();
            $table->string('akses_kesehatan')->nullable();
            $table->string('sanitasi_baik')->nullable();
            $table->string('air_bersih')->nullable();
            $table->string('listrik_rumah')->nullable();
            $table->string('pangan_cukup')->nullable();
            $table->string('tabungan_aset')->nullable();
            $table->string('jaminan_sosial')->nullable();
            $table->string('pekerjaan_keluarga')->nullable();
            $table->string('akses_internet')->nullable();
            $table->string('transportasi')->nullable();
            $table->string('rumah_layak_huni')->nullable();
            $table->string('pakaian_layak')->nullable();
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kesejahteraan_keluargas');
    }
};