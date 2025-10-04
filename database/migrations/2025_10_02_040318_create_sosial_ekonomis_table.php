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
        Schema::create('sosial_ekonomi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('lapangan_usaha', [
                'Pertanian tanaman padi & palawija',
                'Hortikultura',
                'Perkebunan',
                'Perikanan tangkap',
                'Perikanan Budidaya',
                'Peternakan',
                'Kehutanan & Pertanian lainnya',
                'Pertambangan/penggalian',
                'Industri pengolahan',
                'Listrik, gas, & Air',
                'Bangunan/Konstruksi',
                'Perdagangan',
                'Hotel & rumah makan',
                'Transportasi & perududangan',
                'Informasi dan Komunikasi',
                'Kecurangan dan asuransi',
                'Jasa pendidikan',
                'Jasa kesehatan',
                'Jasa kemasyarakatan, pemerintah & perorangan',
                'Pemulung',
                'Lainnya',
            ]);
            $table->string('nama_usaha');
            $table->integer('jumlah_pekerja');
            $table->enum('memiliki_tempat_usaha', ['Ada', 'Tidak ada']);
            $table->enum('omset_usaha_bulan', [
                'Kurang dari/sama dengan Rp. 1 Juta',
                'Rp. 1 Juta s/d Rp. 5 juta',
                'Rp. 5 Juta s/d Rp. 10 Juta',
                'Lebih dari/sama dengan Rp. 10 Juta',
            ]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sosial_ekonomi');
    }
};