<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\Kamar;
use App\Models\Layout;
use App\Models\Makanan;
use App\Models\Paket;
use App\Models\Ruangan;
use App\Models\Pemesan;
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
        $thisMonthOrders = Order::whereMonth('created_at', $currentMonth)->whereYear('created_at', $currentYear)->get()->count();
        $thisYearOrders = Order::whereYear('created_at', $currentYear)->get()->count();

        $processingOrders = Order::where('status', 'Pending')->count();
        $completedOrders = Order::where('status', 'Confirmed')->count();

        $totalPaket = Paket::count();
        $totalFasilitas = Fasilitas::count();
        $totalKamar = Kamar::count();
        $totalRuangan = Ruangan::count();
        $totalMakanan = Makanan::count();
        $totalLayout = Layout::count();

        // Data for Chart.js
        $orderLabels = [];
        $orderData = [];

        for ($month = 1; $month <= 12; $month++) {
            $orderLabels[] = Carbon::create()->month($month)->format('F');
            $orderData[] = Order::whereYear('created_at', $currentYear)
                ->whereMonth('created_at', $month)
                ->count();
        }


        // Data for Chart.js (Pemesan)
        $vipCount = Pemesan::where('tipe', 'VIP')->count();
        $regularCount = Pemesan::where('tipe', 'Regular')->count();
        $pemesanLabels = ['VIP', 'Regular'];
        $pemesanData = [$vipCount, $regularCount];

        return view(
            'dashboard.index',
            compact(
                'totalOrders',
                'todayOrders',
                'thisMonthOrders',
                'thisYearOrders',
                'processingOrders',
                'completedOrders',
                'totalPaket',
                'totalFasilitas',
                'totalKamar',
                'totalRuangan',
                'totalMakanan',
                'totalLayout',
                'orderLabels',
                'orderData',
                'pemesanLabels',
                'pemesanData',
            )
        );
    }

}
