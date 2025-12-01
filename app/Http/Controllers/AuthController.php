<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth/login'); // tampilan form login
    }

    public function loginProses(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'password' => 'required|min:8',
        ], [
            'nama.required' => 'Nama Tidak Boleh Kosong',
            'password.required' => 'Password Tidak Boleh Kosong',
            'password.min' => 'Password Minimal 8 Karakter',
        ]);

        $data = [
            'nama' => $request->nama,
            'password' => $request->password,
        ];

        if (Auth::attempt($data)) {
            $user = Auth::user(); // ambil data user yang sedang login

            // cek jabatan user
            if ($user->jabatan === 'Admin') {
                return redirect()->route('dashboard')->with('success', 'Selamat datang, Admin!');
            } elseif ($user->jabatan === 'User') {
                return redirect()->route('masjid')->with('success', 'Selamat datang, User!');
                 } elseif ($user->jabatan === 'Karyawan') {
                return redirect()->route('dapurdashboard')->with('success', 'Selamat datang, Karyawan!');
            } else {
                // jika jabatan tidak dikenali
                Auth::logout();
                return redirect()->route('login')->with('error', 'Jabatan tidak dikenali.');
            }
        } else {
            return redirect()->back()->with('error', 'Nama atau Password Salah');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Anda Berhasil Logout');
    }
}
