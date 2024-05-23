<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaketSeeder extends Seeder
{
    public function run()
    {
        DB::table('paket')->insert([
            ['nama' => 'Paket A', 'harga_total' => 3000000.00, 'id_fasilitas' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Paket B', 'harga_total' => 5000000.00, 'id_fasilitas' => 2, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
