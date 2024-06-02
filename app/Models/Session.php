<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sessions extends Model
{
    protected $primaryKey = 'id_session';
    protected $fillable = ['tanggal','waktu_mulai', 'waktu_selesai'];


    public function order(){
        return $this->hasMany(Order::class,'id_order');
    }
}