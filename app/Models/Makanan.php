<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Makanan extends Model
{
    protected $primaryKey = 'idMakanan';

    public $incrementing = false;

    protected $fillable = [
        'namaMakanan',
        'hargaMakanan',
    ];
}   