<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            LayoutSeeder::class,
            MakananSeeder::class,
            PemesanSeeder::class,
            PaymentSeeder::class,
            SessionSeeder::class,
            RuanganSeeder::class,
            PaketSeeder::class,
            OrderSeeder::class,
        ]);
    }
}