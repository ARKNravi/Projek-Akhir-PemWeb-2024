<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $table = 'paket';
    protected $primaryKey = 'id_paket';
    protected $fillable = ['nama', 'harga_total', 'id_ruangan', 'id_makanan'];

    protected $casts = [
        'id_makanan' => 'array',
    ];

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class, 'id_ruangan');
    }

    public function makanan()
    {
        return $this->hasMany(Makanan::class, 'id_makanan', 'id_makanan');
    }

    public function hargaTotal()
    {
        $totalHarga = 0;
        $totalHarga += $this->ruangan->harga;
        $totalHarga += $this->ruangan->layout->harga;

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