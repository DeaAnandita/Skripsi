<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bayi extends Model {
    protected $table = 'bayis';

    protected $fillable = [
        'user_id',
        'nama_ibu', 
        'nama_bayi', 
        'tgl_lahir', 
        'jenis_kelamin', 
        'berat_badan',
        'tinggi_badan',  
    ];

    public function user() {
         return $this->belongsTo(User::class);
        }
}
