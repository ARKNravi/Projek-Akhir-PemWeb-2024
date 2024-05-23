<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentSeeder extends Seeder
{
    public function run()
    {
        DB::table('payment')->insert([
            ['nominal_pembayaran' => 150000.00, 'metode_pembayaran' => 'Credit Card', 'created_at' => now(), 'updated_at' => now()],
            ['nominal_pembayaran' => 300000.00, 'metode_pembayaran' => 'Cash', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
