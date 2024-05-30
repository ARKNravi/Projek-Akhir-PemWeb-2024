<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Payment;

class PaymentSeeder extends Seeder
{
    public function run()
    {
        Payment::create([
            'nominal_pembayaran' => 1500.00,
            'metode_pembayaran' => 'Credit Card',
        ]);
    }
}