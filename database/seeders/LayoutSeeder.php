<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LayoutSeeder extends Seeder
{
    public function run()
    {
        DB::table('layout')->insert([
            ['nama_layout' => 'Layout A', 'harga' => 100000.00, 'jumlahOrang' => 50, 'created_at' => now(), 'updated_at' => now()],
            ['nama_layout' => 'Layout B', 'harga' => 200000.00, 'jumlahOrang' => 100, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}