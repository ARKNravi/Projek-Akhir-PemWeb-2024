<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Session;
use App\Models\Ruangan;
use Carbon\Carbon;


class SessionSeeder extends Seeder
{
    public function run()
    {

        $rooms = Ruangan::all();
        $today = Carbon::today();
        for ($day = 0; $day < 7; $day++) {
            $sessionDate = $today->copy()->addDays($day);
            $startTime = Carbon::createFromTime(8, 0, 0); // 8 AM
            $endTime = Carbon::createFromTime(18, 0, 0); // 6 PM

            while ($startTime->lt($endTime)) {
                foreach ($rooms as $room) {
                    Session::create([
                        'id_ruangan' => $room->id_ruangan,
                        'tanggal' => $sessionDate->toDateString(),
                        'waktu_mulai' => $startTime->toDateTime(),
                        'waktu_selesai' => $endTime->toDateTime(),
                    ]);
                }
                $startTime->addHour();
            }
        }
       
    }
}