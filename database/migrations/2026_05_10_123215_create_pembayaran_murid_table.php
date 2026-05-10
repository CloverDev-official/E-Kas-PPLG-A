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
        Schema::create('pembayaran_murid', function (Blueprint $table) {

            $table->id();

            $table->foreignId('murid_id')
                ->constrained('murid')
                ->cascadeOnDelete();

            $table->softDeletes();
            
            $table->decimal('jumlah', 15, 2);

            $table->date('tanggal');

            $table->text('keterangan')->nullable();

            $table->unsignedBigInteger('created_by_id');

            $table->string('created_by_role');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran_murid');
    }
};
