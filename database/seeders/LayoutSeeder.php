<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Layout;

class LayoutSeeder extends Seeder
{
    public function run()
    {
        Layout::create([
            'nama_layout' => 'Theater',
            'harga' => 500.00,
            'jumlahOrang' => 100,
        ]);
    }
}