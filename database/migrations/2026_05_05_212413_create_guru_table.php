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
        Schema::create('guru', function (Blueprint $table) {
            $table->id();
            $table->string('usn', 50)->unique();
            $table->string('nama_lengkap', 100);
            $table->string('password', 255);
            $table->string('role', 20)->default('guru');
            $table->string('status', 50)->nullable();
            $table->string('session', 255)->nullable();
            $table->timestamps();
        });

        DB::table('guru')->insert([
            ['usn' => 'guru_bk', 'nama_lengkap' => 'Tiara Wulansari', 'password' => Hash::make('admin123'), 'role' => 'guru', 'status' => 'Guru BK', 'created_at' => now(), 'updated_at' => now()],
            ['usn' => 'guru_kelas', 'nama_lengkap' => 'Sincung Firdaus', 'password' => Hash::make('admin123'), 'role' => 'guru', 'status' => 'Guru Wali Kelas', 'created_at' => now(), 'updated_at' => now()],
            ['usn' => 'guru_mapel', 'nama_lengkap' => 'Putra Kesuma', 'password' => Hash::make('admin123'), 'role' => 'guru', 'status' => 'Guru Kejuruan', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('guru');
    }
};