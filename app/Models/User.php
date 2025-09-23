<?php
namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable {
    use Notifiable, HasFactory;
    protected $fillable = ['role_id','name','username','email','password','nik','alamat','kontak'];
    protected $hidden = ['password','remember_token'];
    public function role() { return $this->belongsTo(Role::class); }
    public function asetKeluargas() { return $this->hasMany(AsetKeluarga::class); }
    public function asetLahans() { return $this->hasMany(AsetLahan::class); }
}
