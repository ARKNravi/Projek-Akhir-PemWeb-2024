<?php

namespace App\Http\Controllers;

use App\Models\Sesi;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Paket;
use App\Models\Payment;
use App\Models\Pemesan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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

    public function create()
    {
        $pakets = Paket::all();
        $sessions = Sesi::all();
        $payments = Payment::all();
        $pemesans = Pemesan::all();
        $admins = Admin::all();

        return view('order.create', compact('pakets', 'sessions', 'payments', 'pemesans', 'admins'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nik' => 'required|integer',
            'nama' => 'required|string',
            'nomor_telepon' => 'required|string',
            'tipe' => 'required|string',
            'tanggal' => 'required|date',
            'id_paket' => 'required|integer',
            'id_session' => 'required|integer',
            'id_payment' => 'required|integer',
            'status' => 'required|string',
        ]);

        $pemesan = Pemesan::create($validated);
        $validated['id_admin'] = Auth::guard('admin')->id();
        $validated['nik'] = $pemesan->nik;

        $order = Order::create($validated);

        return redirect('/admin/orders');
    }

    public function cancel($id)
    {
        $order = Order::findOrFail($id);
        if ($order->status == 'Reservasi') {
            $order->status = 'Dibatalkan';
            $order->save();
        }

        return redirect()->route('admin.order')->with('message', 'Reservasi berhasil dibatalkan');
    }

    public function delete($id)
    {
        $order = Order::findOrFail($id);
        if ($order->status == 'Dibatalkan') {
            $order->delete();
        }

        return redirect()->route('admin.order')->with('message', 'Order berhasil dihapus');
    }

    public function showCheckinForm($id)
    {
        $order = Order::findOrFail($id);
        return view('order.checkin', compact('order'));
    }

    public function processCheckin(Request $request, $id)
    {
        $validated = $request->validate([
            'nominal_pembayaran' => 'required|numeric',
            'metode_pembayaran' => 'required|string',
            'id_payment' => 'required', // Ensure id_payment is required
        ]);

        $order = Order::findOrFail($id);

        if ($order->status == 'Reservasi') {
            // Assuming id_payment is provided in the form data
            $paymentId = $validated['id_payment'];

            // Update the order with the provided id_payment and status
            $order->id_payment = $paymentId;
            $order->status = 'Check In';
            $order->save();

            return redirect()->route('admin.order')->with('message', 'Check-In berhasil dilakukan');
        }

        return redirect()->route('admin.order')->with('message', 'Gagal melakukan Check-In');
    }
// OrderController.php

public function checkout($id)
{
    $order = Order::findOrFail($id);

    if ($order->checkout()) {
        return redirect()->route('admin.order')->with('message', 'Check-Out berhasil dilakukan');
    }

    return redirect()->route('admin.order')->with('message', 'Gagal melakukan Check-Out');
}

}