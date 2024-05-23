<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PemesanSeeder extends Seeder
{
    public function run()
    {
        DB::table('pemesan')->insert([
            ['nama' => 'John Doe', 'nomor_telepon' => '08123456789', 'tipe' => 'VIP', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Jane Smith', 'nomor_telepon' => '08198765432', 'tipe' => 'Regular', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
