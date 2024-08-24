<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $guards = ['web', 'admin'];  // Daftar semua guard yang digunakan

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check() && Auth::guard($guard)->user()->hasAnyRole($roles)) {
                return $next($request);
            }
        }

        return redirect('/');  // Atau halaman yang sesuai untuk unauthorized access
    }
}
