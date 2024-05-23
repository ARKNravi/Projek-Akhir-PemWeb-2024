<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    protected $table = 'ruangan';
    protected $primaryKey = 'id_ruangan';
    protected $fillable = ['nama_ruangan', 'luas_ruangan', 'harga', 'backdrop', 'id_layout'];

    public function layout()
    {
        return $this->hasOne(layout::class, 'id_ruangan');
    }


    public function fasilitas()
    {
        return $this->belongsTo(Fasilitas::class, 'id_fasilitas');
    }

}