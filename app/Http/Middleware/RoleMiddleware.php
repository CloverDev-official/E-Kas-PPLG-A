<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(
        Request $request,
        Closure $next,
        ...$roles
    ) {

        $guards = [
            'admin',
            'bendahara',
            'guru',
            'murid'
        ];

        foreach ($guards as $guard) {

            if (Auth::guard($guard)->check()) {

                if (in_array($guard, $roles)) {
                    return $next($request);
                }

                abort(403, 'Akses ditolak.');
            }
        }

        return redirect('/login');
    }
}