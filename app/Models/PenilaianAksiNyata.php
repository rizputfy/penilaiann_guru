<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenilaianAksiNyata extends Model
{
    use HasFactory;

    
    protected $table = 'penilaian_aksi_nyata';

    public function jenis_aksi_nyata(){
        return $this->belongsTo('App\Models\JenisAksiNyata', 'id_jenis_aksi');
    }

    public function penilaian(){
        return $this->belongsToMany('App\Models\Penilaian', 'id_penilaian', 'id_penilaian_aksi_nyata');
    }
}
