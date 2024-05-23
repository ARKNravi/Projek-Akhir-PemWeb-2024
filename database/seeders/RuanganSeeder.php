<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RuanganSeeder extends Seeder
{
    public function run()
    {
        DB::table('ruangan')->insert([
            ['nama_ruangan' => 'Ruangan A', 'luas_ruangan' => 50, 'harga' => 1000000.00, 'backdrop' => 'Scenic', 'id_layout' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['nama_ruangan' => 'Ruangan B', 'luas_ruangan' => 100, 'harga' => 2000000.00, 'backdrop' => 'Corporate', 'id_layout' => 2, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
