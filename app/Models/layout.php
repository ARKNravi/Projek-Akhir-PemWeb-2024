<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layout extends Model
{
    protected $table = 'layout';
    protected $primaryKey = 'id_layout';
    protected $fillable = ['nama_layout', 'harga', 'jumlahOrang'];

    public function ruangans()
    {
        return $this->hasMany(Ruangan::class, 'id_layout');
    }
}