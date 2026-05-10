<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiKas extends Model
{
    protected $table = 'transaksi_kas';

    protected $fillable = [
        'tipe',
        'nama',
        'jumlah',
        'metode_pembayaran',
        'tanggal_waktu',
        'keterangan',
        'created_by_role',
        'created_by_id'
    ];

    protected $casts = [
        'tanggal_waktu' => 'datetime',
        'jumlah' => 'decimal:2',
    ];
}