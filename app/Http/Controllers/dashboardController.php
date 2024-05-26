<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\Kamar;
use App\Models\Layout;
use App\Models\Makanan;
use App\Models\Paket;
use App\Models\Ruangan;
use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {

        $today = Carbon::today();
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;


        //Khusus Order
        $totalOrders = Order::count();
        $todayOrders = Order::whereDate('created_at', $today)->get()->count();
        $thisMonthOrders =Order::whereMonth('created_at', $currentMonth)->whereYear('created_at', $currentYear)->get()->count();
        $thisYearOrders = Order::whereYear('created_at', $currentYear)->get()->count();

        $processingOrders = Order::where('status', 'Pending')->count();
        $completedOrders = Order::where('status', 'Confirmed')->count();

        $totalPaket =Paket::count();
        $totalFasilitas = Fasilitas::count();
        $totalKamar = Kamar::count();
        $totalRuangan = Ruangan::count();
        $totalMakanan = Makanan::count();
        $totalLayout = Layout::count();

        return view('dashboard.index', compact('totalOrders','todayOrders','thisMonthOrders', 'thisYearOrders',
        'processingOrders', 'completedOrders', 'totalPaket', 'totalFasilitas','totalKamar','totalRuangan','totalMakanan',
        'totalLayout'));
    }

}