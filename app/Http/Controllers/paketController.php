<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class paketController extends Controller
{
    public function index(){
        return view('packets.index');
    }
}
