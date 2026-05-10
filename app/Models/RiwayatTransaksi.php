<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatTransaksi extends Model
{
    protected $table = 'riwayat_transaksi';
    protected $fillable = [ 
        'tipe',
        'nama',
        'metode_pembayaran',
        'jumlah',
        'tanggal_waktu',
        'keterangan'
    ];
}
