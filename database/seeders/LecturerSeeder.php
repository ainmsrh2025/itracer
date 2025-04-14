<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LecturerSeeder extends Seeder
{
    public function run()
    {
        DB::table('lecturers')->insert([
            [
                'name' => 'Perakaunan',
                'kos' => 'Perakaunan',
                'password' => Hash::make('dbe123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Seni Kulinari',
                'kos' => 'Seni Kulinari',
                'password' => Hash::make('dha123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Seni Reka Fesyen',
                'kos' => 'Seni Reka Fesyen',
                'password' => Hash::make('ddc123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Teknologi Automotif',
                'kos' => 'Teknologi Automotif',
                'password' => Hash::make('dmd123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Teknologi Penyejukan dan Penyamanan Udara',
                'kos' => 'Teknologi Penyejukan dan Penyamanan Udara',
                'password' => Hash::make('dmc123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Teknologi Maklumat',
                'kos' => 'Teknologi Maklumat',
                'password' => Hash::make('dkb123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Teknologi Komputeran',
                'kos' => 'Teknologi Komputeran',
                'password' => Hash::make('dka123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
