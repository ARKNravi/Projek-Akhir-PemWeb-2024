<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    public function run()
    {
        Order::create([
            'tanggal' => now(),
            'id_paket' => 1, // Assuming PaketSeeder has run and created a paket with ID 1
            'id_session' => 1, // Assuming SesiSeeder has run and created a session with ID 1
            'id_payment' => 1, // Assuming PaymentSeeder has run and created a payment with ID 1
            'nik' => '1234567890123456', // Assuming PemesanSeeder has run and created a pemesan with this NIK
            'id_admin' => 1, // Assuming AdminSeeder has run and created an admin with ID 1
            'status' => 'Pending',
            'dokumentasi' => 'Documentation details here',
        ]);
    }
}