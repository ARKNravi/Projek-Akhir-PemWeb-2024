<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $primaryKey="id_session";
    protected $fillable = ['tanggal','waktu_mulai', 'waktu_selesai'];

    protected $table = 'session';

    public function room()
    {
        return $this->belongsTo(Ruangan::class);
    }

}