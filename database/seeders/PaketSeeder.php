<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Paket;

class PaketSeeder extends Seeder
{
    public function run()
    {
        $paketData = [
            ['nama' => 'Halfday', 'harga_total' => 180000, 'id_makanan' => json_encode([1, 2, 3])],
            ['nama' => 'Fullday', 'harga_total' => 220000,  'id_makanan' => json_encode([1, 2, 3, 4])],
            ['nama' => 'One Day', 'harga_total' => 280000,  'id_makanan' => json_encode([2, 3])],
            ['nama' => 'Fullboard (Twin)', 'harga_total' => 450000,  'id_makanan' => json_encode([2, 3, 4])],
            ['nama' => 'Fullboard (Single)', 'harga_total' => 600000,  'id_makanan' => json_encode([1])],
        ];

        foreach ($paketData as $paket) {
            Paket::create($paket);
        }
    }
}
