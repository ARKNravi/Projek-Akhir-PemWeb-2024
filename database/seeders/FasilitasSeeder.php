<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FasilitasSeeder extends Seeder
{
    public function run()
    {
        DB::table('fasilitas')->insert([
            ['nama_fasilitas' => 'Proyektor', 'kapasitas' => 1, 'lama_waktu_peminjaman' => 4, 'materials' => json_encode(['Cable', 'Remote']), 'id_ruangan' => 1, 'id_makanan' => 1, 'nomor_kamar' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['nama_fasilitas' => 'Sound System', 'kapasitas' => 1, 'lama_waktu_peminjaman' => 3, 'materials' => json_encode(['Speakers', 'Microphone']), 'id_ruangan' => 2, 'id_makanan' => 2, 'nomor_kamar' => 2, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}