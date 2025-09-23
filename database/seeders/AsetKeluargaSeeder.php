<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\AsetKeluarga;

class AsetKeluargaSeeder extends Seeder {
    public function run(): void {
        AsetKeluarga::create(['user_id'=>2,'nama_aset'=>'Motor Supra X','kategori'=>'Kendaraan','nilai_aset'=>12000000,'tahun_perolehan'=>2019]);
        AsetKeluarga::create(['user_id'=>2,'nama_aset'=>'Televisi 32 inch','kategori'=>'Elektronik','nilai_aset'=>2500000,'tahun_perolehan'=>2020]);
    }
}
