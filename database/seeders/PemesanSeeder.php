<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pemesan;
use Faker\Factory as Faker;

class PemesanSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) {
            Pemesan::create([
                'nik' => $faker->numerify('###############'),
                'nama' => $faker->name,
                'nama_perusahaan' => $faker->company,
                'nomor_telepon' => $faker->phoneNumber,
                'tipe' => $faker->randomElement(['Internal', 'Eksternal']),
            ]);
        }
    }
}
