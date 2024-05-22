<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    protected $primaryKey = 'idKamar';

    protected $fillable = [
        'noKamar',
        'tipe',
        'kapasitas',
        'status',
        'harga',
    ];

    public function paket()
    {
        return $this->hasOne(Paket::class, 'kamar_id');
    }
}