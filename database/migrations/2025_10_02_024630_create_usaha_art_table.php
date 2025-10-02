MIGRATION 
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('usaha_arts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
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
                'Lainnya'
            ]);
            $table->enum('omset_usaha_bulan', [
                'Kurang dari/sama dengan Rp. 1 Juta',
                'Rp. 1 Juta s/d Rp. 5 Juta',
                'Rp. 5 Juta s/d Rp. 10 Juta',
                'Lebih dari/sama dengan Rp. 10 Juta'
            ]);
            $table->enum('pendapatan_per_bulan', [
                'Kurang dari/sama dengan Rp. 1 Juta',
                'Rp. 1 s/d Rp. 1.5 Juta',
                'Rp. 1.5 s/d Rp. 2 Juta',
                'Rp. 2 s/d Rp. 3 Juta',
                'Lebih dari/sama dengan Rp. 3 Juta'
            ]);
            $table->integer('jumlah_pekerja')->default(1);
            $table->enum('status_kedudukan_kerja', [
                'Berusaha sendiri',
                'Berusaha dibantu buruh tidak tetap/dibayar',
                'Buruh/karyawan/pekerja swasta',
                'PNS/TNI/POLRI/BUMN/BUMD/Anggota legislatif',
                'Pekerja bebas pertania',
                'Pekerja bebas non pertania',
                'Pekerja keluarga/tidak dibayar'
            ]);
            $table->string('dokumen_usaha', 255)->nullable();
            $table->enum('status_verifikasi', ['pending', 'verified', 'rejected'])->default('pending');
            $table->foreignId('surveyor_id')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('usaha_arts');
    }
};


