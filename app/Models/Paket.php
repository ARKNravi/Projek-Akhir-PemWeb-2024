<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $primaryKey= 'id_paket';
    protected $fillable = ['nama', 'harga_total', 'id_fasilitas'];

    public function fasilitas()
    {
        return $this->hasOne(Fasilitas::class, 'id_paket');
    }

    public function order(){
        return $this->belongsTo(Order::class,'id_order');
    }
}