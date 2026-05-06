<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Bendahara extends Authenticatable
{
    protected $table = 'bendahara';
    
    protected $fillable = [
        'usn',
        'nama_lengkap',
        'password',
        'role',
        'jabatan',
        'session'
    ];
    
    protected $hidden = [
        'password',
    ];
}