<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsetLahan extends Model {
    use HasFactory;
    protected $fillable = [
        'kode_lahan','user_id','nama_lahan','alamat','rt_rw','desa','kecamatan','kabupaten','provinsi',
        'luas_m2','satuan','koordinat_lat','koordinat_lng','status','kepemilikan','nomor_sertifikat',
        'dokumen_sertifikat_id','foto_cover_id','dokumen_lain','harga_sewa_bulanan','irigasi','soil_type',
        'slope_percent','jarak_pasar_km','akses_jalan','previous_planting','verified_by','verified_at',
        'verification_status','notes'
    ];

    public function user() { return $this->belongsTo(User::class); }
    public function rekomendasis() { return $this->hasMany(Rekomendasi::class); }
}
