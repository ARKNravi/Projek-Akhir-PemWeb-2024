<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $primaryKey = 'id_order';
    protected $fillable = ['tanggal', 'id_paket', 'id_session', 'id_payment', 'nik', 'id_admin', 'status'];

    public function package()
    {
        return $this->hasOne(Paket::class, 'id_order');
    }

    public function session()
    {
        return $this->hasOne(Session::class, 'id_order');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, 'id_order');
    }

    public function pemesan()
    {
        return $this->hasOne(Pemesan::class, 'id_order');
    }

    public function admin()
    {
        return $this->hasOne(Admin::class, 'id_order');
    }
}