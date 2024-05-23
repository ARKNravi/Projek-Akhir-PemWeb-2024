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
            KamarSeeder::class,
            PemesanSeeder::class,
            PaymentSeeder::class,
            SessionSeeder::class,
            RuanganSeeder::class,
            FasilitasSeeder::class,
            PaketSeeder::class,
            OrderSeeder::class,
        ]);
    }
}