<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penilaian_kehadiran extends Model
{
    use HasFactory;

    protected $table = 'penilaian_kehadiran';

    public function jenis_kehadiran(){
        return $this->belongsTo('App/Models/jenis_kehadiran', 'id_jenis_kehadiran');
    }
}
