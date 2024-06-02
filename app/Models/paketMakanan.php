<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paketMakanan extends Model
{
    protected $table = 'paket_makanan';
    protected $primaryKey = 'id_paket_makanan';
    protected $fillable = ['nama_paket_makanan', 'harga_total', 'id_makanan'];

    public function makanan()
    {
        return $this->belongsToMany(Makanan::class, 'id_makanan');
    }

    public function hargaTotal(){
        $totalHarga = 0;

        $makananIds = is_array($this->id_makanan) ? $this->id_makanan : json_decode($this->id_makanan, true);

        foreach ($makananIds as $makananId) {
            $makanan = Makanan::find($makananId);
            if ($makanan) {
                $totalHarga += $makanan->harga_makanan;
            }
        }
        return $totalHarga;
    }

}
