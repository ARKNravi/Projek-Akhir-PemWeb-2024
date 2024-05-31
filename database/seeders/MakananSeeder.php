<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Makanan;

class MakananSeeder extends Seeder
{
    public function run()
    {
        $makananData = [
            ['menu_makanan' => 'Coffee Break', 'harga_makanan' => 50000],
            ['menu_makanan' => 'Breakfast', 'harga_makanan' => 75000],
            ['menu_makanan' => 'Lunch', 'harga_makanan' => 120000],
            ['menu_makanan' => 'Dinner', 'harga_makanan' => 120000],
        ];

        foreach ($makananData as $makanan) {
            Makanan::create($makanan);
        }
    }
}
