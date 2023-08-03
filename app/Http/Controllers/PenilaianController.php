<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Models\JenisAksiNyata;
use App\Models\jenis_kehadiran;
use App\Models\Guru;
use App\Models\Periode;
use App\Models\Penilaian;
use App\Models\PenilaianKehadiran;
use App\Models\PenilaianPembelajaran;
use App\Models\PenilaianAksiNyata;

class PenilaianController extends Controller
{
    public function index(){
        return view ('penilaian.index');
    }

    public function create($id)
    { 
        //echo $id;die();
        $penilaian = Penilaian::all()->where('id', $id);
        $penilaian_aksi_nyata = PenilaianAksiNyata::all()->where('id_penilaian', $id);//print_r($penilaian_aksi_nyata);die();
        $list_jenis_aksi_nyata = JenisAksiNyata::pluck('nama_aksi_nyata');
        return view('penilaian.create', compact('penilaian', 'list_jenis_aksi_nyata', 'penilaian_aksi_nyata'));
    }

    public function store(Request $request){
        //Input Penilaian Kehadiran Sekolah 
        $kehadiransekolah = new PenilaianKehadiran();
        $kehadiransekolah->id_penilaian = $request->id_penilaian;
        $kehadiransekolah->id_jenis_kehadiran = 1;
        $kehadiransekolah->skor = $request->skor;
        $kehadiransekolah->save();
        return redirect('penilaian.home');
    }
    public function home(){
        $daftar_nilai_guru = Penilaian::all();//print_r($daftar_nilai_guru);die();
        $list_periode = Penilaian::pluck('id');//print_r($daftar_nilai_guru);die();
        // $id_penilaian = $daftar_nilai_guru[0]['id'];//print_r($id);die();
        // $penilaian_aksi_nyata = PenilaianAksiNyata::all()->where('id_penilaian', $id_penilaian);
        // //print_r($daftar_nilai_guru );die();
        // $id_guru = $daftar_nilai_guru[0]['id_guru'];//die();
        // $guru = Guru::all()->where('id', $id_guru);
        return view('penilaian.home', compact('daftar_nilai_guru', 'list_periode'));
    }

    
}
