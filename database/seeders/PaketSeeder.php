<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Paket;

class PaketSeeder extends Seeder
{
    public function run()
    {
        $paketData = [
            ['nama' => 'Halfday', 'harga_total' => 180000, 'id_ruangan' => 3, 'id_makanan' => json_encode([3, 4, 5])],
            ['nama' => 'Fullday', 'harga_total' => 220000, 'id_ruangan' => 4, 'id_makanan' => json_encode([3, 4, 5, 6])],
            ['nama' => 'One Day', 'harga_total' => 280000, 'id_ruangan' => 5, 'id_makanan' => json_encode([4, 5])],
            ['nama' => 'Fullboard (Twin)', 'harga_total' => 450000, 'id_ruangan' => 6, 'id_makanan' => json_encode([3, 4, 6])],
            ['nama' => 'Fullboard (Single)', 'harga_total' => 600000, 'id_ruangan' => 7, 'id_makanan' => json_encode([3])],
        ];

        foreach ($paketData as $paket) {
            Paket::create($paket);
        }
    }
}
