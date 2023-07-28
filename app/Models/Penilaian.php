<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;

    public function guru(){
        return $this->belongsTo('App\Models\Guru', 'id_guru');
    }

    public function penilaian_kehadiran(){
        return $this->belongsTo('App\Models\Penilaian_kehadiran', 'id_penilaian_kehadiran');
    }

    public function penilaian_pembelajaran(){
        return $this->belongsTo('App\Models\PenilaianPembelajaran', 'id_penilaian_pembelajaran');
    }

    public function penilaian_aksi_nyata(){
        return $this->belongsTo('App\Models\PenilaianAksiNyata', 'id_penilaian_aksi_nyata');
    }

    public function periode()
    {
        return $this->belongsTo('App\Models\Periode', 'id_periode');
    }
}
