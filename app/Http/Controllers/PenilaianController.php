<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use App\Models\JenisAksiNyata;
use App\Models\jenis_kehadiran;
use App\Models\Guru;
use App\Models\Periode;
use App\Models\Penilaian;
use App\Models\PenilaianKehadiran;
use App\Models\PenilaianPembelajaran;
use App\Models\PenilaianAksiNyata;
use Illuminate\Support\Facades\Auth;

class PenilaianController extends Controller
{
    public function index(){
        return view ('penilaian.index');
    }

    public function create($id)
    { 
        //echo $id;die();
        $penilaian = Penilaian::all()->where('id', $id);
        $penilaian_aksi_nyata = PenilaianAksiNyata::all()->where('id_penilaian', $id);//print_r($penilaian_aksi_nyata);die();
        $list_jenis_aksi_nyata = JenisAksiNyata::pluck('nama_aksi_nyata');
        //cek apakah tabel kehadiran untuk sekolah sudah ada skor? 
        $kehadiransekolah = PenilaianKehadiran::all()->where('id_penilaian', $id)->where('id_jenis_kehadiran',1)->first();//print_r($kehadiransekolah);die();
        if (empty($kehadiransekolah)){
            $cekkehadiransekolah = "kosong";//echo $cekkehadiransekolah;
         }
         else {
             $cekkehadiransekolah = "ada";//echo $cekkehadiransekolah;
         }
         //cek apakah tabel kehadiran untuk kelas sudah ada skor? 
        $kehadirankelas = PenilaianKehadiran::all()->where('id_penilaian', $id)->where('id_jenis_kehadiran',2)->first();//print_r($kehadirankelas);die();
        if (empty($kehadirankelas)){
            $cekkehadirankelas = "kosong"; //echo $cekkehadirankelas;
         }
         else {
             $cekkehadirankelas = "ada";//echo $cekkehadirankelas;
         }
          //cek apakah tabel kehadiran untuk Lesson Study sudah ada skor? 
        $kehadiranlessonstudy = PenilaianKehadiran::all()->where('id_penilaian', $id)->where('id_jenis_kehadiran',3)->first();//print_r($kehadiranlessonstudy);die();
        if (empty($kehadiranlessonstudy)){
            $cekkehadiranlessonstudy = "kosong"; //echo $cekkehadiranlessonstudy;
         }
         else {
             $cekkehadiranlessonstudy = "ada";//echo $cekkehadiranlessonstudy;
         }
           //cek apakah tabel kehadiran untuk Rapat sudah ada skor? 
        $kehadiranrapat = PenilaianKehadiran::all()->where('id_penilaian', $id)->where('id_jenis_kehadiran',4)->first();//print_r($kehadiranrapat);die();
        if (empty($kehadiranrapat)){
            $cekkehadiranrapat = "kosong"; //echo $cekkehadiranrapat;
         }
         else {
             $cekkehadiranrapat = "ada";//echo $cekkehadiranrapat;
         }
         $kehadiranpembinaan = PenilaianKehadiran::all()->where('id_penilaian', $id)->where('id_jenis_kehadiran',5)->first();//print_r($kehadiranrapat);die();
        if (empty($kehadiranpembinaan)){
            $cekkehadiranpembinaan = "kosong"; //echo $cekkehadiranrapat;
         }
         else {
             $cekkehadiranpembinaan = "ada";//echo $cekkehadiranrapat;
         }
         //CEK PENILAIAN PEMBELAJARAN
            //cek apakah tabel pembelajaran untuk media sudah ada skor? 
            $penilaianpembelajaranmedia = PenilaianPembelajaran::all()->where('id_penilaian', $id)->where('id_jenis_penilaian',1)->first(); //print_r($penilaianpembelajaranmedia);die();
            if (empty($penilaianpembelajaranmedia)){
                $cekpenilaianpembelajaranmedia = "kosong"; //echo $cekkehadiranrapat;
            }
            else {
                $cekpenilaianpembelajaranmedia = "ada";//echo $cekkehadiranrapat;
            }
            //cek apakah tabel pembelajaran untuk penilaian sudah ada skor? 
            $penilaianpembelajaranpenilaian = PenilaianPembelajaran::all()->where('id_penilaian', $id)->where('id_jenis_penilaian',2)->first(); //print_r($penilaianpembelajaranpenilaian);die();
            if (empty($penilaianpembelajaranpenilaian)){
                $cekpenilaianpembelajaranpenilaian = "kosong"; //echo $cekpenilaianpembelajaranpenilaian;
            }
            else {
                $cekpenilaianpembelajaranpenilaian = "ada";//echo $cekpenilaianpembelajaranpenilaian;
            }
            //cek apakah tabel pembelajaran untuk metoda sudah ada skor? 
            $penilaianpembelajaranmetoda = PenilaianPembelajaran::all()->where('id_penilaian', $id)->where('id_jenis_penilaian',3)->first(); //print_r($penilaianpembelajaranmetoda);die();
            if (empty($penilaianpembelajaranmetoda)){
                $cekpenilaianpembelajaranmetoda = "kosong"; //echo $cekpenilaianpembelajaranmetoda;
            }
            else {
                $cekpenilaianpembelajaranmetoda = "ada";//echo $cekpenilaianpembelajaranmetoda;
            }
            //cek apakah tabel pembelajaran untuk Halaqoh Ilmiah sudah ada skor? 
            $penilaianpembelajaranhalaqoh = PenilaianPembelajaran::all()->where('id_penilaian', $id)->where('id_jenis_penilaian',4)->first(); //print_r($penilaianpembelajaranhalaqoh);die();
            if (empty($penilaianpembelajaranhalaqoh)){
                $cekpenilaianpembelajaranhalaqoh = "kosong"; //echo $cekpenilaianpembelajaranhalaqoh;
            }
            else {
                $cekpenilaianpembelajaranhalaqoh = "ada";//echo $cekpenilaianpembelajaranhalaqoh;
            }
             //cek apakah tabel pembelajaran untuk RPP sudah ada skor? 
             $penilaianpembelajaranrpp = PenilaianPembelajaran::all()->where('id_penilaian', $id)->where('id_jenis_penilaian',5)->first(); //print_r($penilaianpembelajaranrpp);die();
             if (empty($penilaianpembelajaranhalaqoh)){
                 $cekpenilaianpembelajaranrpp = "kosong"; //echo $cekpenilaianpembelajaranrpp;
             }
             else {
                 $cekpenilaianpembelajaranrpp = "ada";//echo $cekpenilaianpembelajaranrpp;
             }

            //CEK PENILAIAN AKSI NYATA
            $penilaianaksinyata = PenilaianAksiNyata::all()->where('id_penilaian', $id)->count();//print_r($penilaianaksinyata);die();
            if ($penilaianaksinyata == 1){
                $penilaianaksinyata = "kosong";//echo $penilaianaksinyata;
            }
            else {
                $penilaianaksinyata = "ada";//echo $penilaianaksinyata;
            }
             //ambil data dari tabel penilaian aksi nyata
             //$penilaian_aksi_nyata = PenilaianAksiNyata::all()->where('id_penilaian', $id);//print_r($penilaian_aksi_nyata);die();
        return view('penilaian.create', compact('penilaian', 'list_jenis_aksi_nyata', 'penilaian_aksi_nyata','cekkehadiransekolah','kehadiransekolah', 'kehadirankelas', 'cekkehadirankelas',
                    'kehadiranlessonstudy', 'cekkehadiranlessonstudy', 'kehadiranrapat', 'cekkehadiranrapat', 'penilaianpembelajaranmedia', 'cekpenilaianpembelajaranmedia',
                'penilaianpembelajaranpenilaian', 'cekpenilaianpembelajaranpenilaian', 'penilaianpembelajaranmetoda', 'cekpenilaianpembelajaranmetoda', 
                'penilaianpembelajaranhalaqoh', 'cekpenilaianpembelajaranhalaqoh', 'penilaianpembelajaranrpp', 'cekpenilaianpembelajaranrpp','kehadiranpembinaan','cekkehadiranpembinaan',
                'penilaianaksinyata'));
    }

    public function store(Request $request){
        if (Auth::check()) {
            $user = Auth::user();
            // Mendapatkan ID dan nama pengguna yang sedang login
            $user_id = $user->id;//print_r($user_id);die();
            $level = $user->level;//print_r($level);die();
            $id_penilaian = $request->id_penilaian;//echo $id_penilaian;//die();
    

            if($level == "Kepala Sekolah"){
                $hapuspenilaiankehadiran = PenilaianKehadiran::all()->where('id_penilaian', $id_penilaian);//print_r($hapuspenilaiankehadiran);die();
                $hapuspenilaiankehadiran->each->delete();
                //simpan penilaian kehadiran di sekolah
                $kehadiransekolah = new PenilaianKehadiran();
                $kehadiransekolah->id_penilaian = $request->id_penilaian;//print_r($kehadiransekolah->id_penilaian);die();
                $kehadiransekolah->id_jenis_kehadiran = 1;
                $kehadiransekolah->skor = $request->kehadiransekolah;//print_r($kehadiransekolah->skor);//die();
                $kehadiransekolah->save();
                //simpan penilaian kehadiran di kelas
                $kehadirankelas = new PenilaianKehadiran();
                $kehadirankelas->id_penilaian = $request->id_penilaian;
                $kehadirankelas->id_jenis_kehadiran = 2;
                $kehadirankelas->skor = $request->kehadirankelas;//print_r($kehadirankelas->skor);die();
                $kehadirankelas->save();
                //simpan penilaian kehadiran di lesson study
                $kehadiranlessonstudy = new PenilaianKehadiran();
                $kehadiranlessonstudy->id_penilaian = $request->id_penilaian;
                $kehadiranlessonstudy->id_jenis_kehadiran = 3;
                $kehadiranlessonstudy->skor = $request->kehadiranlessonstudy;//print_r($kehadiranlessonstudy->skor);die();
                $kehadiranlessonstudy->save();
                //simpan penilaian kehadiran di lesson study
                $kehadiranrapat = new PenilaianKehadiran();
                $kehadiranrapat->id_penilaian = $request->id_penilaian;
                $kehadiranrapat->id_jenis_kehadiran = 4;
                $kehadiranrapat->skor = $request->kehadiranrapat;//print_r($kehadiranrapat->skor);die();
                $kehadiranrapat->save();

                //cek isi tabel penilaian pembelajaran 
                $hapuspenilaianpebelajaran = PenilaianPembelajaran::all()->where('id_penilaian', $id_penilaian);//print_r($hapuspenilaianpebelajaran);
                $hapuspenilaianpebelajaran->each->delete();
                //input tabel penilaian pembelajaran
                //simpan penilaian pembelajaran di media
                $penilaianpembelajaranmedia = new PenilaianPembelajaran();
                $penilaianpembelajaranmedia->id_penilaian = $request->id_penilaian; 
                $penilaianpembelajaranmedia->id_jenis_penilaian = 1;
                $penilaianpembelajaranmedia->nilai = $request->penilaianpembelajaranmedia; 
                //print_r($penilaianpembelajaranmedia->nilai);die();
                $penilaianpembelajaranmedia->save();
                //simpan penilaian pembelajaran di Penilaian
                 $penilaianpembelajaranpenilaian = new PenilaianPembelajaran();
                 $penilaianpembelajaranpenilaian->id_penilaian = $request->id_penilaian; 
                 $penilaianpembelajaranpenilaian->id_jenis_penilaian = 2;
                 $penilaianpembelajaranpenilaian->nilai = $request->penilaianpembelajaranpenilaian; 
                 //print_r($penilaianpembelajaranpenilaian->nilai);die();
                $penilaianpembelajaranpenilaian->save();
                 //simpan penilaian pembelajaran di Metoda
                 $penilaianpembelajaranmetoda = new PenilaianPembelajaran();
                 $penilaianpembelajaranmetoda->id_penilaian = $request->id_penilaian; 
                 $penilaianpembelajaranmetoda->id_jenis_penilaian = 3;
                 $penilaianpembelajaranmetoda->nilai = $request->penilaianpembelajaranmetoda; 
                 //print_r($penilaianpembelajaranmetoda->nilai);die();
                $penilaianpembelajaranmetoda->save();
                //simpan penilaian pembelajaran di Halaqoh Ilmiah
                $penilaianpembelajaranhalaqoh = new PenilaianPembelajaran();
                $penilaianpembelajaranhalaqoh->id_penilaian = $request->id_penilaian; 
                $penilaianpembelajaranhalaqoh->id_jenis_penilaian = 4;
                $penilaianpembelajaranhalaqoh->nilai = $request->penilaianpembelajaranhalaqoh; 
                //print_r($penilaianpembelajaranhalaqoh->nilai);die();
                $penilaianpembelajaranhalaqoh->save();
                //simpan penilaian pembelajaran di RPP
                $penilaianpembelajaranrpp = new PenilaianPembelajaran();
                $penilaianpembelajaranrpp->id_penilaian = $request->id_penilaian; 
                $penilaianpembelajaranrpp->id_jenis_penilaian = 5;
                $penilaianpembelajaranrpp->nilai = $request->penilaianpembelajaranrpp; 
                //print_r($penilaianpembelajaranrpp->nilai);die();
                $penilaianpembelajaranrpp->save();
            }
            elseif($level == "Divisi Pembinaan"){
                $hapuspenilaiankehadiran = PenilaianKehadiran::all()->where('id_penilaian', $id_penilaian)->where('id_jenis_kehadiran',5);//print_r($hapuspenilaiankehadiran);die();
                $hapuspenilaiankehadiran->each->delete();
                //simpan penilaian kehadiran di sekolah
                $kehadiranpembinaan = new PenilaianKehadiran();
                $kehadiranpembinaan->id_penilaian = $request->id_penilaian;//print_r($kehadiransekolah->id_penilaian);die();
                $kehadiranpembinaan->id_jenis_kehadiran = 5;
                $kehadiranpembinaan->skor = $request->kehadiranpembinaan;//print_r($kehadiransekolah->skor);//die();
                $kehadiranpembinaan->save();
            }
            elseif($level == "Yayasan"){
                $hitungpenilaianaksinyata = PenilaianAksiNyata::all()->where('id_penilaian', $id_penilaian)->count();//print_r($hitungpenilaianaksinyata);die();
                
                if($hitungpenilaianaksinyata == 1){
                    $penilaian_aksi_nyata_cek = PenilaianAksiNyata::all()->where('id_penilaian', $id_penilaian)->first();//print_r($penilaian_aksi_nyata_cek['id']);die();
                    $id_penilaian_aksi_nyata1 = $penilaian_aksi_nyata_cek['id'];//echo $id_penilaian_aksi_nyata1;//die();
                    $penilaian_aksi_nyata1 = PenilaianAksiNyata::find($id_penilaian_aksi_nyata1); 
                    $penilaian_aksi_nyata1->skor_aksi_nyata = $request->skor1;
                    $penilaian_aksi_nyata1->update();die();
                }
                else{
                    $penilaian_aksi_nyata_cek1 = PenilaianAksiNyata::all()->where('id_penilaian', $id_penilaian)->first();//print_r($penilaian_aksi_nyata_cek['id']);die();
                    $id_penilaian_aksi_nyata1 = $penilaian_aksi_nyata_cek1['id'];
                    $penilaian_aksi_nyata_cek2 = PenilaianAksiNyata::all()->where('id_penilaian', $id_penilaian)->last();//print_r($penilaian_aksi_nyata_cek['id']);die();
                    $id_penilaian_aksi_nyata2 = $penilaian_aksi_nyata_cek2['id'];
                    $penilaian_aksi_nyata1 = PenilaianAksiNyata::find($id_penilaian_aksi_nyata1); 
                    $penilaian_aksi_nyata1->skor_aksi_nyata = $request->skor1;
                    $penilaian_aksi_nyata1->update();

                    $penilaian_aksi_nyata2 = PenilaianAksiNyata::find($id_penilaian_aksi_nyata2); 
                    $penilaian_aksi_nyata2->skor_aksi_nyata = $request->skor2;
                    $penilaian_aksi_nyata2->update();
                }
            }
        } 
        return redirect('penilaian/home');
    }
    public function home(){
        $daftar_nilai_guru = Penilaian::all();//print_r($daftar_nilai_guru);die();
        $list_periode = Penilaian::pluck('id');//print_r($daftar_nilai_guru);die();
        // $id_penilaian = $daftar_nilai_guru[0]['id'];//print_r($id);die();
        // $penilaian_aksi_nyata = PenilaianAksiNyata::all()->where('id_penilaian', $id_penilaian);
        // //print_r($daftar_nilai_guru );die();
        // $id_guru = $daftar_nilai_guru[0]['id_guru'];//die();
        // $guru = Guru::all()->where('id', $id_guru);
        return view('penilaian.home', compact('daftar_nilai_guru', 'list_periode'));
    }
    public function lihat_raport($id){
        //echo $id;die();
        $penilaian = Penilaian::all()->where('id', $id);//print_r($penilaian);
        $penilaian_aksi_nyata = PenilaianAksiNyata::all()->where('id_penilaian', $id);//print_r($penilaian_aksi_nyata);die();
        $list_jenis_aksi_nyata = JenisAksiNyata::pluck('nama_aksi_nyata');
        //cek apakah tabel kehadiran untuk sekolah sudah ada skor? 
        $kehadiransekolah = PenilaianKehadiran::all()->where('id_penilaian', $id)->where('id_jenis_kehadiran',1)->first();//print_r($kehadiransekolah);die();
        if (empty($kehadiransekolah)){
            $cekkehadiransekolah = "kosong";//echo $cekkehadiransekolah;
         }
         else {
             $cekkehadiransekolah = "ada";//echo $cekkehadiransekolah;
         }
         //cek apakah tabel kehadiran untuk kelas sudah ada skor? 
        $kehadirankelas = PenilaianKehadiran::all()->where('id_penilaian', $id)->where('id_jenis_kehadiran',2)->first();//print_r($kehadirankelas);die();
        if (empty($kehadirankelas)){
            $cekkehadirankelas = "kosong"; //echo $cekkehadirankelas;
         }
         else {
             $cekkehadirankelas = "ada";//echo $cekkehadirankelas;
         }
          //cek apakah tabel kehadiran untuk Lesson Study sudah ada skor? 
        $kehadiranlessonstudy = PenilaianKehadiran::all()->where('id_penilaian', $id)->where('id_jenis_kehadiran',3)->first();//print_r($kehadiranlessonstudy);die();
        if (empty($kehadiranlessonstudy)){
            $cekkehadiranlessonstudy = "kosong"; //echo $cekkehadiranlessonstudy;
         }
         else {
             $cekkehadiranlessonstudy = "ada";//echo $cekkehadiranlessonstudy;
         }
           //cek apakah tabel kehadiran untuk Rapat sudah ada skor? 
        $kehadiranrapat = PenilaianKehadiran::all()->where('id_penilaian', $id)->where('id_jenis_kehadiran',4)->first();//print_r($kehadiranrapat);die();
        if (empty($kehadiranrapat)){
            $cekkehadiranrapat = "kosong"; //echo $cekkehadiranrapat;
         }
         else {
             $cekkehadiranrapat = "ada";//echo $cekkehadiranrapat;
         }
         $kehadiranpembinaan = PenilaianKehadiran::all()->where('id_penilaian', $id)->where('id_jenis_kehadiran',5)->first();//print_r($kehadiranrapat);die();
        if (empty($kehadiranpembinaan)){
            $cekkehadiranpembinaan = "kosong"; //echo $cekkehadiranrapat;
         }
         else {
             $cekkehadiranpembinaan = "ada";//echo $cekkehadiranrapat;
         }
         //CEK PENILAIAN PEMBELAJARAN
            //cek apakah tabel pembelajaran untuk media sudah ada skor? 
            $penilaianpembelajaranmedia = PenilaianPembelajaran::all()->where('id_penilaian', $id)->where('id_jenis_penilaian',1)->first(); //print_r($penilaianpembelajaranmedia);die();
            if (empty($penilaianpembelajaranmedia)){
                $cekpenilaianpembelajaranmedia = "kosong"; //echo $cekkehadiranrapat;
            }
            else {
                $cekpenilaianpembelajaranmedia = "ada";//echo $cekkehadiranrapat;
            }
            //cek apakah tabel pembelajaran untuk penilaian sudah ada skor? 
            $penilaianpembelajaranpenilaian = PenilaianPembelajaran::all()->where('id_penilaian', $id)->where('id_jenis_penilaian',2)->first(); //print_r($penilaianpembelajaranpenilaian);die();
            if (empty($penilaianpembelajaranpenilaian)){
                $cekpenilaianpembelajaranpenilaian = "kosong"; //echo $cekpenilaianpembelajaranpenilaian;
            }
            else {
                $cekpenilaianpembelajaranpenilaian = "ada";//echo $cekpenilaianpembelajaranpenilaian;
            }
            //cek apakah tabel pembelajaran untuk metoda sudah ada skor? 
            $penilaianpembelajaranmetoda = PenilaianPembelajaran::all()->where('id_penilaian', $id)->where('id_jenis_penilaian',3)->first(); //print_r($penilaianpembelajaranmetoda);die();
            if (empty($penilaianpembelajaranmetoda)){
                $cekpenilaianpembelajaranmetoda = "kosong"; //echo $cekpenilaianpembelajaranmetoda;
            }
            else {
                $cekpenilaianpembelajaranmetoda = "ada";//echo $cekpenilaianpembelajaranmetoda;
            }
            //cek apakah tabel pembelajaran untuk Halaqoh Ilmiah sudah ada skor? 
            $penilaianpembelajaranhalaqoh = PenilaianPembelajaran::all()->where('id_penilaian', $id)->where('id_jenis_penilaian',4)->first(); //print_r($penilaianpembelajaranhalaqoh);die();
            if (empty($penilaianpembelajaranhalaqoh)){
                $cekpenilaianpembelajaranhalaqoh = "kosong"; //echo $cekpenilaianpembelajaranhalaqoh;
            }
            else {
                $cekpenilaianpembelajaranhalaqoh = "ada";//echo $cekpenilaianpembelajaranhalaqoh;
            }
             //cek apakah tabel pembelajaran untuk RPP sudah ada skor? 
             $penilaianpembelajaranrpp = PenilaianPembelajaran::all()->where('id_penilaian', $id)->where('id_jenis_penilaian',5)->first(); //print_r($penilaianpembelajaranrpp);die();
             if (empty($penilaianpembelajaranhalaqoh)){
                 $cekpenilaianpembelajaranrpp = "kosong"; //echo $cekpenilaianpembelajaranrpp;
             }
             else {
                 $cekpenilaianpembelajaranrpp = "ada";//echo $cekpenilaianpembelajaranrpp;
             }

            //CEK PENILAIAN AKSI NYATA
            $penilaianaksinyata = PenilaianAksiNyata::all()->where('id_penilaian', $id)->count();//print_r($penilaianaksinyata);die();
            if ($penilaianaksinyata == 1){
                $penilaianaksinyata = "kosong";//echo $penilaianaksinyata;
            }
            else {
                $penilaianaksinyata = "ada";//echo $penilaianaksinyata;
            }
             //ambil data dari tabel penilaian aksi nyata
             //$penilaian_aksi_nyata = PenilaianAksiNyata::all()->where('id_penilaian', $id);//print_r($penilaian_aksi_nyata);die();
        return view('penilaian.lihat_raport', compact('penilaian', 'list_jenis_aksi_nyata', 'penilaian_aksi_nyata','cekkehadiransekolah','kehadiransekolah', 'kehadirankelas', 'cekkehadirankelas',
                    'kehadiranlessonstudy', 'cekkehadiranlessonstudy', 'kehadiranrapat', 'cekkehadiranrapat', 'penilaianpembelajaranmedia', 'cekpenilaianpembelajaranmedia',
                'penilaianpembelajaranpenilaian', 'cekpenilaianpembelajaranpenilaian', 'penilaianpembelajaranmetoda', 'cekpenilaianpembelajaranmetoda', 
                'penilaianpembelajaranhalaqoh', 'cekpenilaianpembelajaranhalaqoh', 'penilaianpembelajaranrpp', 'cekpenilaianpembelajaranrpp','kehadiranpembinaan','cekkehadiranpembinaan',
                'penilaianaksinyata'));
    }
}
