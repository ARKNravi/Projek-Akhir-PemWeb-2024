<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sesi;
use Carbon\Carbon;


class SessionSeeder extends Seeder
{
    public function run()
    {
        $today = Carbon::today();
        for ($day = 0; $day < 7; $day++) {
            $sessionDate = $today->copy()->addDays($day);
            $startTime = Carbon::createFromTime(8, 0, 0); // 8 AM
            $endTime = Carbon::createFromTime(18, 0, 0); // 6 PM

            while ($startTime->lt($endTime)) {
                Sesi::create([
                    'tanggal' => $sessionDate->toDateString(),
                    'waktu_mulai' => $startTime->toTimeString(),
                    'waktu_selesai' => $startTime->copy()->addHour()->toTimeString(),
                ]);
                $startTime->addHour();
            }
        }
    }
}