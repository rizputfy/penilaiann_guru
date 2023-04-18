<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\jenis_kehadiran;

class JenisKehadiranController extends Controller
{
    public function index(){
        $jenis_kehadiran = jenis_kehadiran::all();
        $jumlah_kehadiran = $jenis_kehadiran->count();
        return view ('jenis_kehadiran.index', compact('jenis_kehadiran', 'jumlah_kehadiran'));
    }

    public function create(){
        return view('jenis_kehadiran.create');
    }

    public function store(Request $request){
        $jenis_kehadiran = new jenis_kehadiran();
        $jenis_kehadiran->nama_kehadiran = $request->nama_kehadiran;
       
        $jenis_kehadiran->save();
        return redirect('jenis_kehadiran');
    }

    public function edit($id){
        $jenis_kehadiran = jenis_kehadiran::find($id);
        return view('jenis_kehadiran.edit', compact('jenis_kehadiran'));
    }

    public function update(Request $request, $id){
        $jenis_kehadiran = jenis_kehadiran::find($id);
        $jenis_kehadiran->nama_kehadiran = $request->nama_kehadiran;
        $jenis_kehadiran->update();
        return redirect('jenis_kehadiran');
    }

    public function destroy($id){
        $jenis_kehadiran = jenis_kehadiran::find($id);
        $jenis_kehadiran->delete();
        return redirect('jenis_kehadiran');
    }
}
