<?php

namespace App\Services;

use App\Models\RiwayatTransaksi;
use App\Models\TotalKas;
use Illuminate\Support\Facades\DB;

class KasService
{
    public static function tambahTransaksi(array $data)
    {
        DB::transaction(function () use ($data) {

            // simpan transaksi
            RiwayatTransaksi::create([
                'murid_id' => $data['murid_id'],
                'tipe' => $data['tipe'],
                'nama' => $data['nama'],
                'metode_pembayaran' => $data['metode_pembayaran'],
                'jumlah' => $data['jumlah'],
                'tanggal_waktu' => now(),
                'keterangan' => $data['keterangan'],
                'created_by' => $data['created_by'],
            ]);

            // ambil total kas
            $totalKas = TotalKas::first();

            // update saldo
            if ($data['tipe'] === 'pemasukan') {

                $totalKas->increment(
                    'total_saldo',
                    $data['jumlah']
                );

            } else {

                $totalKas->decrement(
                    'total_saldo',
                    $data['jumlah']
                );
            }

            $totalKas->update([
                'last_updated' => now()
            ]);
        });
    }
}