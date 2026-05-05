<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Guru extends Authenticatable
{
    protected $table = 'guru';
    protected $fillable = [
        'usn',
        'nama_lengkap',
        'password',
        'role',
        'status',
        'session'
    ];
    protected $hidden = ['password'];
}