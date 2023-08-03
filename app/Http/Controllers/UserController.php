<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Unit;
use App\Models\JabatanStruktural;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('Penilai');
    // }

    protected function index(){
        $batas = 5;
        $jumlah_user = User::count();
        $user_list = User::orderBy('id', 'asc')->simplePaginate($batas);
        $no = 0;
        return view('user.index', compact('user_list','no', 'jumlah_user'));
    }

    public function create(){
        return view('user/create');
    }

    public function store(Request $request){
        $this->validate($request, [ 
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required','string', 'email', 'max:255', 'unique:users'],
            'password' => ['required','string','min:8', 'confirmed'],
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->level = $request->level;
        $user->save();

       if(($user->level !== 'Admin')&&($user->level !== 'Keuangan')){
            $user_id = User::max('id');
            $guru = Guru::all();
            $level = $request->level;
            $name = $request->name;
            $list_unit = Unit::pluck('nama_unit', 'id');
            $list_jabatan_struktural = JabatanStruktural::pluck('nama_struktural', 'id');
            return view('guru/create', compact('guru', 'name', 'user_id', 'list_unit', 'list_jabatan_struktural','level'));
       }
    //    elseif($user->level == 'guru'){
    //     $user_id = User::max('id');
    //     $name = $request->name;
    //     $list_unit = Unit::pluck('nama_unit', 'id');
    //     $list_jabatan_struktural = JabatanStruktural::pluck('nama_struktural', 'id');
    //     return view('guru/create', compact('name', 'user_id', 'list_unit', 'list_jabatan_struktural'));
    //    }
    else{
        return redirect('user');
       }
    }

    public function edit($id){
        $user = User::findorFail($id);
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id){
        $user = User::find($id);
        $pass_lama = $request->password;
        $user->name = $request->name;
        $user->email = $request->email;
        $pass_baru = $request->password;
        if($pass_lama == $pass_baru){
        }
        else{
            $user->password = Hash::make($request->password);
        }

        $user->level = $request->level;
        $user->update();

        //ketika terdapat perubahan pada tabel user, kolom nama peminjam juga akan berubah
        $guru = Guru::where('user_id', $id);
        $guru->update([
            'nama_peminjam' => $request->name,
        ]);
        return redirect('user');
    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();

        //Ketika user dihapus maka data peminjam juga akan terhapus 
        $guru = Guru::where('user_id', $id);
        $guru->delete();

        return redirect('user');
    }
}
