<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class historyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with('paket.fasilitas.ruangan', 'pemesan', 'session', 'payment')
        ->where('status', 'Check Out')
        ->get();

        return view('history.index', compact('orders'));
    }
}