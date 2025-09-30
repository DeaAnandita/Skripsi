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
    $table->enum('npwp', ['Ya', 'Tidak', 'Lainnya'])->nullable();
    $table->string('npwp_lainnya')->nullable();

    $table->enum('nib', ['Ya', 'Tidak', 'Lainnya'])->nullable();
    $table->string('nib_lainnya')->nullable();

    $table->enum('sku', ['Ya', 'Tidak', 'Lainnya'])->nullable();
    $table->string('sku_lainnya')->nullable();

    $table->enum('iumk', ['Ya', 'Tidak', 'Lainnya'])->nullable();
    $table->string('iumk_lainnya')->nullable();

    $table->timestamps();
 });
    }

    public function down(): void
    {
        Schema::dropIfExists('umkms');
    }
};