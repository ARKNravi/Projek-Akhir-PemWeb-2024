<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Makanan;

class MakananSeeder extends Seeder
{
    public function run()
    {
        Makanan::create([
            'menu_makanan' => 'Nasi Goreng',
            'harga_makanan' => 25.00,
        ]);
    }
}