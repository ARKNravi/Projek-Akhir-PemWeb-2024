<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Makanan extends Model
{
    protected $primaryKey = 'id_makanan';
    protected $fillable = ['nama_makanan', 'harga_makanan'];

    public function fasilitas(){
        return $this->belongsTo(Fasilitas::class,'id_fasilitas');
    }
}