<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SosialEkonomi extends Model
{
    use HasFactory;

    protected $table = 'sosial_ekonomi';

    protected $fillable = [
        'id',
        'lapangan_usaha',
        'nama_usaha',
        'jumlah_pekerja',
        'memiliki_tempat_usaha',
        'omset_usaha_bulan',
        'user_id', // Added to store the foreign key for the User relationship
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}