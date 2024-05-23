<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    public function run()
    {
        DB::table('order')->insert([
            ['tanggal' => '2024-06-01', 'id_paket' => 1, 'id_session' => 1, 'id_payment' => 1, 'nik' => 1, 'id_admin' => 1, 'status' => 'Confirmed', 'created_at' => now(), 'updated_at' => now()],
            ['tanggal' => '2024-06-02', 'id_paket' => 2, 'id_session' => 2, 'id_payment' => 2, 'nik' => 2, 'id_admin' => 1, 'status' => 'Pending', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}