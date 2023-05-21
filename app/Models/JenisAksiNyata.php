<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisAksiNyata extends Model
{
    use HasFactory;
    protected $table = 'jenis_aksi_nyata';
    
    protected $fillable = ['nama_aksi_nyata'];

    public function penilaian_aksi_nyata(){
        return $this->hasMany('App\Models\PenilaianAksiNyata', 'id_jenis_aksi');
    }
}
