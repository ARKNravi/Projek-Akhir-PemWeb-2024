<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $primaryKey = 'idSession';

    protected $fillable = [
        'waktuMulai',
        'waktuSelesai',
    ];

    protected $dates = [
        'waktuMulai',
        'waktuSelesai',
    ];

    public function order()
    {
        return $this->hasOne(Order::class, 'session_id');
    }
}