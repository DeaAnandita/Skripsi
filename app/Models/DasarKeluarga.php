<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DasarKeluarga extends Model
{
    protected $fillable = ['user_id', 'keluarga_id', 'jenis_mutasi', 'tanggal_mutasi'];

    public function keluarga()
    {
        return $this->belongsTo(Keluarga::class, 'no_kk');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}