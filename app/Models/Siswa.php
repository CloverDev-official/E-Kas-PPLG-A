<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Siswa extends Authenticatable
{
    protected $table = 'siswa';
    protected $fillable = [
        'nipd',
        'nama_lengkap',
        'password',
        'role',
        'session',
        'jenis_kelamin'
    ];
    protected $hidden = ['password'];
}