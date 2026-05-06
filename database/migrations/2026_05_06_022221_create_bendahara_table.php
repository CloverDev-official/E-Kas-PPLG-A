<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bendahara', function (Blueprint $table) {
            $table->id();
            $table->string('usn', 50)->unique();
            $table->string('nama_lengkap', 100);
            $table->string('password', 255);
            $table->string('role', 20)->default('bendahara');
            $table->string('jabatan', 50)->nullable()->default('Bendahara');
            $table->string('session', 255)->nullable();
            $table->timestamps();
        });

        DB::table('bendahara')->insert([
            ['usn' => 'bendahara1', 'nama_lengkap' => 'Muhammad Ghaizan Pratama Maulana', 'password' => Hash::make('bendahara123'), 'role' => 'bendahara', 'jabatan' => 'Ketua Bendahara', 'created_at' => now(), 'updated_at' => now()],
            ['usn' => 'bendahara2', 'nama_lengkap' => 'Syahid Mubarak', 'password' => Hash::make('bendahara123'), 'role' => 'bendahara', 'jabatan' => 'Wakil Bendahara', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('bendahara');
    }
};