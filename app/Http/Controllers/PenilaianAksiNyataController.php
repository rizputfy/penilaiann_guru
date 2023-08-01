<?php

namespace App\Http\Controllers;

use App\Models\JenisAksiNyata;
use App\Models\PenilaianAksiNyata;
use App\Models\Penilaian;
use Illuminate\Http\Request;

class PenilaianAksiNyataController extends Controller
{
    public function index(){
        $penilaian_aksi_nyata = PenilaianAksiNyata::all();
        $jumlah_data = $penilaian_aksi_nyata->count();
        return view ('penilaian_aksi_nyata.index', compact('penilaian_aksi_nyata', 'jumlah_data'));
    }

    public function create(){
        $list_jenis_aksi_nyata = JenisAksiNyata::pluck('nama_aksi_nyata', 'id');
        return view('penilaian_aksi_nyata.create', compact('list_jenis_aksi_nyata'));
    }

    public function store(Request $request){
        $penilaian = new Penilaian();
        $penilaian->id_guru = $request->id_guru;
        $penilaian->id_periode = $request->id_periode; 
        $penilaian->save();
        $id_penilaian = Penilaian::max('id');
        if($request->deskripsi2 == null){
            echo "bbb";
        $penilaian_aksi_nyata = new PenilaianAksiNyata();
        $penilaian_aksi_nyata->deskripsi = $request->deskripsi;
        $penilaian_aksi_nyata->link_vidio = $request->link_vidio;
        $penilaian_aksi_nyata->link_dokumentasi = $request->link_dokumentasi;
        $penilaian_aksi_nyata->volume = $request->volume;
        $penilaian_aksi_nyata->id_jenis_aksi = $request->id_jenis_aksi; 
        $penilaian_aksi_nyata->id_penilaian = $request->$id_penilaian;
        $penilaian_aksi_nyata->save();
        }else{
            echo "aaaa";
            // $penilaian_aksi_nyata = new PenilaianAksiNyata();
            // $penilaian_aksi_nyata->deskripsi = $request->deskripsi;
            // $penilaian_aksi_nyata->link_vidio = $request->link_vidio;
            // $penilaian_aksi_nyata->link_dokumentasi = $request->link_dokumentasi;
            // $penilaian_aksi_nyata->volume = $request->volume;
            // $penilaian_aksi_nyata->id_jenis_aksi = $request->id_jenis_aksi; 
            // $penilaian_aksi_nyata->save();

            // $penilaian_aksi_nyata2 = new PenilaianAksiNyata();
            // $penilaian_aksi_nyata->deskripsi = $request->deskripsi;
            // $penilaian_aksi_nyata->link_vidio = $request->link_vidio;
            // $penilaian_aksi_nyata->link_dokumentasi = $request->link_dokumentasi;
            // $penilaian_aksi_nyata->volume = $request->volume;
            // $penilaian_aksi_nyata->id_jenis_aksi = $request->id_jenis_aksi; 
            // $penilaian_aksi_nyata->save();
        }
        die();
        return redirect('penilaian_aksi_nyata');
    }

    public function edit($id){
        $penilaian_aksi_nyata = PenilaianAksiNyata::find($id);
        $list_jenis_aksi_nyata = JenisAksiNyata::pluck('nama_aksi_nyata', 'id');
        return view('penilaian_aksi_nyata.edit', compact('penilaian_aksi_nyata','list_jenis_aksi_nyata'));
    }

    public function update(Request $request, $id){
        $penilaian_aksi_nyata = PenilaianAksiNyata::find($id);
        $penilaian_aksi_nyata->skor_aksi_nyata = $request->skor_aksi_nyata;
        $penilaian_aksi_nyata->deskripsi = $request->deskripsi;
        $penilaian_aksi_nyata->link_vidio = $request->link_vidio;
        $penilaian_aksi_nyata->link_dokumentasi = $request->link_dokumentasi;
        $penilaian_aksi_nyata->volume = $request->volume;
        $penilaian_aksi_nyata->id_jenis_aksi = $request->id_jenis_aksi;
        $penilaian_aksi_nyata->update();
        return redirect('penilaian_aksi_nyata');
    }

    public function destroy($id){
        $penilaian_aksi_nyata = PenilaianAksiNyata::find($id);
        $penilaian_aksi_nyata->delete();
        return redirect('penilaian_aksi_nyata');
    }
}
