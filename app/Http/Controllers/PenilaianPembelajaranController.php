<?php

namespace App\Http\Controllers;

use App\Models\PenilaianPembelajaran;
use Illuminate\Http\Request;

use App\Models\JenisPembelajaran;

class PenilaianPembelajaranController extends Controller
{

    public function index(){
        $penilaian_pembelajaran = PenilaianPembelajaran::all();
        $jumlah_penilaian_pembelajaran = $penilaian_pembelajaran->count();
        return view ('penilaian_pembelajaran.index', compact('penilaian_pembelajaran', 'jumlah_penilaian_pembelajaran'));
    }

    public function create(){
        $list_jenis_pembelajaran = JenisPembelajaran::pluck('nama_pembelajaran');
        return view('penilaian_pembelajaran.create', compact('list_jenis_pembelajaran'));
    }

    public function store(Request $request){
        $penilaian_pembelajaran = new PenilaianPembelajaran();
        $penilaian_pembelajaran->nilai = $request->nilai;
        $penilaian_pembelajaran->id_jenis_penilaian = $request->id_jenis_penilaian;
        $penilaian_pembelajaran->save();
        return redirect('penilaian_pembelajaran');
    }

    public function edit($id){
        $penilaian_pembelajaran = PenilaianPembelajaran::find($id);
        return view('penilaian_pembelajaran.edit', compact('penilaian_pembelajaran'));
    }

    public function update(Request $request, $id){
        $penilaian_pembelajaran = PenilaianPembelajaran::find($id);
        $penilaian_pembelajaran->id_jenis_pembelajaran = $request->nama_pembelajaran;
        $penilaian_pembelajaran->update();
        return redirect('penilaian_pembelajaran');
    }

    public function destroy($id){
        $penilaian_pembelajaran = PenilaianPembelajaran::find($id);
        $penilaian_pembelajaran->delete();
        return redirect('penilaian_pembelajaran');
    }
}
