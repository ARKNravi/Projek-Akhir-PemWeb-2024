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
            'id_payment' => 'required|integer',
            'status' => 'required|string',
        ]);

        // Log the validated data
        Log::info('Validated Data:', $validated);

        $paket = Paket::find($request->id_paket);
        if (!$paket) {
            return redirect()->back()->withErrors(['error' => 'Paket not found.']);
        }

        $ruangan = $paket->ruangan;

        // Define session times
        $sessionTimes = [
            ['start' => '07:00', 'end' => '15:00'],
            ['start' => '07:00', 'end' => '21:00']
        ];

        // Determine session start and end times
        $selectedSession = $sessionTimes[$request->id_session - 1];
        $sessionStart = $request->tanggal . ' ' . $selectedSession['start'];
        $sessionEnd = $request->tanggal . ' ' . $selectedSession['end'];

        // Check for conflicting orders
        $conflictingOrders = Order::where('tanggal', $request->tanggal)
            ->whereHas('session', function ($query) use ($sessionStart, $sessionEnd) {
                $query->where('waktu_mulai', $sessionStart)
                      ->where('waktu_selesai', $sessionEnd);
            })
            ->whereHas('paket', function ($query) use ($ruangan) {
                $query->where('id_ruangan', $ruangan->id_ruangan);
            })
            ->whereIn('status', ['Reservasi', 'Check In'])
            ->exists();

        if ($conflictingOrders) {
            return redirect()->back()->withErrors(['error' => 'The selected session is already booked for the chosen room.']);
        }

        // Create or find the session
        $session = Sesi::firstOrCreate([
            'waktu_mulai' => $sessionStart,
            'waktu_selesai' => $sessionEnd
        ]);

        $validated['id_session'] = $session->id_session;
        $validated['id_admin'] = Auth::guard('admin')->id();

        try {
            // Create Pemesan record
            $pemesan = Pemesan::create([
                'nik' => $validated['nik'],
                'nama' => $validated['nama'],
                'nama_perusahaan' => $validated['nama_perusahaan'],
                'nomor_telepon' => $validated['nomor_telepon'],
                'tipe' => $validated['tipe']
            ]);
            Log::info('Pemesan created:', $pemesan->toArray());

            // Create Order record
            $order = Order::create([
                'tanggal' => $validated['tanggal'],
                'id_paket' => $validated['id_paket'],
                'id_session' => $session->id_session,
                'id_payment' => $validated['id_payment'],
                'nik' => $pemesan->nik,
                'id_admin' => $validated['id_admin'],
                'status' => $validated['status'],
                'dokumentasi' => ''
            ]);
            Log::info('Order created:', $order->toArray());

        } catch (\Exception $e) {
            // Log any exceptions
            Log::error('Error creating order or pemesan:', ['exception' => $e]);
            return redirect()->back()->withErrors(['error' => 'Failed to create order. Please try again.']);
        }

        // Redirect after successful creation
        return redirect('/admin/orders')->with('message', 'Order created successfully');
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

            $uploadedFiles = [];

            foreach ($request->file('dokumentasi') as $file) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('Dokumentasi/' . $order->id_order), $fileName);
                $uploadedFiles[] = $fileName;
            }

            // Merge with existing documentation if any
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

        // Hapus file dari penyimpanan
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
