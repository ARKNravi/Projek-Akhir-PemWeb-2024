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
        return view('order.create', compact('pakets', 'sessions', 'payments'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'nik' => 'required|integer',
            'nama' => 'required|string',
            'nama_perusahaan' => 'required|string',
            'nomor_telepon' => 'required|string',
            'tipe' => 'required|string',
            'tanggal' => 'required|date',
            'id_paket' => 'required|integer',
            'id_session' => 'required|integer',
            'payment_option' => 'required|string',
            'metode_pembayaran' => 'nullable|string',
            'nominal_pembayaran' => 'nullable|numeric',
            'status' => 'required|string',
        ]);

        // Fetch the selected package
        $paket = Paket::findOrFail($validated['id_paket']);

        // Create or fetch the session
        $session = Sesi::firstOrCreate([
            'waktu_mulai' => $validated['tanggal'] . ' 07:00:00',
            'waktu_selesai' => $validated['tanggal'] . ' 21:00:00',
        ]);

        $validated['id_session'] = $session->id_session;
        $validated['id_admin'] = Auth::guard('admin')->id();

if ($validated['payment_option'] == 'dp') {
    // Fetch the selected package
    $paket = Paket::findOrFail($validated['id_paket']);
    // Calculate the DP amount (10% of the package price)
    $dpAmount = $paket->harga_total*0.1;



    // Create the payment record
    $payment = Payment::create([
        'nominal_pembayaran' => $dpAmount,

        'metode_pembayaran' => $validated['metode_pembayaran'],
    ]);

    $validated['id_payment'] = $payment->id_payment;
} else {
    $validated['id_payment'] = 1; // No DP
}


        try {
            // Create a new Pemesan record
            $pemesan = Pemesan::create([
                'nik' => $validated['nik'],
                'nama' => $validated['nama'],
                'nama_perusahaan' => $validated['nama_perusahaan'],
                'nomor_telepon' => $validated['nomor_telepon'],
                'tipe' => $validated['tipe'],
            ]);

            // Determine the status based on the payment option
            $status = $validated['payment_option'] === 'dp' ? 'Reservasi with DP' : 'Reservasi with NO DP';

            // Create a new Order record
            $order = Order::create([
                'tanggal' => $validated['tanggal'],
                'id_paket' => $validated['id_paket'],
                'id_session' => $validated['id_session'],
                'id_payment' => $validated['id_payment'],
                'nik' => $pemesan->nik,
                'id_admin' => $validated['id_admin'],
                'status' => $status,
            ]);
        } catch (\Exception $e) {
            Log::error('Error creating order or pemesan:', ['exception' => $e]);
            return redirect()->back()->withErrors(['error' => 'Failed to create order. Please try again.']);
        }

        return redirect('/admin/orders')->with('message', 'Order created successfully');
    }



    public function getPaketPrice(Request $request)
{
    $paketId = $request->query('paket_id');
    $paket = Paket::find($paketId);

    if ($paket) {
        return response()->json(['price' => $paket->hargaTotal()]);
    }

    return response()->json(['error' => 'Invalid paket ID'], 400);
}

    public function getAvailableSessions(Request $request)
    {
        $date = $request->query('date');
        $paketId = $request->query('paket_id');

        $paket = Paket::find($paketId);
        $ruangan = $paket->ruangan;

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
                    $query->where('id_ruangan', $ruangan->id_ruangan);
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

    public function getDpPaymentId(Request $request)
    {
        $paketId = $request->query('paket_id');
        $paket = Paket::find($paketId);

        if ($paket) {
            $dpAmount = $paket->hargaTotal() * 0.1;
            $payment = Payment::create([
                'nominal_pembayaran' => $dpAmount,
                'metode_pembayaran' => 'Not Specified', // Default value
            ]);
            return response()->json(['payment_id' => $payment->id]);
        }

        return response()->json(['error' => 'Invalid paket ID'], 400);
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
        ]);

        $order = Order::findOrFail($id);

        if ($order->status == 'Reservasi with DP' || $order->status == 'Reservasi with NO DP') {
            $totalAmount = $order->paket->harga_total;
            $paidAmount = $order->payment->nominal_pembayaran;
            $remainingAmount = $totalAmount - $paidAmount;
            // Ensure the $validated['nominal_pembayaran'] is equal to the remaining amount
            $validated['nominal_pembayaran'] = $remainingAmount;

            $payment = $order->payment;
            $payment->nominal_pembayaran += $validated['nominal_pembayaran'];
            $payment->metode_pembayaran = $validated['metode_pembayaran'];

            $payment->save();

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

            $uploadedFiles = [];

            foreach ($request->file('dokumentasi') as $file) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('Dokumentasi/' . $order->id_order), $fileName);
                $uploadedFiles[] = $fileName;
            }

            $existingFiles = json_decode($order->dokumentasi, true) ?? [];
            $order->dokumentasi = json_encode(array_merge($existingFiles, $uploadedFiles));
            $order->save();

            return back()->with('message', 'Dokumentasi berhasil diunggah');
        }

        return back()->with('message', 'Gagal mengunggah dokumentasi');
    }

    public function viewImage($id, $image)
    {
        $path = public_path('Dokumentasi/' . $id . '/' . $image);
        if (file_exists($path)) {
            return response()->file($path);
        }
        abort(404);
    }
    public function deleteImage($id, $image)
    {
        $order = Order::findOrFail($id);
        $images = json_decode($order->dokumentasi, true);

        if (($key = array_search($image, $images)) !== false) {
            unset($images[$key]);
        }

        $order->dokumentasi = json_encode(array_values($images));
        $order->save();

        $imagePath = public_path('Dokumentasi/' . $id . '/' . $image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        return redirect()->route('admin.order')->with('message', 'Dokumentasi berhasil dihapus');
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