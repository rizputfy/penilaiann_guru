<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Models\JenisAksiNyata;
use App\Models\Guru;
use App\Models\Periode;
use App\Models\Penilaian;

class PenilaianController extends Controller
{
    public function index(){
        return view ('penilaian.index');
    }

    public function create(Request $request)
    { 
        $id_guru = $request->id_guru;//echo $id_guru;echo "<br>";
        $id_periode = $request->id_periode;//echo $id_periode;echo "<br>";
        $penilaian = Penilaian::all()->where('id_guru', $id_guru);
        $guru = Guru::all()->where('id', $id_guru);//print_r($guru);die();
        $id_penilaian = ($penilaian[0]['id']);//echo $penilaian;die();
        $list_jenis_aksi_nyata = JenisAksiNyata::pluck('nama_aksi_nyata');
        return view('penilaian.create', compact('penilaian', 'list_jenis_aksi_nyata','id_guru','id_periode','id_penilaian', 'guru'));
    }

    public function home(){
        $daftar_nilai_guru = Penilaian::all();
        $list_periode = Penilaian::pluck('id');//print_r($daftar_nilai_guru);
        return view('penilaian.home', compact('daftar_nilai_guru', 'list_periode'));
    }

    
}
