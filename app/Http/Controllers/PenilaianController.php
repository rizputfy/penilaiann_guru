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
        $daftar_nilai_guru = Penilaian::all();
        //$id_daftar_nilai_guru = $daftar_nilai_guru[0];print_r($id_daftar_nilai_guru);die();
        //$penilaian_aksi_nyata = PenilaianAksiNyata::all()->where('id_penilaian', $id);
        // print_r($daftar_nilai_guru );die();
        // $id_penilaian = $daftar_nilai_guru[0]['id'];//die();
        // $daftar_penilaian_aksi_nyata_id = PenilaianAksiNyata::all()->where('id', $id_penilaian);
        // $daftar_penilaian_aksi_nyata_id
        $list_periode = Penilaian::pluck('id');//print_r($daftar_nilai_guru);die();
        return view('penilaian.home', compact('daftar_nilai_guru', 'list_periode'));
    }

    
}
