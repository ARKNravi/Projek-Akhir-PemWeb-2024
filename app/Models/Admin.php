<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Admin extends Model
{
    protected $primaryKey = 'id_admin';
    protected $fillable = ['username', 'password'];

    public function orders()
    {
        return $this->belongsTo(Order::class, 'id_order');
    }
}