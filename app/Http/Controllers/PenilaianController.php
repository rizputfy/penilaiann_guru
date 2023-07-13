<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisAksiNyata;

class PenilaianController extends Controller
{
    public function index(){
        $list_jenis_aksi_nyata = JenisAksiNyata::pluck('nama_aksi_nyata', 'id');
        return view('penilaian.index', compact('list_jenis_aksi_nyata'));
    }
}
