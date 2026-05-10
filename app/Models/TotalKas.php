<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TotalKas extends Model
{
    protected $table = 'total_kas';

    protected $fillable = [
        'total_saldo',
        'last_updated'
    ];

    public $timestamps = false;

    protected $casts = [
        'total_saldo' => 'decimal:2',
        'last_updated' => 'datetime',
    ];

    public static function saldo()
    {
        return self::first()->total_saldo ?? 0;
    }
}