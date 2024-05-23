<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KamarSeeder extends Seeder
{
    public function run()
    {
        DB::table('kamar')->insert([
            ['tipe' => 'Standard', 'harga' => 300000.00, 'created_at' => now(), 'updated_at' => now()],
            ['tipe' => 'Deluxe', 'harga' => 500000.00, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
