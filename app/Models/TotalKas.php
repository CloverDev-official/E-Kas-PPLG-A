<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TotalKas extends Model
{
    protected $table = 'total_kas';
    protected $fillable = ['total_saldo', 'last_updated'];
    public $timestamps = false;
}