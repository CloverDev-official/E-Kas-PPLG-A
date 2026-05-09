<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect('/login');
});

Route::livewire('/login', 'pages.login');

Route::post('/logout', function () {

    Auth::guard('murid')->logout();
    Auth::guard('guru')->logout();
    Auth::guard('admin')->logout();
    Auth::guard('bendahara')->logout();

    session()->invalidate();
    session()->regenerateToken();

    return redirect('/login');

})->name('logout');


Route::middleware([
    'auth:murid,guru,admin,bendahara'
])->group(function () {

    Route::livewire('/dashboard', 'pages.murid.dashboard')
        ->name('dashboard');

    Route::livewire('/list-kas', 'pages.murid.list-kas')
        ->name('list-kas');

    Route::livewire('/history', 'pages.murid.history')
        ->name('history');


    // khusus bendahara
    Route::middleware(['role:bendahara'])->group(function () {

        Route::get('/bendahara/dashboard', function () {

            return 'Halaman khusus Bendahara';

        });

    });

});