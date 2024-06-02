<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            // // LayoutSeeder::class,
            RuanganSeeder::class,
            // MakananSeeder::class,
            // // PaketSeeder::class,
        ]);
    }
}