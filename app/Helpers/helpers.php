<?php

use Illuminate\Support\Facades\Auth;

if (! function_exists('currentUser')) {

    function currentUser()
    {
        $guards = [
            'admin',
            'bendahara',
            'guru',
            'murid'
        ];

        foreach ($guards as $guard) {

            if (Auth::guard($guard)->check()) {
                return Auth::guard($guard)->user();
            }
        }

        return null;
    }
}

if (! function_exists('currentGuard')) {

    function currentGuard(): ?string
    {
        $guards = [
            'admin',
            'bendahara',
            'guru',
            'murid'
        ];

        foreach ($guards as $guard) {

            if (Auth::guard($guard)->check()) {
                return $guard;
            }
        }

        return null;
    }
}

/*
|--------------------------------------------------------------------------
| Role Helpers
|--------------------------------------------------------------------------
*/

if (! function_exists('isAdmin')) {

    function isAdmin(): bool
    {
        return currentGuard() === 'admin';
    }
}

if (! function_exists('isBendahara')) {

    function isBendahara(): bool
    {
        return currentGuard() === 'bendahara';
    }
}

if (! function_exists('isGuru')) {

    function isGuru(): bool
    {
        return currentGuard() === 'guru';
    }
}

if (! function_exists('isMurid')) {

    function isMurid(): bool
    {
        return currentGuard() === 'murid';
    }
}

/*
|--------------------------------------------------------------------------
| Format Rupiah
|--------------------------------------------------------------------------
*/

if (! function_exists('rupiah')) {

    function rupiah($angka): string
    {
        return 'Rp ' . number_format($angka, 0, ',', '.');
    }
}

/*
|--------------------------------------------------------------------------
| Format Tanggal Indonesia
|--------------------------------------------------------------------------
*/

if (! function_exists('tanggalIndonesia')) {

    function tanggalIndonesia($tanggal): string
    {
        return \Carbon\Carbon::parse($tanggal)
            ->translatedFormat('d F Y');
    }
}