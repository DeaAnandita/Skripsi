<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SosialEkonomi extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sosial_ekonomi';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        
        'lapangan_usaha',
        'nama_usaha',
        'jumlah_pekerja',
        'memiliki_tempat_usaha',
        'omset_usaha_bulan',
        'partisipasi_sekolah',
        'ijazah_terakhir',
        'jenis_disabilitas',
        'tingkat_kesulitan_disabilitas',
        'penyakit_kronis_menahun',
        'user_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'jumlah_pekerja' => 'integer',
    ];

    /**
     * Get the user that owns this socio-economic data (surveyor).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}