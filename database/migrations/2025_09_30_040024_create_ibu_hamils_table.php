<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('ibu_hamils', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');

            // Field indikator
            
            $table->string('nama')->nullable();
            $table->string('nik')->nullable();
            $table->string('alamat')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('status_hamil')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ibu_hamils');
    }
};
