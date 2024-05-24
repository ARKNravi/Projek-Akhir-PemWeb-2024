<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();

        if ($orders->isEmpty()) {
            $message = "Belum terdapat daftar pesanan.";
        } else {
            $message = "";
        }

        return view('order.index', compact('orders', 'message'));
    }
}