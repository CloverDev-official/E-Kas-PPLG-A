<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('total_kas', function (Blueprint $table) {
            $table->id();
            $table->decimal('total_saldo', 15, 2)->default(0);
            $table->timestamp('last_updated')->nullable();
        });

        DB::table('total_kas')->insert([
            'id' => 1,
            'total_saldo' => 0,
            'last_updated' => now(),
        ]);

        DB::unprepared('
            CREATE TRIGGER update_total_kas_after_insert
            AFTER INSERT ON history_transaksi
            FOR EACH ROW
            BEGIN
                IF NEW.tipe = "pemasukan" THEN
                    UPDATE total_kas SET total_saldo = total_saldo + NEW.jumlah, last_updated = NOW() WHERE id = 1;
                ELSE
                    UPDATE total_kas SET total_saldo = total_saldo - NEW.jumlah, last_updated = NOW() WHERE id = 1;
                END IF;
            END
        ');
    }

    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS update_total_kas_after_insert');
        Schema::dropIfExists('total_kas');
    }
};