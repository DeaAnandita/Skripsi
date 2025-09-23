<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsetKeluarga extends Model {
    use HasFactory;
    protected $fillable = ['user_id','nama_aset','kategori','nilai_aset','tahun_perolehan','status_aset','deskripsi','dokumen_ids'];
    public function user() { return $this->belongsTo(User::class); }
}
