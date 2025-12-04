<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $data = array(
            'title' => 'Data User',
            'menuAdminUser' => 'active',
            'user'  => User::orderBy('jabatan','asc')->get(),
        );
        return view('admin/user/index',$data);
    }

    public function create(){
        $data = array(
            'title' => 'Tambah Data User',
            'menuAdminUser' => 'active',
           
        );
        return view('admin/user/create',$data);
    }

    public function store(Request $request){
        $request->validate([
            'nama' =>'required',
            'email'=>'required|unique:users,email',
            'jabatan' =>'required',
            'password' =>'required|confirmed|min:8',
        ],[
            'nama.required' =>'Nama Tidak Boleh Kosong',
            'email.required' =>'email Tidak Boleh Kosong',
            'email.unique' =>'Email ini Sudah Terdaftar',
            'jabatan.required' =>'Jabatan Tidak Boleh Kosong',
            

            'password.required' =>'Password Tidak Boleh Kosong',
            'passwword.confirmed' =>'Password Konfirmasi Tidak Sama',
            'password.min' =>'Password Minimal 8 Karakter',
        ]);
        $user = new User;
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->jabatan = $request->jabatan;
        $user->cabang_id = $request->cabang_id;
        $user->password = Hash::make($request->password);
        $user->is_tugas = false;
        $user->save();
        return redirect()->route('user')->with('success','Data Berhasil Ditambahkan');
    }
}
