<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $table = 'paket';
    protected $primaryKey= 'id_paket';
    protected $fillable = ['nama', 'harga_total', 'id_fasilitas'];

    public function fasilitas()
    {
        return $this->belongsTo(Fasilitas::class, 'id_fasilitas');
    }

    public function order(){
        return $this->belongsTo(Order::class,'id_order');
    }
}
