<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemesan extends Model
{
    protected $primaryKey = 'nik';
    protected $fillable = ['nama', 'nomor_telepon', 'tipe'];

    public function orders()
    {
        return $this->belongsTo(Order::class, 'id_order');
    }
}