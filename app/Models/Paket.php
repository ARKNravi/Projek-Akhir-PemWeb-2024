<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $table = 'paket';
    protected $primaryKey = 'id_paket';
    protected $fillable = ['nama', 'harga_total', 'id_fasilitas'];

    public function hargaTotal(){
            $fasilitas = $this->fasilitas;

            $totalHarga = 0;
            $kamar = $fasilitas->kamar;
            $makanan = $fasilitas->makanan;
            $ruangan = $fasilitas->ruangan;

            $totalHarga += $kamar->harga;
            
            $totalHarga += $makanan->harga_makanan;
            $totalHarga += $ruangan->harga;

            $layout = $ruangan->layout;
            $totalHarga += $layout->harga;
            $this->harga_total=$totalHarga;
    }

    public function fasilitas()
    {
        return $this->belongsTo(Fasilitas::class, 'id_fasilitas');
    }

    public function order(){
        return $this->belongsTo(Order::class,'id_order');
    }
}