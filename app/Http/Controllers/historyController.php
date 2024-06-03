<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with('paket.ruangan.session', 'pemesan', 'payment')
            ->where('status', 'Check Out')
            ->get();

        return view('history.index', compact('orders'));
    }
}