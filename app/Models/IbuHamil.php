<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IbuHamil extends Model {
    protected $table = 'ibu_hamils';

    protected $fillable = [
        'user_id',
        'nama', 
        'nik', 
        'alamat', 
        'no_hp', 
        'status_hamil', 
    ];

    public function user() {
         return $this->belongsTo(User::class);
        }
}
