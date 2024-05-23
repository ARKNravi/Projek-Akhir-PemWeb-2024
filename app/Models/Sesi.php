<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sesi extends Model
{
    protected $table = 'session';
    protected $primaryKey = 'id_session';

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
