<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sesi extends Model
{
    protected $table = 'session';
    protected $primaryKey = 'id_session';
    protected $fillable = ['tanggal', 'waktu_mulai', 'waktu_selesai'];
    // App\Models\Sesi.php
public function ruangans()
{
    return $this->hasMany(Ruangan::class, 'id_session');
}
}