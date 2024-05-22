<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    protected $primaryKey = 'idFasilitas';

    protected $fillable = [
        'namaFasilitas',
        'hargaFasilitas',
    ];
}