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
        Schema::create('admin', function (Blueprint $table) {
            $table->id();
            $table->string('usn', 50)->unique();
            $table->string('nama_lengkap', 100);
            $table->string('password', 255);
            $table->string('role', 20)->default('admin');
            $table->string('session', 255)->nullable();
            $table->timestamps();
        });

        DB::table('admin')->insert([
            ['usn' => 'admin_sekolah', 'nama_lengkap' => 'Administrator Utama', 'password' => Hash::make('admin123'), 'role' => 'admin', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('admin');
    }
};