<?php

namespace App\Http\Controllers;

use App\Models\PenilaianKehadiran;
use Illuminate\Http\Request;

use App\Models\jenis_kehadiran;

class PenilaianKehadiranController extends Controller
{
    public function index(){
        $penilaian_kehadiran = PenilaianKehadiran::all();
        $jumlah_penilaian_kehadiran = $penilaian_kehadiran->count();
        return view ('penilaian_kehadiran.index', compact('penilaian_kehadiran', 'jumlah_penilaian_kehadiran'));
    }

    public function create(){
        $list_jenis_kehadiran = jenis_kehadiran::pluck('nama_kehadiran');
        //print_r($list_jenis_kehadiran);die();
        return view('penilaian_kehadiran.create', compact('list_jenis_kehadiran'));
    }

    public function store(Request $request){
        $penilaian_kehadiran = new PenilaianKehadiran();
        $penilaian_kehadiran->skor = $request->skor;
        $penilaian_kehadiran->id_jenis_kehadiran = $request->id_jenis_kehadiran;
        $penilaian_kehadiran->save();
        return redirect('penilaian_kehadiran');
    }

    public function edit($id){
        $penilaian_kehadiran = PenilaianKehadiran::find($id);
        $list_jenis_kehadiran = jenis_kehadiran::pluck('nama_kehadiran');
        return view('penilaian_kehadiran.edit', compact('list_jenis_kehadiran'));
    }

    public function update(Request $request, $id){
        $penilaian_kehadiran = PenilaianKehadiran::find($id);
        $penilaian_kehadiran->id_jenis_kehadiran = $request->nama_kehadiran;
        $penilaian_kehadiran->update();
        return redirect('penilaian_kehadiran');
    }

    public function destroy($id){
        $penilaian_kehadiran = PenilaianKehadiran::find($id);
        $penilaian_kehadiran->delete();
        return redirect('penilaian_kehadiran');
    }
}
