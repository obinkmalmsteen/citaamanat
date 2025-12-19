<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MobileAuthController extends Controller
{
 public function showLogin()
{
    return view('mobilemasjid.mobilelogin');
}


    public function login(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'password' => 'required|min:8',
        ]);

        if (!Auth::attempt($request->only('nama', 'password'))) {
            return back()->with('error', 'Nama atau Password salah');
        }

        // 🔥 MOBILE LOGIN TIDAK PERNAH KE ADMIN PANEL
        return redirect()->route('mobilelandingpage')
            ->with('success', 'Login berhasil');
    }

public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()
        ->route('mobilelandingpage')
        ->with('logout_success', true);
}


}
