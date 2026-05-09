<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('history_transaksi', function (Blueprint $table) {
        $table->id();

        $table->foreignId('murid_id')
            ->constrained('murid')
            ->onDelete('cascade');

        $table->enum('tipe', ['pemasukan', 'pengeluaran']);
        $table->string('nama', 100);
        $table->string('metode_pembayaran', 50);
        $table->decimal('jumlah', 15, 2);
        $table->dateTime('tanggal_waktu');
        $table->text('keterangan')->nullable();
        $table->string('created_by', 100)->nullable();

        $table->timestamps();
    });
    }

    public function down(): void
    {
        Schema::dropIfExists('history_transaksi');
    }
};