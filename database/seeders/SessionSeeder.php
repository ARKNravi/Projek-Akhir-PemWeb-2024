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

        $tanggal = Carbon::today();

        // Jam mulai dan jam selesai
        $jam_mulai = Carbon::parse('08:00');
        $jam_selesai = Carbon::parse('18:00');

        // Interval sesi (satu jam)
        $interval = Carbon::parse('1 hour');

        // Loop untuk membuat sesi dari jam 8 pagi sampai jam 6 sore
        while ($jam_mulai <= $jam_selesai) {
            // Simpan data sesi ke dalam tabel sessions
            Session::create([
                'tanggal' => $tanggal,
                'waktu_mulai' => $jam_mulai,
                'waktu_selesai' => $jam_mulai->copy()->addHour(), // Tambahkan satu jam ke waktu mulai untuk mendapatkan waktu selesai
            ]);

            // Pindahkan waktu mulai ke jam berikutnya
            $jam_mulai->addHour();
        }
      
    }
}