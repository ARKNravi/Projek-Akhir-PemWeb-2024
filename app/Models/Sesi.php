<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sesi extends Model
{
    protected $table = 'session';
    protected $primaryKey = 'id_session';
    protected $fillable = ['waktu_mulai', 'waktu_selesai'];
    protected $dates = ['waktu_mulai', 'waktu_selesai'];

    public function orders()
    {
        return $this->hasMany(Order::class, 'id_session');
    }
}