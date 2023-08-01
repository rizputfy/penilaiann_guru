<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    use HasFactory;

    protected $table = 'periode';
    protected $fillable = ['keterangan'];

    public function unit(){
        return $this->hasMany('App\Models\Penilaian', 'id');
    }

    public function penilaian(){
        return $this->hasMany('App\Models\Penilaian', 'id_periode');
    }

    public function User()
    {
        return $this->belongsToMany('App\Models\User', 'id');
    }
}
