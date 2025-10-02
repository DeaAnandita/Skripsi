<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('bayis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');

            // Field indikator
            
            $table->string('nama_ibu')->nullable();
            $table->string('nama_bayi')->nullable();
            $table->string('tgl_lahir')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('berat_badan')->nullable();
            $table->string('tinggi_badan')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bayis');
    }
};
