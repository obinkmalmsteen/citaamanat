<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckMobileMode
{
    public function handle(Request $request, Closure $next)
    {
        // Jika mobile mode DIMATIKAN
        if ((int) setting('mobile_mode_active') !== 1) {

            // fallback ke landing web
            return redirect()->route('landingpage');
        }

        return $next($request);
    }
}
