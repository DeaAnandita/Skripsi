<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Rekomendasi;

class RekomendasiSeeder extends Seeder {
    public function run(): void {
        Rekomendasi::create(['user_id'=>1,'aset_keluarga_id'=>1,'jenis_rekomendasi'=>'Perawatan','deskripsi'=>'Servis mesin setiap 6 bulan.']);
        Rekomendasi::create(['user_id'=>1,'aset_lahan_id'=>1,'jenis_rekomendasi'=>'Pertanian','deskripsi'=>'Tanam padi varietas unggul.']);
    }
}
