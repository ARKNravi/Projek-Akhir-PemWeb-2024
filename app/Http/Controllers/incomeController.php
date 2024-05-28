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