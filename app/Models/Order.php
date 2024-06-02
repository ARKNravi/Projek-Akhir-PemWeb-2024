<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    protected $primaryKey = 'id_order';
    protected $fillable = ['tanggal', 'id_paket', 'id_session', 'id_payment', 'nik', 'id_admin', 'status', 'dokumentasi','id_ruangan'];

    public function paket()
    {
        return $this->belongsTo(Paket::class, 'id_paket');
    }

    public function session()
    {
        return $this->belongsTo(Sesi::class, 'id_session');
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'id_payment');
    }

    public function pemesan()
    {
        return $this->belongsTo(Pemesan::class, 'nik');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'id_admin');
    }

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class, 'id_ruangan');
    }

    public function checkout()
    {
        if ($this->status == 'Check In') {
            $this->status = 'Check Out';
            $this->save();
            return true;
        }
        return false;
    }
}