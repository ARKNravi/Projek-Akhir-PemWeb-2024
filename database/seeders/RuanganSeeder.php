<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ruangan;

class RuanganSeeder extends Seeder
{
    public function run()
    {
        Ruangan::create([
            'nama_ruangan' => 'Ruang A',
            'kapasitas' => 50,
            'harga' => 1000.00,
            'backdrop' => 'Default',
            'id_layout' => 1, // Assuming LayoutSeeder has run and created a layout with ID 1
        ]);
    }
}