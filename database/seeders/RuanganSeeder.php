<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ruangan;

class RuanganSeeder extends Seeder
{
    public function run()
    {
        $ruangans = [
            ['nama_ruangan' => 'U Shape Mango', 'harga' => 500000, 'kapasitas' => 24 , 'backdrop' => "Mango", 'id_layout' => 6],
            ['nama_ruangan' => 'Classroom Mango', 'harga' => 500000, 'kapasitas' => 24 , 'backdrop' => "Mango", 'id_layout' => 7],
            ['nama_ruangan' => 'Theatre Mango', 'harga' => 500000, 'kapasitas' => 48, 'backdrop' => "Mango", 'id_layout' => 8],
            ['nama_ruangan' => 'U Shape Citrus', 'harga' => 450000, 'kapasitas' => 20, 'backdrop' => "Citrus" , 'id_layout' => 9],
            ['nama_ruangan' => 'Classroom Citrus', 'harga' => 450000, 'kapasitas' => 20, 'backdrop' => "Citrus", 'id_layout' => 10],
            ['nama_ruangan' => 'U Shape Banana', 'harga' => 400000, 'kapasitas' => 12, 'backdrop' => "Banana", 'id_layout' => 11],
            ['nama_ruangan' => 'U Shape Apple', 'harga' => 1000000, 'kapasitas' => 40, 'backdrop' => "Apple", 'id_layout' => 12],
            ['nama_ruangan' => 'Classroom Apple', 'harga' => 1000000, 'kapasitas' => 40, 'backdrop' => "Apple", 'id_layout' => 13],
            ['nama_ruangan' => 'Theatre Apple', 'harga' => 1000000, 'kapasitas' => 60, 'backdrop' => "Apple", 'id_layout' => 14],
            ['nama_ruangan' => 'U Shape Oryza Sativa', 'harga' => 4000000, 'kapasitas' => 60 , 'backdrop' => "Oryza Sativa", 'id_layout' => 15],
            ['nama_ruangan' => 'Classroom Oryza Sativa', 'harga' => 4000000, 'kapasitas' => 80, 'backdrop' => "Oryza Sativa", 'id_layout' => 16],
            ['nama_ruangan' => 'Theatre Oryza Sativa', 'harga' =>4000000, 'kapasitas' => 200, 'backdrop' => "Oryza Sativa", 'id_layout' => 17],
            ['nama_ruangan' => 'Round Table Oryza Sativa', 'harga' => 4000000, 'kapasitas' => 60, 'backdrop' => "Oryza Sativa", 'id_layout' => 18],
        ];

        foreach ($ruangans as $ruangan) {
            Ruangan::create($ruangan);
        }
    }
}