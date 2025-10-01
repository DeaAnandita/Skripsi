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
        Schema::create('asetternaks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('nama_hewan_id')->constrained('nama_hewan')->onDelete('cascade');
            $table->foreignId('jenis_hewan_id')->constrained('jenis_hewan')->onDelete('cascade');
            $table->enum('kategori', ['peternakan', 'perikanan']);
            $table->integer('jumlah')->default(0);
            $table->decimal('luas_kandang', 8, 2)->nullable();
            $table->string('jenis_pakan')->nullable();
            $table->boolean('kondisi')->default(1); // 1 = sehat, 0 = sakit
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asetternaks');
    }
};
