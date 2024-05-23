<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $primaryKey = 'idOrder';

    protected $fillable = [
        'tanggal',
        'paket_id',
        'session_id',
        'payment_id',
        'namaPemesan',
        'noPemesan',
    ];

    protected $dates = [
        'tanggal',
    ];

    public function paket()
    {
        return $this->belongsTo(Paket::class, 'paket_id');
    }

    public function session()
    {
        return $this->belongsTo(Session::class, 'session_id');
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payment_id');
    }
}