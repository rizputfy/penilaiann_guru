<?php

namespace App\Http\Controllers;
use App\Models\Guru;
use App\Models\JabatanStruktural;
use App\Models\Unit;
use App\Models\Periode;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
        $guru = Guru::all();
        return view('guru.create', compact('list_unit','list_jabatan_struktural'));
    }

    public function store(Request $request){
        $guru = new Guru();
        $guru->nip = $request->nip;
        $guru->nama = $request->nama;
        $guru->alamat = $request->alamat;
        $guru->id_unit = $request->id_unit; 
        $guru->id_jabatan_struktural = $request->id_jabatan_struktural; 
        $guru->user_id = $request->user_id;
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
        $cari_user_id = Guru::where('id', $id)->pluck('user_id');
        $user = User::where('id', $cari_user_id);
        $user->update([
            'name' => $request->nama,
        ]);
        return redirect('guru');
    }

    public function tampilan_guru(){
        $guru = Guru::all();
        
        if (Auth::check()) {
            // Mengambil data user yang login
            $user = Auth::user();

            // Mendapatkan ID dan nama pengguna yang sedang login
            $user_id = $user->id;//echo $user_id;die();
            $user_name = $user->name;

            // Menggunakan eager loading untuk mendapatkan data periode
            $penilaian_list = User::with('periode')->where('id', $user_id)->get();
        }
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
