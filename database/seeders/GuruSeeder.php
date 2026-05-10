<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('guru')->insert([
            [
                'usn' => 'guru_bk',
                'nama_lengkap' => 'Tiara Wulansari',
                'password' => Hash::make('admin123'),
                'status' => 'Guru BK',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'usn' => 'guru_kelas',
                'nama_lengkap' => 'Sincung Firdaus',
                'password' => Hash::make('admin123'),
                'status' => 'Guru Wali Kelas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'usn' => 'guru_mapel',
                'nama_lengkap' => 'Putra Kesuma',
                'password' => Hash::make('admin123'),
                'status' => 'Guru Kejuruan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}