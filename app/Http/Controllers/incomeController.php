<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Dompdf\Dompdf;

class IncomeController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->input('filter', 'all');
        $month = $request->input('month');
        $year = $request->input('year');

        $ordersQuery = Order::with('paket.ruangan', 'paket.makanan', 'pemesan', 'admin', 'payment')
            ->whereHas('payment', function ($query) {
                $query->where('id_payment', '!=', 1); // Exclude orders with id_payment = 1
            });

        if ($filter == 'monthly' && $month && $year) {
            $ordersQuery->whereMonth('tanggal', $month)
                        ->whereYear('tanggal', $year);
        } elseif ($filter == 'yearly' && $year) {
            $ordersQuery->whereYear('tanggal', $year);
        }

        $allOrders = $ordersQuery->get();
        $totalPendapatan = $allOrders->sum(function ($order) {
            return $order->paket->harga_total + ($order->payment->nominal_pembayaran ?? 0);
        });

        $orders = $ordersQuery->paginate(10)->appends($request->except('page')); // Pagination with 10 orders per page

        return view('income.index', compact('orders', 'totalPendapatan'));
    }

    public function cetakIncome(Request $request)
    {
    $filter = $request->input('filter', 'all');
    $month = $request->input('month');
    $year = $request->input('year');

    $ordersQuery = Order::with('paket.ruangan', 'paket.makanan', 'pemesan', 'admin', 'payment')
        ->whereHas('payment', function ($query) {
            $query->where('id_payment', '!=', 1); // Exclude orders with id_payment = 1
        });

    if ($filter == 'monthly' && $month && $year) {
        $ordersQuery->whereMonth('tanggal', $month)
                    ->whereYear('tanggal', $year);
    } elseif ($filter == 'yearly' && $year) {
        $ordersQuery->whereYear('tanggal', $year);
    }

    $orders = $ordersQuery->get();
    $totalPendapatan = $orders->sum(function ($order) {
        return $order->paket->harga_total + ($order->payment->nominal_pembayaran ?? 0);
    });

    $dompdf = new Dompdf();
    $html = view('income.cetak-income', compact('orders', 'totalPendapatan', 'filter', 'month', 'year'))->render();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();
    return $dompdf->stream('laporan_income.pdf');
    }
}