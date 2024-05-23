<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $primaryKey = 'idPayment';

    protected $fillable = [
        'jumlah',
        'metodePembayaran',
    ];

    public function order()
    {
        return $this->hasOne(Order::class, 'payment_id');
    }
}