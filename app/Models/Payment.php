<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payment';
    protected $primaryKey = 'id_payment';
    protected $fillable = ['nominal_pembayaran', 'metode_pembayaran'];

    public function order(){
        return $this->belongsTo(Order::class,'id_order');
    }
}