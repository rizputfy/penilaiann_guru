<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use App\Models\Guru;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TampilanGuruController extends Controller
{
    public function index()
    {
        // Memeriksa apakah ada pengguna yang login
        if (Auth::check()) {
            // Mengambil data user yang login
            $user = Auth::user();

            // Mendapatkan ID dan nama pengguna yang sedang login
            $user_id = $user->id;
            $user_name = $user->name;

            // Menggunakan eager loading untuk mendapatkan data periode
            $penilaian_list = User::with('periode')->where('id', $user_id)->get();

            // Mendapatkan daftar periode untuk pilihan dropdown filter (opsional)
            $list_periode = Periode::pluck('keterangan_periode', 'id');

            $guru = Guru::where('id_user', $user_id);
            print_r($guru); die();


            return view('tampilan_guru.index', compact('penilaian_list', 'user_name', 'list_periode'));
        } else {
            // Tindakan ketika tidak ada pengguna yang login (opsional)
            return view('tampilan_guru.index');
        }
    }

}
