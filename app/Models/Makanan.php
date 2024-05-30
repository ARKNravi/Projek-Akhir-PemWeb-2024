<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Makanan extends Model
{
    protected $table = 'makanan';
    protected $primaryKey = 'id_makanan';
    protected $fillable = ['menu_makanan', 'harga_makanan'];
}