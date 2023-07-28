<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $table = 'guru';

    public function unit(){
        return $this->belongsTo('App\Models\Unit', 'id_unit');
    }

    public function jabatan_struktural(){
        return $this->belongsTo('App\Models\JabatanStruktural', 'id_jabatan_struktural');
    }

    public function penilaian(){
        return $this->hasMany('App\Models\Penilaian', 'id_guru');
    }
    
    public function periode(){
        return $this->belongsToMany('App\Models\Periode', 'penilaian', 'id_periode', 'id_guru');
    }
    
}
