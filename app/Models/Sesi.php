<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sesi extends Model
{
    protected $table = 'session';
    protected $primaryKey = 'id_session';
    protected $fillable = ['tanggal', 'waktu_mulai', 'waktu_selesai'];
}