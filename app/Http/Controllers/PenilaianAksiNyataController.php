<?php

namespace App\Http\Controllers;

use App\Models\JenisAksiNyata;
use App\Models\PenilaianAksiNyata;
use App\Models\Penilaian;
use App\Models\Guru;
use App\Models\User;
use App\Models\Periode;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class PenilaianAksiNyataController extends Controller
{
    public function index(){
        $penilaian_aksi_nyata = PenilaianAksiNyata::all();
        $jumlah_data = $penilaian_aksi_nyata->count();
        return view ('penilaian_aksi_nyata.index', compact('penilaian_aksi_nyata', 'jumlah_data'));
    }

    public function create(){
        if (Auth::check()) {
            // Mengambil data user yang login
            $user = Auth::user();//print_r($user);die();

            // Mendapatkan ID dan nama pengguna yang sedang login
            $user_id = $user->id;
            $guru = User::with('guru')->where('id', $user_id)->get();
            //print_r($guru[0]['guru']['id']);
            //print_r($guru);die();
            //$periode = Periode::all();print_r($periode);die();
        }
        $id_guru = $guru[0]['guru']['id'];
        $periode = Periode::all()->where('status', 1);
        //print_r($periode);die();
        $penilaian = Penilaian::all()->where('id_guru', $id_guru );print_r($penilaian);die();
        $list_jenis_aksi_nyata = JenisAksiNyata::pluck('nama_aksi_nyata', 'id');
        return view('penilaian_aksi_nyata.create', compact('list_jenis_aksi_nyata', 'guru', 'periode'));
    }

    public function store(Request $request){
        $penilaian = new Penilaian();
        $penilaian->id_guru = $request->id_guru;
        $penilaian->id_periode = $request->id_periode; 
        $penilaian->status = 0;
        $penilaian->save();
        $id_penilaian = Penilaian::max('id');
        if($request->deskripsi2 == null){
        $penilaian_aksi_nyata = new PenilaianAksiNyata();
        $penilaian_aksi_nyata->deskripsi = $request->deskripsi1;
        $penilaian_aksi_nyata->link_vidio = $request->link_vidio;
        $penilaian_aksi_nyata->link_dokumentasi = $request->link_dokumentasi;
        $penilaian_aksi_nyata->volume = $request->volume;
        $penilaian_aksi_nyata->id_jenis_aksi = $request->id_jenis_aksi; 
        $penilaian_aksi_nyata->id_penilaian = $id_penilaian;
        $penilaian_aksi_nyata->save();
        }else{
            //echo "aaaa";
            $penilaian_aksi_nyata = new PenilaianAksiNyata();
            $penilaian_aksi_nyata->deskripsi = $request->deskripsi1;
            $penilaian_aksi_nyata->link_vidio = $request->link_vidio;
            $penilaian_aksi_nyata->link_dokumentasi = $request->link_dokumentasi;
            $penilaian_aksi_nyata->volume = $request->volume;
            $penilaian_aksi_nyata->id_jenis_aksi = $request->id_jenis_aksi; 
            $penilaian_aksi_nyata->id_penilaian = $id_penilaian;
            $penilaian_aksi_nyata->save();

            $penilaian_aksi_nyata2 = new PenilaianAksiNyata();
            $penilaian_aksi_nyata->deskripsi = $request->deskripsi2;
            $penilaian_aksi_nyata->link_vidio = $request->link_vidio2;
            $penilaian_aksi_nyata->link_dokumentasi = $request->link_dokumentasi2;
            $penilaian_aksi_nyata->volume = $request->volume2;
            $penilaian_aksi_nyata->id_jenis_aksi = $request->id_jenis_aksi2; 
            $penilaian_aksi_nyata->id_penilaian = $id_penilaian;
            $penilaian_aksi_nyata->save();
        }
        //die();
        return redirect('penilaian_aksi_nyata');
    }

    public function edit($id){
        $penilaian_aksi_nyata = PenilaianAksiNyata::find($id);
        $list_jenis_aksi_nyata = JenisAksiNyata::pluck('nama_aksi_nyata', 'id');
        return view('penilaian_aksi_nyata.edit', compact('penilaian_aksi_nyata','list_jenis_aksi_nyata'));
    }

    public function update(Request $request, $id){
        $penilaian_aksi_nyata = PenilaianAksiNyata::find($id);
        $penilaian_aksi_nyata->skor_aksi_nyata = $request->skor_aksi_nyata;
        $penilaian_aksi_nyata->deskripsi = $request->deskripsi;
        $penilaian_aksi_nyata->link_vidio = $request->link_vidio;
        $penilaian_aksi_nyata->link_dokumentasi = $request->link_dokumentasi;
        $penilaian_aksi_nyata->volume = $request->volume;
        $penilaian_aksi_nyata->id_jenis_aksi = $request->id_jenis_aksi;
        $penilaian_aksi_nyata->update();
        return redirect('penilaian_aksi_nyata');
    }

    public function destroy($id){
        $penilaian_aksi_nyata = PenilaianAksiNyata::find($id);
        $penilaian_aksi_nyata->delete();
        return redirect('penilaian_aksi_nyata');
    }

    public function lihat_aksi_nyata(){
        $periode = Periode::all();
        $jumlah_periode = $periode->count();
        return view ('penilaian_aksi_nyata.lihat_aksi_nyata', compact('periode', 'jumlah_periode'));
    }
}
