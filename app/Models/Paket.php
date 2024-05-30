<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $table = 'paket';
    protected $primaryKey = 'id_paket';
    protected $fillable = ['nama', 'harga_total', 'id_ruangan', 'id_makanan'];

    public function hargaTotal()
    {
        $totalHarga = 0;
        $totalHarga += $this->ruangan->harga;
        $totalHarga += $this->ruangan->layout->harga;
        $totalHarga += $this->makanan->harga_makanan;
        $this->harga_total = $totalHarga;
    }

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class, 'id_ruangan');
    }

    public function makanan()
    {
        return $this->belongsTo(Makanan::class, 'id_makanan');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'id_paket');
    }
}