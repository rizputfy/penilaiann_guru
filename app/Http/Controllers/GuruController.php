<?php

namespace App\Http\Controllers;
use App\Models\Guru;
use App\Models\JabatanStruktural;
use App\Models\Unit;
use App\Models\Periode;
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
        $guru->alamat = $request->alamat;
        $guru->id_unit = $request->id_unit; 
        $guru->id_jabatan_struktural = $request->id_jabatan_struktural; 
        $guru->save();
        return redirect('guru');
    }

    public function edit($id){
        $guru = Guru::find($id);
        $list_unit = Unit::pluck('nama_unit', 'id');
        $list_jabatan_struktural = JabatanStruktural::pluck('nama_struktural', 'id');
        return view('guru.edit', compact('guru','list_unit', 'list_jabatan_struktural'));
    }

    public function update(Request $request, $id){
        $guru = Guru::find($id);
        $guru->nip = $request->nip;
        $guru->nama = $request->nama;
        $guru->alamat = $request->alamat;
        $guru->id_unit = $request->id_unit;
        $guru->id_jabatan_struktural = $request->id_jabatan_struktural; 
        $guru->update();
        return redirect('guru');
    }

    public function destroy($id){
        $guru = Guru::find($id);
        $guru->delete();
        return redirect('guru');
    }

    public function search(Request $request){
        $batas = 3;
        $cari = $request->kata;
        $periode = Periode::where('keterangan', 'like', '%'.$cari.'%')->paginate($batas);
        $no = $batas * ($periode->currentPage() - 1);
        return view('guru.search', compact('periode', 'no', 'cari'));
    }
}
