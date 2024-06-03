<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    protected $primaryKey = 'id_ruangan';
    protected $fillable = ['nama_ruangan', 'kapasitas', 'harga', 'backdrop', 'id_layout', 'id_session'];

    public function session()
    {
        return $this->hasMany(Session::class);
    }


    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}