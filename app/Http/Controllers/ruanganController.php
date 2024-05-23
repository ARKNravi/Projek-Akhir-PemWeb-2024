<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruangan;

class RuanganController extends Controller
{
    public function index()
    {
        $ruangan = Ruangan::all();

        if ($ruangan->isEmpty()) {
            $message = "Belum terdapat ruangan.";
        } else {
            $message = "";
        }

        return view('admin.ruangan', compact('ruangan', 'message'));
    }
}