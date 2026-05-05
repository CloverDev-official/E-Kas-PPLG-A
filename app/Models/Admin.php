<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = 'admin';
    protected $fillable = [
        'usn',
        'nama_lengkap',
        'password',
        'role',
        'session'
    ];
    protected $hidden = ['password'];
}