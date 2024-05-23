<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $primaryKey = 'id_session';
    protected $fillable = ['waktu_mulai', 'waktu_selesai'];

    public function order(){
        return $this->belongsTo(Order::class,'id_order');
    }
}