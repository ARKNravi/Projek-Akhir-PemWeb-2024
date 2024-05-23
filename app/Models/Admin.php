<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Admin extends Model
{
    protected $primaryKey = 'idAdmin';

    protected $fillable = [
        'userName',
        'password',
    ];
}
