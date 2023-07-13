<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenilaianPembelajaran extends Model
{
    use HasFactory;

    protected $table = 'penilaian_pembelajaran';
    protected $fillable = ['nilai'];

    public function jenis_kehadiran(){
        return $this->belongsTo('App\Models\jenis_pembelajaran', 'id_jenis_penilaian');
    }

    public function penilaian(){
        return $this->belongsToMany('App\Models\Penilaian', 'id_penilaian', 'id_penilaian_pembelajaran');
    }
}
