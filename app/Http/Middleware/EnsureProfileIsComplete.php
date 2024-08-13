<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureProfileIsComplete
{
    public function handle(Request $request, Closure $next)
    {
        if (auth('student')->check() && is_null(auth('student')->user()->email)) {
            return redirect()->route('students.complete.profile');  // Redirect to the profile completion form
        }

        return $next($request);
    }
}
