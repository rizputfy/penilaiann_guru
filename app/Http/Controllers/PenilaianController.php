<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Models\JenisAksiNyata;
use App\Models\Guru;
use App\Models\Periode;

class PenilaianController extends Controller
{
    public function index(){
        return view ('penilaian.index');
    }

    public function create()
    { 
        $list_jenis_aksi_nyata = JenisAksiNyata::pluck('nama_aksi_nyata', 'id');
        return view('penilaian.create', compact('list_jenis_aksi_nyata'));
    }

    public function home(){
        $daftar_guru = Guru::all();
        $list_periode = Periode::pluck('keterangan', 'id');
        return view('penilaian.home', compact('daftar_guru', 'list_periode'));
    }
}
