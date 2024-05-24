<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Kamar extends Model
{
    protected $table = 'kamar';
    protected $primaryKey = 'nomor_kamar';
    protected $fillable = ['tipe', 'harga'];

    public function fasilitas(){
        return $this->belongsTo(Fasilitas::class,'id_fasilitas');
    }
}