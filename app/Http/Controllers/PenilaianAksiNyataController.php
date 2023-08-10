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
        }
        $id_guru = $guru[0]['guru']['id'];//echo $id_guru;die();
        $periode = Periode::all()->where('status', 1)->first();
        $id_periode = $periode['id'];
        $list_jenis_aksi_nyata = JenisAksiNyata::pluck('nama_aksi_nyata', 'id');
        //cek apakah aksi nyata sudah ada
        $penilaian_cek_guru1 = Penilaian::all()->where('id_guru', $id_guru)->first();
        if (empty($penilaian_cek_guru1)){
           $cek = "kosong";
           return view('penilaian_aksi_nyata.create', compact('cek','list_jenis_aksi_nyata', 'guru', 'periode'));
        }

        else {
            $cek = "ada";
            $penilaian = Penilaian::all()->where('id_guru', $id_guru)->first();
            $id_penilaian = $penilaian['id'];
            $id_penilaian = $penilaian_cek_guru1['id'];//echo $id;die();
            $penilaian_aksi_nyata1 = PenilaianAksiNyata::all()->where('id_penilaian', $id_penilaian);//print($penilaian_aksi_nyata1);
            return view('penilaian_aksi_nyata.create', compact('cek','list_jenis_aksi_nyata', 'guru', 'periode','penilaian_aksi_nyata1'));
        }
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
        return redirect('penilaian_aksi_nyata/lihat_aksi_nyata');
    }

    public function edit($id){
        $penilaian_aksi_nyata = PenilaianAksiNyata::find($id);
        $list_jenis_aksi_nyata = JenisAksiNyata::pluck('nama_aksi_nyata', 'id');
        return view('penilaian_aksi_nyata.edit', compact('penilaian_aksi_nyata','list_jenis_aksi_nyata'));
    }

    public function update(Request $request, $id){
        //echo $id;die();
        $penilaian = Penilaian::find($id);//print_r($penilaian);//die();
        $penilaian_aksi_nyata_cek = PenilaianAksiNyata::all()->where('id_penilaian', $id);//print_r($penilaian_aksi_nyata);
        if(!empty($penilaian_aksi_nyata_cek[1])){
            $id_penilaian_aksi_nyata1 = $request->id1;
            $penilaian_aksi_nyata1 = PenilaianAksiNyata::find($id_penilaian_aksi_nyata1);//print_r($penilaian_aksi_nyata);die();
            $penilaian_aksi_nyata1->deskripsi = $request->deskripsi1;
            $penilaian_aksi_nyata1->link_vidio = $request->link_vidio1;
            $penilaian_aksi_nyata1->link_dokumentasi = $request->link_dokumentasi1;
            $penilaian_aksi_nyata1->volume = $request->volume1;
            $penilaian_aksi_nyata1->id_jenis_aksi = $request->id_jenis_aksi1;
            $penilaian_aksi_nyata1->update();  
            $id_penilaian_aksi_nyata2 = $request->id2;
            $penilaian_aksi_nyata2 = PenilaianAksiNyata::find($id_penilaian_aksi_nyata2);//print_r($penilaian_aksi_nyata);die();
            $penilaian_aksi_nyata2->deskripsi = $request->deskripsi2;
            $penilaian_aksi_nyata2->link_vidio = $request->link_vidio2;
            $penilaian_aksi_nyata2->link_dokumentasi = $request->link_dokumentasi2;
            $penilaian_aksi_nyata2->volume = $request->volume2;
            $penilaian_aksi_nyata2->id_jenis_aksi = $request->id_jenis_aksi2;
            $penilaian_aksi_nyata2->update();  
        }
        else{
            $id_penilaian_aksi_nyata = $request->id1;
            $penilaian_aksi_nyata = PenilaianAksiNyata::find($id_penilaian_aksi_nyata);//print_r($penilaian_aksi_nyata);die();
            $penilaian_aksi_nyata->deskripsi = $request->deskripsi1;
            $penilaian_aksi_nyata->link_vidio = $request->link_vidio1;
            $penilaian_aksi_nyata->link_dokumentasi = $request->link_dokumentasi1;
            $penilaian_aksi_nyata->volume = $request->volume1;
            $penilaian_aksi_nyata->id_jenis_aksi = $request->id_jenis_aksi1;
            $penilaian_aksi_nyata->update();  
        }
        //die();
        
        return redirect('penilaian_aksi_nyata/lihat_aksi_nyata');
    }

    public function destroy($id){
        $penilaian_aksi_nyata = PenilaianAksiNyata::find($id);
        $penilaian_aksi_nyata->delete();
        return redirect('penilaian_aksi_nyata');
    }

    public function lihat_aksi_nyata(){
        $periode = Periode::all();
        $penilaian_status = Penilaian::all();//print_r($penilaian_status);die();
        $jumlah_periode = $periode->count();
        return view ('penilaian_aksi_nyata.lihat_aksi_nyata', compact('periode', 'jumlah_periode', 'penilaian_status'));
    }
}
