<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dasar_keluargas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('no_kk')->unique();
            $table->string('kepala_keluarga')->nullable();
            $table->string('dusun')->nullable();
            $table->string('rw')->nullable();
            $table->string('rt')->nullable();
            $table->string('alamat')->nullable();
            $table->string('jenis_mutasi')->nullable();
            $table->date('tanggal_mutasi')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('desa')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dasar_keluargas');
    }
};
