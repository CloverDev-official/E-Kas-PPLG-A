<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PembayaranMurid extends Model
{
    use SoftDeletes;

    protected $table = 'pembayaran_murid';

    protected $fillable = [
        'murid_id',
        'jumlah',
        'tanggal',
        'keterangan',
        'created_by_id',
        'created_by_role'
    ];

    protected $casts = [
        'tanggal' => 'date',
        'jumlah' => 'decimal:2',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relasi
    |--------------------------------------------------------------------------
    */

    public function murid()
    {
        return $this->belongsTo(Murid::class);
    }
}