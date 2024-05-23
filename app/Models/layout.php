<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layout extends Model
{
    protected $primaryKey = 'id_layout';
    protected $fillable = ['nama_layout', 'harga', 'jumlahOrang'];

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class,'id_ruangan');
    }
}
