<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BendaharaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bendahara')->insert([
            [
                'usn' => 'bendahara1',
                'nama_lengkap' => 'Muhammad Ghaizan Pratama Maulana',
                'password' => Hash::make('bendahara123'),
                'jabatan' => 'Ketua Bendahara',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'usn' => 'bendahara2',
                'nama_lengkap' => 'Syahid Mubarak',
                'password' => Hash::make('bendahara123'),
                'jabatan' => 'Wakil Bendahara',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}