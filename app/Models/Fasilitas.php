<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    protected $primaryKey = "id_fasilitas";
    protected $fillable = ['fasilitas', 'kapasitas', 'lama_waktu_peminjaman', 'materials', 'id_ruangan', 'id_makanan', 'nomor_kamar'];

    public function ruangan()
    {
        return $this->hasOne(Ruangan::class, 'id_fasilitas');
    }

    public function makanan()
    {
        return $this->hasOne(Makanan::class, 'id_fasilitas');
    }

    public function kamar()
    {
        return $this->hasMany(Kamar::class, 'id_fasilitas');
    }
}