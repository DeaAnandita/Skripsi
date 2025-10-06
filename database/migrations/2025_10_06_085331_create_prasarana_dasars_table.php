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
        Schema::create('prasarana_dasars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('status_pemilik_bangunan');
            $table->string('status_pemilik_lahan');
            $table->string('jenis_fisik_bangunan');
            $table->string('jenis_lantai');
            $table->string('kondisi_lantai');
            $table->string('jenis_dinding');
            $table->string('kondisi_dinding');
            $table->string('jenis_atap');
            $table->string('kondisi_atap');
            $table->string('sumber_air_minum');
            $table->string('kondisi_air_minum');
            $table->string('cara_memperoleh_air');
            $table->string('sumber_penerangan');
            $table->string('sumber_daya_terpasang');
            $table->string('bahan_bakar_memasak');
            $table->string('fasilitas_bab');
            $table->string('pembuangan_tinja');
            $table->string('pembuangan_sampah');
            $table->string('manfaat_air');
            $table->decimal('luas_lantai', 8, 2);
            $table->integer('jumlah_kamar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prasarana_dasars');
    }
};
