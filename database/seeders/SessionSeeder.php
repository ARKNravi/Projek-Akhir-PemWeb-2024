<?php

namespace Database\Seeders;

use App\Models\Sesi;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DateTime;

class SessionSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) {
            // Random date within a specified range
            $tanggal = $faker->dateTimeBetween('2024-01-01', '2024-12-31');
            $waktu_mulai = $faker->dateTimeBetween($tanggal->format('Y-m-d') . ' 08:00:00', $tanggal->format('Y-m-d') . ' 16:00:00');
            $waktu_selesai = (clone $waktu_mulai)->modify('+2 hours');

            // Ensure the end time does not go past 18:00:00
            if ($waktu_selesai->format('H:i:s') > '18:00:00') {
                $waktu_selesai = new DateTime($tanggal->format('Y-m-d') . ' 18:00:00');
            }

            Sesi::create([
                'tanggal' => $tanggal->format('Y-m-d'),
                'waktu_mulai' => $waktu_mulai->format('Y-m-d H:i:s'),
                'waktu_selesai' => $waktu_selesai->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
