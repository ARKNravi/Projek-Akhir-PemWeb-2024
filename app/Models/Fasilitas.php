<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    protected $table = 'fasilitas';
    protected $primaryKey = "id_fasilitas";
    protected $fillable = ['nama_fasilitas', 'kapasitas', 'lama_waktu_peminjaman', 'materials', 'id_ruangan', 'id_makanan', 'nomor_kamar'];

    public function kamar()
    {
        return $this->belongsTo(Kamar::class, 'nomor_kamar');
    }

    public function makanan()
    {
        return $this->belongsTo(Makanan::class, 'id_makanan');
    }

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class, 'id_ruangan');
    }
}