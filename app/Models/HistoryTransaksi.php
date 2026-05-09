<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoryTransaksi extends Model
{
    protected $table = 'history_transaksi';
    protected $fillable = [
        'murid_id',
        'tipe',
        'nama',
        'metode_pembayaran',
        'jumlah',
        'tanggal_waktu',
        'keterangan'
    ];
}