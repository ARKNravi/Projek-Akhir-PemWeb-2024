<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $primaryKey = 'id_session';
    protected $fillable = ['tanggal','waktu_mulai', 'waktu_selesai'];

    protected $table = 'session';

    public function room()
    {
        return $this->belongsTo(Ruangan::class, 'id_ruangan'); // Sesuaikan dengan nama kolom yang sesuai di tabel `sessions`
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'session_id');
    }

}