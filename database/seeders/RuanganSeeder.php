<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ruangan;

class RuanganSeeder extends Seeder
{
    public function run()
    {
        $ruangans = [
            ['nama_ruangan' => 'Mango', 'kapasitas' => 48, 'harga' => 0, 'backdrop' => "Mango", 'id_layout' => 6],
            ['nama_ruangan' => 'Citrus', 'kapasitas' => 20, 'harga' => 0, 'backdrop' => "Citrus", 'id_layout' => 10],
            ['nama_ruangan' => 'Banana', 'kapasitas' => 12, 'harga' => 0, 'backdrop' => "Banana", 'id_layout' => 14],
            ['nama_ruangan' => 'Apple', 'kapasitas' => 60, 'harga' => 0, 'backdrop' => "Apple", 'id_layout' => 18],
            ['nama_ruangan' => 'Test', 'kapasitas' => 0, 'harga' => 0, 'backdrop' => "0", 'id_layout' => 19],
        ];

        foreach ($ruangans as $ruangan) {
            Ruangan::create($ruangan);
        }
    }
}
