<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $primaryKey = 'idPaket';

    protected $fillable = [
        'namaPaket',
        'ruangan_id',
        'kamar_id',
        'harga',
        'status',
    ];

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class, 'ruangan_id');
    }

    public function kamar()
    {
        return $this->belongsTo(Kamar::class, 'kamar_id');
    }

    public function order()
    {
        return $this->hasOne(Order::class, 'paket_id');
    }
}