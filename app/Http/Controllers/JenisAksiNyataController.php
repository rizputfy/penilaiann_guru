<?php

namespace App\Http\Controllers;

use App\Models\JenisAksiNyata;
use Illuminate\Http\Request;

class JenisAksiNyataController extends Controller
{
    public function index(){
        $jenis_aksi_nyata = JenisAksiNyata::all();
        $jumlah_aksi_nyata = $jenis_aksi_nyata->count();
        return view ('jenis_aksi_nyata.index', compact('jenis_aksi_nyata', 'jumlah_aksi_nyata'));
    }

    public function create(){
        return view('jenis_aksi_nyata.create');
    }

    public function store(Request $request){
        $jenis_aksi_nyata = new JenisAksiNyata();
        $jenis_aksi_nyata->nama_aksi_nyata = $request->nama_aksi_nyata;
        $jenis_aksi_nyata->save();
        return redirect('jenis_aksi_nyata');
    }

    public function edit($id){
        $jenis_aksi_nyata = JenisAksiNyata::find($id);
        return view('jenis_aksi_nyata.edit', compact('jenis_aksi_nyata'));
    }

    public function update(Request $request, $id){
        $jenis_aksi_nyata = JenisAksiNyata::find($id);
        $jenis_aksi_nyata->nama_aksi_nyata = $request->nama_aksi_nyata;
        $jenis_aksi_nyata->update();
        return redirect('jenis_aksi_nyata');
    }

    public function destroy($id){
        $jenis_aksi_nyata = JenisAksiNyata::find($id);
        $jenis_aksi_nyata->delete();
        return redirect('jenis_aksi_nyata');
    }
}
