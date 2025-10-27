<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class checkLogin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Pastikan sudah login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Anda Belum Login');
        }

        // Jika role/jabatan tidak diset di middleware, lewati pengecekan role
        if (empty($roles)) {
            return $next($request);
        }

        $user = Auth::user();

        // Jika jabatan user tidak sesuai dengan yang diizinkan
        if (!in_array($user->jabatan, $roles)) {
            abort(403, 'Akses ditolak: Anda tidak memiliki izin untuk halaman ini.');
        }

        return $next($request);
    }
}
