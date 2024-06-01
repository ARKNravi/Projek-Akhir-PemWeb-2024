<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sesi;

class SessionSeeder extends Seeder
{
    public function run()
    {
        Sesi::create([
            'waktu_mulai' => now(),
            'waktu_selesai' => now()->addHours(2),
        ]);
    }
}