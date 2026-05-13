<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pembayaran_minggu', function (Blueprint $table) {
            $table->id();

            $table->foreignId('murid_id')
                ->constrained('murid')
                ->cascadeOnDelete();

            $table->tinyInteger('minggu_ke');
            $table->string('bulan', 20);
            $table->char('tahun', 4);
            $table->string('status', 20)->default('lunas');
            $table->string('metode_pembayaran', 50)->nullable();
            $table->decimal('jumlah', 15, 2);
            $table->text('keterangan')->nullable();
            $table->date('tanggal_bayar');

            $table->unsignedBigInteger('created_by_id');
            $table->string('created_by_role', 20);

            $table->softDeletes();
            $table->timestamps();

            $table->unique(['murid_id', 'minggu_ke', 'bulan', 'tahun'], 'pembayaran_minggu_unique');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pembayaran_minggu');
    }
};
