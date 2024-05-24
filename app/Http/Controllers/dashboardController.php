<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order; // Assuming you have an Order model

class DashboardController extends Controller
{
    public function index()
    {
        $totalOrders = Order::count();
        $processingOrders = Order::where('status', 'Pending')->count();
        $completedOrders = Order::where('status', 'Confirmed')->count();

        return view('dashboard.index', compact('totalOrders', 'processingOrders', 'completedOrders'));
    }

}