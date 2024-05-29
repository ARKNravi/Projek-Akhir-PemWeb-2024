<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrderSeeder extends Seeder
{
    public function run()
    {
        $orders = [];
        $statuses = ['Check Out', 'Reservasi', 'Check In']; // Define the statuses array

        for ($i = 1; $i <= 100; $i++) {
            $orders[] = [
                'tanggal' => Carbon::now()->addDays($i)->format('Y-m-d'),
                'id_paket' => $i % 2 == 0 ? 1 : 2, // Assuming you have at least 10 different packages
                'id_session' => $i % 2 == 0 ? 1 : 2, // Assuming you have at least 5 different sessions
                'id_payment' => $i % 2 == 0 ? 1 : 2, // Assuming you have at least 3 different payment methods
                'nik' => $i, // This is a unique identifier, you might want to use a more realistic NIK
                'id_admin' => 1, // Assuming there is at least one admin with id 1
                'status' => $statuses[$i % 3], // Cycle through 'Check Out', 'Reservasi', 'Check In'
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        DB::table('order')->insert($orders);
    }
}
