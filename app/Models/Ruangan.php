<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    protected $primaryKey = 'idRuangan';

    protected $fillable = [
        'namaRuangan',
        'kapasitas',
        'harga',
        'status',
    ];

    public function paket()
    {
        return $this->hasOne(Paket::class, 'ruangan_id');
    }
}