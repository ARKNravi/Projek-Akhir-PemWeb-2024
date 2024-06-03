<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            // AdminSeeder::class,
            // SessionSeeder::class,
            // PemesanSeeder::class,
            // PaymentSeeder::class,
            // PaketSeeder::class,
            // MakananSeeder::class,
            // LayoutSeeder::class,
            // RuanganSeeder::class,
            OrderSeeder::class,
        ]);
    }
}