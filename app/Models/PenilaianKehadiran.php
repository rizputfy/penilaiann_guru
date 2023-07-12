<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenilaianKehadiran extends Model
{
    use HasFactory;

    protected $table = 'penilaian_kehadiran';
    protected $fillable = ['skor'];

    public function jenis_kehadiran(){
        return $this->belongsTo('App\Models\jenis_kehadiran', 'id_jenis_kehadiran');
    }

    public function penilaian(){
        return $this->belongsToMany('App\Models\Penilaian', 'id_penilaian', 'id_penilaian_kehadiran');
    }
}
