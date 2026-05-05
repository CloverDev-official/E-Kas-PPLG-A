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
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->string('nipd', 20)->unique();
            $table->string('nama_lengkap', 100);
            $table->string('password', 255);
            $table->string('role', 20)->default('siswa');
            $table->string('session', 255)->nullable();
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->timestamps();
        });

        DB::table('siswa')->insert([
            ['nipd' => '11107', 'nama_lengkap' => 'AHMAD ADITYA ALFARIS', 'password' => Hash::make('xipplga'), 'role' => 'siswa', 'jenis_kelamin' => 'L', 'created_at' => now(), 'updated_at' => now()],
            ['nipd' => '11108', 'nama_lengkap' => 'AKHMAD NOOR WAHYUNI', 'password' => Hash::make('xipplga'), 'role' => 'siswa', 'jenis_kelamin' => 'L', 'created_at' => now(), 'updated_at' => now()],
            ['nipd' => '11109', 'nama_lengkap' => 'ANNISA MAULIDINA', 'password' => Hash::make('xipplga'), 'role' => 'siswa', 'jenis_kelamin' => 'P', 'created_at' => now(), 'updated_at' => now()],
            ['nipd' => '11110', 'nama_lengkap' => 'APRI MAHARDIKA', 'password' => Hash::make('xipplga'), 'role' => 'siswa', 'jenis_kelamin' => 'L', 'created_at' => now(), 'updated_at' => now()],
            ['nipd' => '11111', 'nama_lengkap' => 'DERRICK ADILLA RAHMAN', 'password' => Hash::make('xipplga'), 'role' => 'siswa', 'jenis_kelamin' => 'L', 'created_at' => now(), 'updated_at' => now()],
            ['nipd' => '11112', 'nama_lengkap' => 'DINI', 'password' => Hash::make('xipplga'), 'role' => 'siswa', 'jenis_kelamin' => 'P', 'created_at' => now(), 'updated_at' => now()],
            ['nipd' => '11113', 'nama_lengkap' => 'FAJAR RAHMAN SYAHPUTRA', 'password' => Hash::make('xipplga'), 'role' => 'siswa', 'jenis_kelamin' => 'L', 'created_at' => now(), 'updated_at' => now()],
            ['nipd' => '11114', 'nama_lengkap' => 'FARHAN RADHITYA', 'password' => Hash::make('xipplga'), 'role' => 'siswa', 'jenis_kelamin' => 'L', 'created_at' => now(), 'updated_at' => now()],
            ['nipd' => '11115', 'nama_lengkap' => 'GHAIDA ALTHAF FALIHA', 'password' => Hash::make('xipplga'), 'role' => 'siswa', 'jenis_kelamin' => 'P', 'created_at' => now(), 'updated_at' => now()],
            ['nipd' => '11116', 'nama_lengkap' => 'IBRAHIM', 'password' => Hash::make('xipplga'), 'role' => 'siswa', 'jenis_kelamin' => 'L', 'created_at' => now(), 'updated_at' => now()],
            ['nipd' => '11118', 'nama_lengkap' => 'M. SOLLY ASSLAM', 'password' => Hash::make('xipplga'), 'role' => 'siswa', 'jenis_kelamin' => 'L', 'created_at' => now(), 'updated_at' => now()],
            ['nipd' => '11119', 'nama_lengkap' => 'MEISYA RAIHANA PUTRI', 'password' => Hash::make('xipplga'), 'role' => 'siswa', 'jenis_kelamin' => 'P', 'created_at' => now(), 'updated_at' => now()],
            ['nipd' => '11120', 'nama_lengkap' => 'MUHAMMAD ARIPIN', 'password' => Hash::make('xipplga'), 'role' => 'siswa', 'jenis_kelamin' => 'L', 'created_at' => now(), 'updated_at' => now()],
            ['nipd' => '11121', 'nama_lengkap' => 'MUHAMMAD DHIKA', 'password' => Hash::make('xipplga'), 'role' => 'siswa', 'jenis_kelamin' => 'L', 'created_at' => now(), 'updated_at' => now()],
            ['nipd' => '11122', 'nama_lengkap' => 'MUHAMMAD GHAIZAN PRATAMA MAULANA', 'password' => Hash::make('xipplga'), 'role' => 'siswa', 'jenis_kelamin' => 'L', 'created_at' => now(), 'updated_at' => now()],
            ['nipd' => '11124', 'nama_lengkap' => 'MUHAMMAD NAHIZ AUNI', 'password' => Hash::make('xipplga'), 'role' => 'siswa', 'jenis_kelamin' => 'L', 'created_at' => now(), 'updated_at' => now()],
            ['nipd' => '11125', 'nama_lengkap' => 'MUHAMMAD NAUFAL RIZKI', 'password' => Hash::make('xipplga'), 'role' => 'siswa', 'jenis_kelamin' => 'L', 'created_at' => now(), 'updated_at' => now()],
            ['nipd' => '11126', 'nama_lengkap' => 'MUHAMMAD QAIS AL-ASY\'ARI', 'password' => Hash::make('xipplga'), 'role' => 'siswa', 'jenis_kelamin' => 'L', 'created_at' => now(), 'updated_at' => now()],
            ['nipd' => '11127', 'nama_lengkap' => 'MUHAMMAD RAIHAN ABDILLAH SHIDDIQ', 'password' => Hash::make('xipplga'), 'role' => 'siswa', 'jenis_kelamin' => 'L', 'created_at' => now(), 'updated_at' => now()],
            ['nipd' => '11128', 'nama_lengkap' => 'MUHAMMAD REDHA ANSORI', 'password' => Hash::make('xipplga'), 'role' => 'siswa', 'jenis_kelamin' => 'L', 'created_at' => now(), 'updated_at' => now()],
            ['nipd' => '11129', 'nama_lengkap' => 'MUHAMMAD RIDHO HERSA', 'password' => Hash::make('xipplga'), 'role' => 'siswa', 'jenis_kelamin' => 'L', 'created_at' => now(), 'updated_at' => now()],
            ['nipd' => '11130', 'nama_lengkap' => 'MUHAMMAD RIZKY', 'password' => Hash::make('xipplga'), 'role' => 'siswa', 'jenis_kelamin' => 'L', 'created_at' => now(), 'updated_at' => now()],
            ['nipd' => '11131', 'nama_lengkap' => 'MUHAMMAD SULTHAN MUSYAFFA FADHILAH', 'password' => Hash::make('xipplga'), 'role' => 'siswa', 'jenis_kelamin' => 'L', 'created_at' => now(), 'updated_at' => now()],
            ['nipd' => '11132', 'nama_lengkap' => 'NABILLA APRILIA ASTIANY', 'password' => Hash::make('xipplga'), 'role' => 'siswa', 'jenis_kelamin' => 'P', 'created_at' => now(), 'updated_at' => now()],
            ['nipd' => '11133', 'nama_lengkap' => 'NADHIF AL FAREZ', 'password' => Hash::make('xipplga'), 'role' => 'siswa', 'jenis_kelamin' => 'L', 'created_at' => now(), 'updated_at' => now()],
            ['nipd' => '11134', 'nama_lengkap' => 'NORLIANA', 'password' => Hash::make('xipplga'), 'role' => 'siswa', 'jenis_kelamin' => 'P', 'created_at' => now(), 'updated_at' => now()],
            ['nipd' => '11135', 'nama_lengkap' => 'OLIVIA MARGARET', 'password' => Hash::make('xipplga'), 'role' => 'siswa', 'jenis_kelamin' => 'P', 'created_at' => now(), 'updated_at' => now()],
            ['nipd' => '11136', 'nama_lengkap' => 'RAIHAN REZKI RAMADHAN', 'password' => Hash::make('xipplga'), 'role' => 'siswa', 'jenis_kelamin' => 'L', 'created_at' => now(), 'updated_at' => now()],
            ['nipd' => '11137', 'nama_lengkap' => 'RAISA LUTHFIA', 'password' => Hash::make('xipplga'), 'role' => 'siswa', 'jenis_kelamin' => 'P', 'created_at' => now(), 'updated_at' => now()],
            ['nipd' => '11138', 'nama_lengkap' => 'RISKY MAULANA', 'password' => Hash::make('xipplga'), 'role' => 'siswa', 'jenis_kelamin' => 'L', 'created_at' => now(), 'updated_at' => now()],
            ['nipd' => '11139', 'nama_lengkap' => 'SAINA AMANDA PUTRI', 'password' => Hash::make('xipplga'), 'role' => 'siswa', 'jenis_kelamin' => 'P', 'created_at' => now(), 'updated_at' => now()],
            ['nipd' => '11140', 'nama_lengkap' => 'SHAN FAVIAN EFENDY', 'password' => Hash::make('xipplga'), 'role' => 'siswa', 'jenis_kelamin' => 'L', 'created_at' => now(), 'updated_at' => now()],
            ['nipd' => '11141', 'nama_lengkap' => 'SYAHID MUBARAK', 'password' => Hash::make('xipplga'), 'role' => 'siswa', 'jenis_kelamin' => 'L', 'created_at' => now(), 'updated_at' => now()],
            ['nipd' => '11142', 'nama_lengkap' => 'YUMA ACHMAD FAIRUZA', 'password' => Hash::make('xipplga'), 'role' => 'siswa', 'jenis_kelamin' => 'L', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};