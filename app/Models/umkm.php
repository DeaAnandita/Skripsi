<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    use HasFactory;

    // pakai 'umkms' karena tabel di database ada huruf s
    protected $table = 'umkm';

    protected $fillable = [
        'user_id',
        'npwp', 'npwp_lainnya',
        'nib', 'nib_lainnya',
        'sku', 'sku_lainnya',
        'iumk', 'iumk_lainnya'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
