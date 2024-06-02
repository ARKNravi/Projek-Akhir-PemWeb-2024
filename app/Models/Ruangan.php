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

    public function sessions()
    {
        return $this->hasMany(Session::class, 'id_ruangan'); // Sesuaikan dengan nama kolom yang sesuai di tabel `sessions`
    }
}