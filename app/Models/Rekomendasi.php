<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekomendasi extends Model {
    use HasFactory;
    protected $fillable = ['user_id','aset_keluarga_id','aset_lahan_id','jenis_rekomendasi','deskripsi','confidence_score'];
    public function user() { return $this->belongsTo(User::class); }
    public function asetKeluarga() { return $this->belongsTo(AsetKeluarga::class,'aset_keluarga_id'); }
    public function asetLahan() { return $this->belongsTo(AsetLahan::class,'aset_lahan_id'); }
}
