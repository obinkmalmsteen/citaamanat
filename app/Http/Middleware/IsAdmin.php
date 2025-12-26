<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
public function handle($request, Closure $next)
{
    if (! auth()->check()) {
        return redirect()->route('login');
    }

    if (strtolower(trim(auth()->user()->role)) !== 'Admin') {
        abort(403, 'Akses khusus admin');
    }

    return $next($request);
}


}
