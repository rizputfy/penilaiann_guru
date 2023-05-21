<?php

namespace App\Http\Controllers;

use App\Models\JenisPembelajaran;
use Illuminate\Http\Request;

class JenisPembelajaranController extends Controller
{
    public function index(){
        $jenis_pembelajaran = JenisPembelajaran::all();
        $jumlah_pembelajaran = $jenis_pembelajaran->count();
        return view ('jenis_pembelajaran.index', compact('jenis_pembelajaran', 'jumlah_pembelajaran'));
    }

    public function create(){
        return view('jenis_pembelajaran.create');
    }

    public function store(Request $request){
        $jenis_pembelajaran = new JenisPembelajaran();
        $jenis_pembelajaran->nama_pembelajaran = $request->nama_pembelajaran;
        $jenis_pembelajaran->save();
        return redirect('jenis_pembelajaran');
    }

    public function edit($id){
        $jenis_pembelajaran = JenisPembelajaran::find($id);
        return view('jenis_pembelajaran.edit', compact('jenis_pembelajaran'));
    }

    public function update(Request $request, $id){
        $jenis_pembelajaran = JenisPembelajaran::find($id);
        $jenis_pembelajaran->nama_pembelajaran = $request->nama_pembelajaran;
        $jenis_pembelajaran->update();
        return redirect('jenis_pembelajaran');
    }

    public function destroy($id){
        $jenis_pembelajaran = JenisPembelajaran::find($id);
        $jenis_pembelajaran->delete();
        return redirect('jenis_pembelajaran');
    }
}
