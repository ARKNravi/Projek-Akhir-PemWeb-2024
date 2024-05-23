<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MakananSeeder extends Seeder
{
    public function run()
    {
        DB::table('makanan')->insert([
            ['nama_makanan' => 'Nasi Goreng', 'harga_makanan' => 50000.00, 'created_at' => now(), 'updated_at' => now()],
            ['nama_makanan' => 'Mie Goreng', 'harga_makanan' => 45000.00, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
