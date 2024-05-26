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
use Carbon\Carbon;

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

        $paket = Paket::find($request->id_paket);
        $fasilitas = $paket->fasilitas;
        $ruangan = $fasilitas->ruangan;

        $sessionTimes = [
            ['start' => '07:00', 'end' => '15:00'],
            ['start' => '07:00', 'end' => '21:00']
        ];

        $selectedSession = $sessionTimes[$request->id_session - 1];
        $sessionStart = $request->tanggal . ' ' . $selectedSession['start'];
        $sessionEnd = $request->tanggal . ' ' . $selectedSession['end'];

        $conflictingOrders = Order::where('tanggal', $request->tanggal)
            ->whereHas('session', function ($query) use ($sessionStart, $sessionEnd) {
                $query->where('waktu_mulai', $sessionStart)
                      ->where('waktu_selesai', $sessionEnd);
            })
            ->whereHas('paket', function ($query) use ($ruangan) {
                $query->whereHas('fasilitas', function ($query) use ($ruangan) {
                    $query->where('id_ruangan', $ruangan->id_ruangan);
                });
            })
            ->whereIn('status', ['Reservasi', 'Check In'])
            ->exists();

        if ($conflictingOrders) {
            return redirect()->back()->withErrors(['error' => 'The selected session is already booked for the chosen room.']);
        }

        $session = Sesi::firstOrCreate([
            'waktu_mulai' => $sessionStart,
            'waktu_selesai' => $sessionEnd
        ]);

        $validated['id_session'] = $session->id_session;
        $validated['id_admin'] = Auth::guard('admin')->id();

        $pemesan = Pemesan::create($validated);
        $validated['nik'] = $pemesan->nik;

        Order::create($validated);

        return redirect('/admin/orders');
    }

    public function getAvailableSessions(Request $request)
{
    $date = $request->query('date');
    $paketId = $request->query('paket_id');

    $paket = Paket::find($paketId);
    $fasilitas = $paket->fasilitas;
    $ruangan = $fasilitas->ruangan;

    $sessionTimes = [
        ['start' => '07:00', 'end' => '15:00'],
        ['start' => '07:00', 'end' => '21:00']
    ];

    $availableSessions = [];

    foreach ($sessionTimes as $index => $session) {
        $sessionStart = $date . ' ' . $session['start'];
        $sessionEnd = $date . ' ' . $session['end'];

        $conflictingOrders = Order::where('tanggal', $date)
            ->whereHas('session', function ($query) use ($sessionStart, $sessionEnd) {
                $query->where('waktu_mulai', $sessionStart)
                      ->where('waktu_selesai', $sessionEnd);
            })
            ->whereHas('paket', function ($query) use ($ruangan) {
                $query->whereHas('fasilitas', function ($query) use ($ruangan) {
                    $query->where('id_ruangan', $ruangan->id_ruangan);
                });
            })
            ->whereIn('status', ['Reservasi', 'Check In'])
            ->exists();

        if (!$conflictingOrders) {
            $availableSessions[] = [
                'id' => $index + 1,
                'start' => $session['start'],
                'end' => $session['end']
            ];
        }
    }

    return response()->json($availableSessions);
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