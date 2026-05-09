<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Murid extends Authenticatable
{
    protected $table = 'murid';
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