<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ruangan;

class RuanganSeeder extends Seeder
{
    public function run()
    {
        $ruangans = [
            ['nama_ruangan' => 'U Shape Mango', 'harga' => 500000, 'kapasitas' => 24, 'backdrop' => "Mango", 'id_layout' => 1, 'id_session' => 1],
            ['nama_ruangan' => 'Classroom Mango', 'harga' => 500000, 'kapasitas' => 24, 'backdrop' => "Mango", 'id_layout' => 2, 'id_session' => 2],
            ['nama_ruangan' => 'Theatre Mango', 'harga' => 500000, 'kapasitas' => 48, 'backdrop' => "Mango", 'id_layout' => 3, 'id_session' => 3],
            ['nama_ruangan' => 'U Shape Citrus', 'harga' => 450000, 'kapasitas' => 20, 'backdrop' => "Citrus", 'id_layout' => 4, 'id_session' => 4],
            ['nama_ruangan' => 'Classroom Citrus', 'harga' => 450000, 'kapasitas' => 20, 'backdrop' => "Citrus", 'id_layout' => 5, 'id_session' => 1],
            ['nama_ruangan' => 'U Shape Banana', 'harga' => 400000, 'kapasitas' => 12, 'backdrop' => "Banana", 'id_layout' => 6, 'id_session' => 2],
            ['nama_ruangan' => 'U Shape Apple', 'harga' => 1000000, 'kapasitas' => 40, 'backdrop' => "Apple", 'id_layout' => 7, 'id_session' => 3],
            ['nama_ruangan' => 'Classroom Apple', 'harga' => 1000000, 'kapasitas' => 40, 'backdrop' => "Apple", 'id_layout' => 8, 'id_session' => 4],
            ['nama_ruangan' => 'Theatre Apple', 'harga' => 1000000, 'kapasitas' => 60, 'backdrop' => "Apple", 'id_layout' => 9, 'id_session' => 1],
            ['nama_ruangan' => 'U Shape Oryza Sativa', 'harga' => 4000000, 'kapasitas' => 60, 'backdrop' => "Oryza Sativa", 'id_layout' => 10, 'id_session' => 2],
            ['nama_ruangan' => 'Classroom Oryza Sativa', 'harga' => 4000000, 'kapasitas' => 80, 'backdrop' => "Oryza Sativa", 'id_layout' => 11, 'id_session' => 3],
            ['nama_ruangan' => 'Theatre Oryza Sativa', 'harga' => 4000000, 'kapasitas' => 200, 'backdrop' => "Oryza Sativa", 'id_layout' => 12, 'id_session' => 4],
            ['nama_ruangan' => 'Round Table Oryza Sativa', 'harga' => 4000000, 'kapasitas' => 60, 'backdrop' => "Oryza Sativa", 'id_layout' => 13, 'id_session' => 1],
        ];

        foreach ($ruangans as $ruangan) {
            Ruangan::create($ruangan);
        }
    }
}
