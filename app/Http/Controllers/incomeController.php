<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class incomeController extends Controller
{
    public function index()
    {
        $orders = Order::with('paket.fasilitas.ruangan', 'paket.fasilitas.makanan', 'paket.fasilitas.kamar', 'pemesan', 'admin', 'payment')
        ->whereHas('payment', function ($query) {
            $query->where('id_payment', '!=', 1); // Exclude orders with id_payment = 1
        })
        ->get();

        $totalPendapatan = $orders->sum(function ($order) {
            return $order->paket->harga_total + ($order->payment->nominal_pembayaran ?? 0);
        });

        return view('income.index', compact('orders', 'totalPendapatan'));
    }
}