<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jenis_kehadiran;
use App\Models\penilaian_kehadiran;

class PenilaianKehadiranController extends Controller
{
    public function index(){
        $penilaian_kehadiran = penilaian_kehadiran::all();
        $jumlah_kehadiran = $penilaian_kehadiran->count();
        return view ('penilaian_kehadiran.index', compact('penilaian_kehadiran', 'jumlah_kehadiran'));
    }
    public function create(){
        $list_jenis_kehadiran = jenis_kehadiran::pluck('nama_jenis_kehadiran', 'id_jenis_kehadiran');
        return view('penilaian_kehadiran.create', compact('list_jenis_kehadiran'));
    }
}
