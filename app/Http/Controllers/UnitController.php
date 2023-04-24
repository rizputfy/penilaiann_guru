<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;

class UnitController extends Controller
{
    public function index(){
        $unit = Unit::all();
        $jumlah_unit = $unit->count();
        return view ('unit.index', compact('unit', 'jumlah_unit'));
    }

    public function create(){
        return view('unit.create');
    }

    public function store(Request $request){
        $unit = new unit();
        $unit->nama_unit = $request->nama_unit;
        $unit->keterangan = $request->keterangan;
        $unit->save();
        return redirect('unit');
    }

    public function edit($id){
        $unit = unit::find($id);
        return view('unit.edit', compact('unit'));
    }

    public function update(Request $request, $id){
        $unit = unit::find($id);
        $unit->nama_unit = $request->nama_unit;
        $unit->keterangan = $request->keterangan;
        $unit->update();
        return redirect('unit');
    }

    public function destroy($id){
        $unit = unit::find($id);
        $unit->delete();
        return redirect('unit');
    }
}
