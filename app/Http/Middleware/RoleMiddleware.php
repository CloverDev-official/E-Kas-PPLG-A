<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = null;
        if (Auth::guard('siswa')->check()) {
            $user = Auth::guard('siswa')->user();
            $user->role = 'siswa';
        } elseif (Auth::guard('guru')->check()) {
            $user = Auth::guard('guru')->user();
            $user->role = 'guru';
        } elseif (Auth::guard('admin')->check()) {
            $user = Auth::guard('admin')->user();
            $user->role = 'admin';
        } elseif (Auth::guard('bendahara')->check()) {
            $user = Auth::guard('bendahara')->user();
            $user->role = 'bendahara';
        }

        if (!$user) {
            return redirect('/login');
        }

        if (!in_array($user->role, $roles)) {
            abort(403, 'Akses ditolak.');
        }

        return $next($request);
    }
}
