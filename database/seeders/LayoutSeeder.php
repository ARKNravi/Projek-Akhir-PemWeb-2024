<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Layout;

class LayoutSeeder extends Seeder
{
    public function run()
    {
        $layouts = [
            ['nama_layout' => 'U Shape Mango', 'harga' => 500000, 'jumlahOrang' => 24],
            ['nama_layout' => 'Classroom Mango', 'harga' => 500000, 'jumlahOrang' => 24],
            ['nama_layout' => 'Theatre Mango', 'harga' => 500000, 'jumlahOrang' => 48],
            ['nama_layout' => 'U Shape Citrus', 'harga' => 450000, 'jumlahOrang' => 20],
            ['nama_layout' => 'Classroom Mango', 'harga' => 450000, 'jumlahOrang' => 20],
            ['nama_layout' => 'U Shape Banana', 'harga' => 400000, 'jumlahOrang' => 12],
            ['nama_layout' => 'U Shape Apple', 'harga' => 1000000, 'jumlahOrang' => 40],
            ['nama_layout' => 'Classroom Apple', 'harga' => 1000000, 'jumlahOrang' => 40],
            ['nama_layout' => 'Theatre Apple', 'harga' => 1000000, 'jumlahOrang' => 60],
            ['nama_layout' => 'U Shape Oryza Sativa', 'harga' => 4000000, 'jumlahOrang' => 60],
            ['nama_layout' => 'Classroom Oryza Sativa', 'harga' => 4000000, 'jumlahOrang' => 80],
            ['nama_layout' => 'Theatre Oryza Sativa', 'harga' =>4000000, 'jumlahOrang' => 200],
            ['nama_layout' => 'Round Table Oryza Sativa', 'harga' => 4000000, 'jumlahOrang' => 60],
            ['nama_layout' => 'Tidak Termasuk Layout', 'harga' => 0, 'jumlahOrang' => 0],
        ];

        foreach ($layouts as $layout) {
            Layout::create($layout);
        }
    }
}