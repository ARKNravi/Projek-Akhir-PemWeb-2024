<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Mpdf\Mpdf;

class incomeController extends Controller
{
    public function index()
    {
        // Retrieve all orders with relationships for the total income calculation
        $allOrders = Order::with('paket.fasilitas.ruangan', 'paket.fasilitas.makanan', 'paket.fasilitas.kamar', 'pemesan', 'admin', 'payment')
            ->whereHas('payment', function ($query) {
                $query->where('id_payment', '!=', 1); // Exclude orders with id_payment = 1
            })
            ->get();

        // Calculate the total income
        $totalPendapatan = $allOrders->sum(function ($order) {
            return $order->paket->harga_total + ($order->payment->nominal_pembayaran ?? 0);
        });

        // Paginate the orders (10 per page)
        $orders = Order::with('paket.fasilitas.ruangan', 'paket.fasilitas.makanan', 'paket.fasilitas.kamar', 'pemesan', 'admin', 'payment')
            ->whereHas('payment', function ($query) {
                $query->where('id_payment', '!=', 1); // Exclude orders with id_payment = 1
            })
            ->paginate(10); // Pagination with 10 orders per page

        return view('income.index', compact('orders', 'totalPendapatan'));
    }

    public function cetakIncome()
    {
        $orders = Order::with('paket.fasilitas.ruangan', 'paket.fasilitas.makanan', 'paket.fasilitas.kamar', 'pemesan', 'admin', 'payment')
        ->whereHas('payment', function ($query) {
            $query->where('id_payment', '!=', 1); // Exclude orders with id_payment = 1
        })
        ->get();

        $totalPendapatan = $orders->sum(function ($order) {
            return $order->paket->harga_total + ($order->payment->nominal_pembayaran ?? 0);
        });

        $dompdf = new Dompdf();
        $html = view('income.cetak-income', compact('orders', 'totalPendapatan'))->render();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream('laporan_income.pdf');
        //return view('income.cetak-income', compact('orders', 'totalPendapatan'));
    }

    public function viewIncome()
    {
        $orders = Order::with('paket.fasilitas.ruangan', 'paket.fasilitas.makanan', 'paket.fasilitas.kamar', 'pemesan', 'admin', 'payment')
        ->whereHas('payment', function ($query) {
            $query->where('id_payment', '!=', 1); // Exclude orders with id_payment = 1
        })
        ->get();

        $totalPendapatan = $orders->sum(function ($order) {
            return $order->paket->harga_total + ($order->payment->nominal_pembayaran ?? 0);
        });

        return view('income.cetak-income', compact('orders', 'totalPendapatan'));
    }
}