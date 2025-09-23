<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AsetLahan;

class AsetLahanSeeder extends Seeder {
    public function run(): void {
        AsetLahan::create([
            'kode_lahan'=>'LHN-2025-0001',
            'user_id'=>2,
            'nama_lahan'=>'Sawah Utara',
            'alamat'=>'Jl. Sawah No.10',
            'rt_rw'=>'01/02',
            'desa'=>'Winong',
            'kecamatan'=>'Kaliwungu',
            'kabupaten'=>'Kudus',
            'provinsi'=>'Jawa Tengah',
            'luas_m2'=>1500,
            'satuan'=>'m2',
            'status'=>'Kosong',
            'kepemilikan'=>'Milik Pribadi',
            'nomor_sertifikat'=>'12345/S',
            'harga_sewa_bulanan'=>0,
            'irigasi'=>true,
            'soil_type'=>'Latosol',
            'slope_percent'=>2.5,
            'jarak_pasar_km'=>1.2,
            'akses_jalan'=>'Aspal',
            'previous_planting'=>'Padi',
            'verification_status'=>'Pending'
        ]);
    }
}
