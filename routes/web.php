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

    Route::livewire('/login', 'pages.login')
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

    Route::livewire('/dashboard', 'pages.dashboard')
        ->name('dashboard');

    Route::livewire('/list-kas', 'pages.list-kas')
        ->name('list-kas');

    Route::livewire('/history', 'pages.history')
        ->name('history');

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