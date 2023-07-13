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
}
