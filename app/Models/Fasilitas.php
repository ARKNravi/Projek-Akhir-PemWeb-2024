<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    protected $table = 'fasilitas';
    protected $primaryKey = "id_fasilitas";
    protected $fillable = ['nama_fasilitas', 'kapasitas', 'lama_waktu_peminjaman', 'materials', 'id_ruangan', 'id_makanan', 'nomor_kamar'];

    public function ruangan()
    {
        return $this->hasOne(Ruangan::class, 'id_ruangan');
    }

    public function makanan()
    {
        return $this->hasOne(Makanan::class, 'id_makanan');
    }

    public function kamar()
    {
        return $this->hasOne(Kamar::class, 'nomor_kamar', 'nomor_kamar');
    }
}