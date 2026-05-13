<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PembayaranMinggu extends Model
{
    use SoftDeletes;

    protected $table = 'pembayaran_minggu';

    protected $fillable = [
        'murid_id',
        'minggu_ke',
        'bulan',
        'tahun',
        'status',
        'metode_pembayaran',
        'jumlah',
        'keterangan',
        'tanggal_bayar',
        'created_by_id',
        'created_by_role',
    ];

    protected $casts = [
        'tanggal_bayar' => 'date',
        'jumlah' => 'decimal:2',
        'minggu_ke' => 'integer',
    ];

    public function murid()
    {
        return $this->belongsTo(Murid::class);
    }
}
