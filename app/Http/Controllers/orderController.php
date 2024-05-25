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
            // Create a new payment record
            $newPayment = Payment::create([
                'nominal_pembayaran' => $validated['nominal_pembayaran'],
                'metode_pembayaran' => $validated['metode_pembayaran'],
            ]);

            // Update the order with the new payment id and change the status
            $order->id_payment = $newPayment->id_payment;
            $order->status = 'Check In';
            $order->save();

            return redirect()->route('admin.order')->with('message', 'Check-In berhasil dilakukan');
        }

        return redirect()->route('admin.order')->with('message', 'Gagal melakukan Check-In');
    }

public function checkout($id)
{
    $order = Order::findOrFail($id);

    if ($order->checkout()) {
        return redirect()->route('admin.order')->with('message', 'Check-Out berhasil dilakukan');
    }

    return redirect()->route('admin.order')->with('message', 'Gagal melakukan Check-Out');
}
public function upload(Request $request, $id)
{
    $order = Order::findOrFail($id);

    if ($order->status == 'Check Out') {
        $request->validate([
            'dokumentasi.*' => 'required|file|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048',
        ]);

        foreach ($request->dokumentasi as $file) {
            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('Dokumentasi/'.$order->id_order), $fileName);

            // Store each file name into the database
            $order->dokumentasi = json_encode(array_merge(json_decode($order->dokumentasi, true) ?? [], [$fileName]));
        }

        $order->save();

        return back()->with('message', 'Dokumentasi berhasil diunggah');
    }

    return back()->with('message', 'Gagal mengunggah dokumentasi');
}

public function view($id)
{
    $order = Order::findOrFail($id);

    if ($order->dokumentasi) {
        $files = json_decode($order->dokumentasi, true);
        $zip = new \ZipArchive();
        $zipName = public_path('Dokumentasi/'.$order->id_order.'/dokumentasi.zip');

        if ($zip->open($zipName, \ZipArchive::CREATE) === TRUE) {
            foreach ($files as $file) {
                $filePath = public_path('Dokumentasi/'.$order->id_order.'/'.$file);
                $zip->addFile($filePath, $file);
            }
            $zip->close();
        }

        return response()->download($zipName);
    }

    return back()->with('message', 'Dokumentasi tidak ditemukan');
}
public function viewImage($id, $image)
{
    $order = Order::findOrFail($id);

    if ($order->dokumentasi) {
        $files = json_decode($order->dokumentasi, true);

        if (in_array($image, $files)) {
            return response()->file(public_path('Dokumentasi/'.$order->id_order.'/'.$image));
        }
    }

    return back()->with('message', 'Dokumentasi tidak ditemukan');
}

public function deleteImage($id, $image)
{
    $order = Order::findOrFail($id);

    if ($order->dokumentasi) {
        $files = json_decode($order->dokumentasi, true);

        if (($key = array_search($image, $files)) !== false) {
            unset($files[$key]);
            $order->dokumentasi = json_encode(array_values($files));
            $order->save();

            $imagePath = public_path('Dokumentasi/'.$order->id_order.'/'.$image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
    }

    return back()->with('message', 'Dokumentasi berhasil dihapus');
}
public function downloadImage($id, $image)
{
    $order = Order::findOrFail($id);

    if ($order->dokumentasi) {
        $files = json_decode($order->dokumentasi, true);

        if (in_array($image, $files)) {
            return response()->download(public_path('Dokumentasi/'.$order->id_order.'/'.$image));
        }
    }

    return back()->with('message', 'Dokumentasi tidak ditemukan');
}
}