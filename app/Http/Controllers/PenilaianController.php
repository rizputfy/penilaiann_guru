<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penilaian;
use App\Models\PenilaianAksiNyata;
use App\Models\PenilaianKehadiran;
use App\Models\PenilaianPembelajaran;
use App\Models\Guru;

class PenilaianController extends Controller
{
    //
    public function create(){
        $list_penilaian_kehadiran = PenilaianKehadiran::pluck('skor', 'id');
        return view('penilaian.create', compact('list_penilaian_kehadiran'));
    }

}
