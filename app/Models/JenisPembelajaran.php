<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPembelajaran extends Model
{
    use HasFactory;
    protected $table = 'jenis_pembelajaran';
    protected $fillable = ['nama_pembelajaran'];

    public function penilaian_pembelajaran(){
        return $this->hasMany('App\Models\PenilaianPembelajaran', 'id_jenis_penilaian');
    }
}
