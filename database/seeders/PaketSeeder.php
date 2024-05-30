<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Paket;

class PaketSeeder extends Seeder
{
    public function run()
    {
        Paket::create([
            'nama' => 'Paket A',
            'harga_total' => 1500.00,
            'id_ruangan' => 1, // Assuming RuanganSeeder has run and created a ruangan with ID 1
            'id_makanan' => 1, // Assuming MakananSeeder has run and created a makanan with ID 1
        ]);
    }
}