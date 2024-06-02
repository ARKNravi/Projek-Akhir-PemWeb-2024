<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    protected $table = 'ruangan';
    protected $primaryKey = 'id_ruangan';
    protected $fillable = ['nama_ruangan', 'kapasitas', 'harga', 'backdrop', 'id_layout', 'id_session'];

    public function layout()
    {
        return $this->belongsTo(Layout::class, 'id_layout');
    }

    public function session()
    {
        return $this->belongsTo(Sesi::class, 'id_session');
    }
    // App\Models\Sesi.php
// App\Models\Ruangan.php
public function orders()
{
    return $this->hasMany(Order::class, 'id_ruangan');
}
}