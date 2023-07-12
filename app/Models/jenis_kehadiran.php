<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenis_kehadiran extends Model
{
    use HasFactory;

    protected $table = 'jenis_kehadiran';
    protected $fillable = ['nama_kehadiran'];

    public function penilaian_kehadiran(){
        return $this->hasMany('App\Models\PenilaianKehadiran', 'id_jenis_kehadiran');
    }
}
