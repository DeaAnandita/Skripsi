<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model {
    use HasFactory;
    protected $fillable = ['user_id','kategori_aset','id_aset','jenis_pengajuan','deskripsi','status','tanggal_pengajuan'];
    public function user() { return $this->belongsTo(User::class); }
}
