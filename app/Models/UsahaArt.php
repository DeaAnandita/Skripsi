<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UsahaArt extends Model
{
    use SoftDeletes;
    protected $table = 'usaha_arts';
    protected $fillable = [
        'user_id',
        'lapangan_usaha',
        'omset_usaha_bulan',
        'jumlah_pekerja',
        'dokumen_usaha',
        'status_verifikasi',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}