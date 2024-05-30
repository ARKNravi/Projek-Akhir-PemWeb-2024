<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pemesan;

class PemesanSeeder extends Seeder
{
    public function run()
    {
        Pemesan::create([
            'nik' => '1234567890123456',
            'nama' => 'John Doe',
            'nama_perusahaan' => 'Company A',
            'nomor_telepon' => '081234567890',
            'tipe' => 'Individual',
        ]);
    }
}