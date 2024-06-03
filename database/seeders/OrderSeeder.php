<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Pemesan;
use Faker\Factory as Faker;

class OrderSeeder extends Seeder
{
    public function run()
    {

        $faker = Faker::create();

        // Fetch all NIKs from the pemesan table
        $niks = Pemesan::pluck('nik')->toArray();

        for ($i = 0; $i < 50; $i++) {
            Order::create([
                'tanggal' => $faker->dateTimeBetween('-1 year', 'now'),
                'id_paket' => $faker->numberBetween(1, 5),
                'id_payment' => 1, // Assuming this stays constant
                'nik' => $faker->randomElement($niks),
                'id_admin' => 1, // Assuming this stays constant
                'id_ruangan' => $faker->numberBetween(1, 13),
                'status' => $faker->randomElement(['Check Out', 'Check In', 'Reservasi with NO DP', 'Reservasi with DP']),
                'dokumentasi' => $faker->sentence,
            ]);
        }
    }
}
