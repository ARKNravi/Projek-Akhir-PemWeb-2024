<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    protected $table = 'ruangan';
    protected $primaryKey = 'id_ruangan';
    protected $fillable = ['nama_ruangan', 'kapasitas', 'harga', 'backdrop', 'id_layout'];

    public function layout()
    {
        return $this->belongsTo(Layout::class, 'id_layout');
    }
}