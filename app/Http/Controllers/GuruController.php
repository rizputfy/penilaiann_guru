<?php

namespace App\Http\Controllers;
use App\Models\Guru;
use App\Models\JabatanStruktural;
use App\Models\Unit;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index(){
        $guru = Guru::all();
        $jumlah_guru = $guru->count();
        return view ('guru.index', compact('guru', 'jumlah_guru'));
    }

    public function create(){
        $list_unit = Unit::pluck('nama_unit', 'id');
        $list_jabatan_struktural = JabatanStruktural::pluck('nama_struktural', 'id');
        return view('guru.create', compact('list_unit','list_jabatan_struktural'));
    }

    public function store(Request $request){
        $guru = new Guru();
        $guru->nip = $request->nip;
        $guru->nama = $request->nama;
        $guru->alamat = $request->link_vidio;
        $guru->id_unit = $request->id_unit; 
        $guru->id_jabatan_struktural = $request->id_jabatan_struktural; 
        $guru->save();
        return redirect('guru');
    }

    public function edit($id){
        $guru = Guru::find($id);
        $list_unit = Unit::pluck('nama_unit', 'id');
        $list_jabatan_struktural = JabatanStruktural::pluck('nama_struktural', 'id');
        return view('.edit', compact('penilaian_aksi_nyata','list_jenis_aksi_nyata'));
    }

    public function update(Request $request, $id){
        $penilaian_aksi_nyata = Guru::find($id);
        $penilaian_aksi_nyata->skor_aksi_nyata = $request->skor_aksi_nyata;
        $penilaian_aksi_nyata->deskripsi = $request->deskripsi;
        $penilaian_aksi_nyata->link_vidio = $request->link_vidio;
        $penilaian_aksi_nyata->link_dokumentasi = $request->link_dokumentasi;
        $penilaian_aksi_nyata->volume = $request->volume;
        $penilaian_aksi_nyata->id = $request->id;
        $penilaian_aksi_nyata->update();
        return redirect('penilaian_aksi_nyata');
    }

    public function destroy($id){
        $penilaian_aksi_nyata = Guru::find($id);
        $penilaian_aksi_nyata->delete();
        return redirect('penilaian_aksi_nyata');
    }
}
