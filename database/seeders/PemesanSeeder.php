<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PemesanSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $data = [];

        for ($i = 1; $i <= 100; $i++) {
            $data[] = [
                'nama' => $faker->name,
                'nomor_telepon' => $faker->phoneNumber,
                'tipe' => $faker->randomElement(['VIP', 'Regular']),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('pemesan')->insert($data);
    }
}
