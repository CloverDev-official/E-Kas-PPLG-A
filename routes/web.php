<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Login;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', Login::class)->name('login');

Route::post('/logout', function () {
    Auth::guard('siswa')->logout();
    Auth::guard('guru')->logout();
    Auth::guard('admin')->logout();
    Auth::guard('bendahara')->logout();
    session()->invalidate();
    session()->regenerateToken();
    return redirect('/login');
})->name('logout');

Route::middleware(['auth:siswa,guru,admin,bendahara'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Contoh route khusus bendahara
    Route::middleware(['role:bendahara'])->group(function () {
        Route::get('/bendahara/dashboard', function () {
            return 'Halaman khusus Bendahara';
        });
    });
});