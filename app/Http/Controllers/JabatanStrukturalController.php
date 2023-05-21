<?php

namespace App\Http\Controllers;

use App\Models\JabatanStruktural;
use Illuminate\Http\Request;

class JabatanStrukturalController extends Controller
{
    public function index(){
        $jabatan_struktural = JabatanStruktural::all();
        $jumlah_jabatan = $jabatan_struktural->count();
        return view ('jabatan_struktural.index', compact('jabatan_struktural', 'jumlah_jabatan'));
    }

    public function create(){
        return view('jabatan_struktural.create');
    }

    public function store(Request $request){
        $jabatan_struktural = new JabatanStruktural();
        $jabatan_struktural->nama_struktural = $request->nama_struktural;
        $jabatan_struktural->keterangan = $request->keterangan;
        $jabatan_struktural->save();
        return redirect('jabatan_struktural');
    }

    public function edit($id){
        $jabatan_struktural = JabatanStruktural::find($id);
        return view('jabatan_struktural.edit', compact('jabatan_struktural'));
    }

    public function update(Request $request, $id){
        $jabatan_struktural = JabatanStruktural::find($id);
        $jabatan_struktural->nama_struktural = $request->nama_struktural;
        $jabatan_struktural->keterangan = $request->keterangan;
        $jabatan_struktural->update();
        return redirect('jabatan_struktural');
    }

    public function destroy($id){
        $jabatan_struktural = JabatanStruktural::find($id);
        $jabatan_struktural->delete();
        return redirect('jabatan_struktural');
    }
}
