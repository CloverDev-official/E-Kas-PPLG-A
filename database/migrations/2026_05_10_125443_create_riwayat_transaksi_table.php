<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('riwayat_transaksi', function (Blueprint $table) {

            $table->id();

            $table->enum('tipe', [
                'pemasukan',
                'pengeluaran'
            ]);

            $table->string('nama', 100);

            $table->decimal('jumlah', 15, 2);

            $table->string('metode_pembayaran', 50);

            $table->dateTime('tanggal_waktu');

            $table->text('keterangan')->nullable();

            $table->string('created_by_role', 20);

            $table->unsignedBigInteger('created_by_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_transaksi');
    }
};
