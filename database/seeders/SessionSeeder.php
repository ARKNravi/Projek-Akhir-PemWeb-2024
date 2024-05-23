<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SessionSeeder extends Seeder
{
    public function run()
    {
        DB::table('session')->insert([
            ['waktu_mulai' => '2024-06-01 08:00:00', 'waktu_selesai' => '2024-06-01 12:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['waktu_mulai' => '2024-06-01 13:00:00', 'waktu_selesai' => '2024-06-01 17:00:00', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
