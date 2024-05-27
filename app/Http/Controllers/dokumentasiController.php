<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dokumentasiController extends Controller
{
    public function index()
    {
        return view('dokumentasi.index');
    }
}
