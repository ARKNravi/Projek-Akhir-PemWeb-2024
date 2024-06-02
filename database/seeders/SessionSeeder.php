<?php

namespace Database\Seeders;

use App\Models\Sesi;
use Illuminate\Database\Seeder;

class SessionSeeder extends Seeder
{
    public function run()
    {
        $sessions = [
            ['tanggal' => '2024-01-01', 'waktu_mulai' => '2024-01-01 09:00:00', 'waktu_selesai' => '2024-01-01 11:00:00'],
            ['tanggal' => '2024-01-01', 'waktu_mulai' => '2024-01-01 13:00:00', 'waktu_selesai' => '2024-01-01 15:00:00'],
            ['tanggal' => '2024-01-02', 'waktu_mulai' => '2024-01-02 09:00:00', 'waktu_selesai' => '2024-01-02 11:00:00'],
            ['tanggal' => '2024-01-02', 'waktu_mulai' => '2024-01-02 13:00:00', 'waktu_selesai' => '2024-01-02 15:00:00'],
        ];

        foreach ($sessions as $session) {
            Sesi::create($session);
        }
    }
}