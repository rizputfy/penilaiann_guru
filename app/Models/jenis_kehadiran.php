<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenis_kehadiran extends Model
{
    use HasFactory;

    protected $table = 'jenis_kehadiran';
    protected $primaryKey = 'id_jenis_kehadiran';
    protected $fillable = ['id_jenis_kehadiran', 'jenis_kehadiran'];

    public function kehadiran(){
        return $this->belongsTo('App\Models\penilaian_kehadiran', 'id');
    }
}
