<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periode;

class PeriodeController extends Controller
{
    public function index(){
        $periode = Periode::all();
        $jumlah_periode = $periode->count();
        return view ('periode.index', compact('periode', 'jumlah_periode'));
    }

    public function create(){
        return view('periode.create');
    }

    public function store(Request $request){
        $periode = new periode();
        $periode->keterangan = $request->keterangan;
        $periode->save();
        return redirect('periode');
    }

    public function edit($id){
        $periode = periode::find($id);
        return view('periode.edit', compact('periode'));
    }

    public function update(Request $request, $id){
        $periode = periode::find($id);
        $periode->keterangan = $request->keterangan;
        $periode->update();
        return redirect('periode');
    }

    public function destroy($id){
        $periode = periode::find($id);
        $periode->delete();
        return redirect('periode');
    }
}
