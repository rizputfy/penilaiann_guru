<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JabatanStruktural extends Model
{
    use HasFactory;

    protected $table = 'jabatan_struktural';
    protected $fillable = ['nama_struktural'];

    public function guru(){
        return $this->hasMany('App\Models\Guru', 'id_jabatan_struktural');
    }
}
