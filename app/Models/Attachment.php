<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model {
    use HasFactory;
    protected $fillable = ['attachable_type','attachable_id','filename','file_path','mime','size','uploaded_by','disk'];
}
