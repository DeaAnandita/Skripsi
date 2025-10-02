<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaKeluarga extends Model {
    protected $table = 'anggota_keluarga';

     protected $fillable = [
        'user_id',
        'nik',
        'nama_lengkap',
        'tanggal_lahir',
        'jenis_kelamin',
        'hubungan_keluarga',
        'status_perkawinan',
    ];

    public function user() {
         return $this->belongsTo(User::class);
        }
}
