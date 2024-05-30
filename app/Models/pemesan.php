<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemesan extends Model
{
    protected $table = 'pemesan';
    protected $primaryKey = 'nik';
    protected $fillable = ['nama', 'nama_perusahaan', 'nomor_telepon', 'tipe'];

    public function orders()
    {
        return $this->hasMany(Order::class, 'nik');
    }
}