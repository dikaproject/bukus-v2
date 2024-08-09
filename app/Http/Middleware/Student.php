<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Student
{
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::guard('student')->check())
        {
            return redirect()->route('student_login')->with('error', 'Mohon Login dulu sebelum akses dashboard siswa.');
        }
        return $next($request);
    }
}
