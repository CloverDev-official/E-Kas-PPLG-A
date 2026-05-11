<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Redirect Root
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect('/login');
});

/*
|--------------------------------------------------------------------------
| Guest Routes
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {

    Route::livewire('/login', 'pages::auth.login')
        ->name('login');
});

/*
|--------------------------------------------------------------------------
| Logout
|--------------------------------------------------------------------------
*/

Route::post('/logout', function () {

    $guards = [
        'admin',
        'bendahara',
        'guru',
        'murid'
    ];

    foreach ($guards as $guard) {

        if (Auth::guard($guard)->check()) {
            Auth::guard($guard)->logout();
        }
    }

    session()->invalidate();
    session()->regenerateToken();

    return redirect('/login');

})->name('logout');

/*
|--------------------------------------------------------------------------
| Protected Routes
|--------------------------------------------------------------------------
*/

Route::middleware([
    'auth:murid,guru,admin,bendahara'
])->group(function () {

    Route::livewire('/dashboard', 'pages::dashboard')
        ->name('dashboard');

    Route::livewire('/pemasukan-kas', 'pages::pemasukan-kas')
        ->name('pemasukan-kas');

    Route::livewire('/pengeluaran-kas', 'pages::pengeluaran-kas')
        ->name('pengeluaran-kas');

    Route::livewire('/riwayat-kas', 'pages::riwayat-kas')
        ->name('riwayat-kas');

    Route::livewire('/profil', 'pages::profil')
        ->name('profil');

    /*
    |--------------------------------------------------------------------------
    | Admin Only
    |--------------------------------------------------------------------------
    */

    Route::livewire('/users', 'pages.users')
        ->middleware('role:admin')
        ->name('users');

    /*
    |--------------------------------------------------------------------------
    | Admin + Bendahara
    |--------------------------------------------------------------------------
    */

    Route::livewire('/transaksi', 'pages.transaksi')
        ->middleware('role:admin,bendahara')
        ->name('transaksi');
});