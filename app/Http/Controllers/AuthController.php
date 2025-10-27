<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
        public function login()
    {
        return view ('auth/login'); // tampilan form login
    } 

    public function loginProses(Request $request){
        $request ->validate([
            'nama' =>'required',
            'password' => 'required|min:8',
        ],[
            'nama.required' =>'nama Tidak Boleh Kosong',
            'password.requied' => 'Password Tidak Boleh Kosong',
            'password.min' => 'Password Minimal 8 Karakter',

        ]);

        $data = array(
            'nama' => $request->nama,
            'password' =>$request->password,
        );

        if(Auth::attempt($data)){
            return redirect()->route('dashboard')->with('success','Anda Berhasil Login');
        }else{
            return redirect()->back()->with('error','Kode User atau Password Salah');
        }
    }
    public function logout(){
        Auth::logout();
         return redirect()->route('login')->with('success','Anda Berhasil Logout');
    }
}
