<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Session;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Paket;
use App\Models\Payment;
use App\Models\Pemesan;
use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

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
        $rooms = Ruangan::with(['sessions.orders' => function ($query) {
            $query->whereBetween('tanggal', [Carbon::today(), Carbon::today()->copy()->addDays(6)]);
        }])->get();
        
        return view('order.index', compact('rooms','orders','message'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nik' => 'required|integer',
            'nama' => 'required|string',
            'nama_perusahaan' => 'required|string',
            'nomor_telepon' => 'required|string',
            'tipe' => 'required|string',
            'tanggal' => 'required|date',
            'id_paket' => 'required|integer',
            'id_ruangan' => 'required|integer',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'payment_option' => 'required|string',
            'metode_pembayaran' => 'nullable|string',
            'nominal_pembayaran' => 'nullable|numeric',
            'status' => 'nullable|string',
        ]);

        $paket = Paket::findOrFail($validated['id_paket']);
        $ruanganId = $validated['id_ruangan'];
        $tanggal = $validated['tanggal'];
        $waktuMulai = $tanggal . ' ' . $validated['waktu_mulai'] . ':00';
        $waktuSelesai = $tanggal . ' ' . $validated['waktu_selesai'] . ':00';

        $overlappingOrders = Order::where('tanggal', $tanggal)
            ->where('id_ruangan', $ruanganId)
            ->whereHas('ruangan.session', function ($query) use ($waktuMulai, $waktuSelesai) {
                $query->where(function ($q) use ($waktuMulai, $waktuSelesai) {
                    $q->where('waktu_mulai', '<', $waktuSelesai)
                      ->where('waktu_selesai', '>', $waktuMulai);
                });
            })
            ->exists();

        if ($overlappingOrders) {
            return redirect()->back()->withErrors(['error' => 'The selected room is already booked for the chosen time. Please select a different time.']);
        }

        $session = Session::firstOrCreate([
            'tanggal' => $tanggal,
            'waktu_mulai' => $waktuMulai,
            'waktu_selesai' => $waktuSelesai,
        ]);

        // Update ruangan to use the new session
        $ruangan = Ruangan::findOrFail($ruanganId);
        $ruangan->id_session = $session->id_session;
        $ruangan->save();

        $validated['id_admin'] = Auth::guard('admin')->id();

        if ($validated['payment_option'] == 'dp') {
            $dpAmount = $paket->harga_total * 0.1;
            $payment = Payment::create([
                'nominal_pembayaran' => $dpAmount,
                'metode_pembayaran' => $validated['metode_pembayaran'],
            ]);
            $validated['id_payment'] = $payment->id_payment;
        } else {
            $validated['id_payment'] = 1; // No DP
        }

        try {
            $pemesan = Pemesan::create([
                'nik' => $validated['nik'],
                'nama' => $validated['nama'],
                'nama_perusahaan' => $validated['nama_perusahaan'],
                'nomor_telepon' => $validated['nomor_telepon'],
                'tipe' => $validated['tipe'],
            ]);

            $status = $validated['payment_option'] === 'dp' ? 'Reservasi with DP' : 'Reservasi with NO DP';

            $order = Order::create([
                'tanggal' => $validated['tanggal'],
                'id_paket' => $validated['id_paket'],
                'id_ruangan' => $ruanganId,
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
            return response()->json(['price' => $paket->harga_total]);
        }

        return response()->json(['error' => 'Invalid paket ID'], 400);
    }

    public function getAvailableSessions(Request $request)
    {
        $date = $request->query('date');
        $ruanganId = $request->query('ruangan_id');

        $ruangan = Ruangan::find($ruanganId);

        $sessionTimes = [
            ['start' => '07:00', 'end' => '15:00'],
            ['start' => '07:00', 'end' => '21:00']
        ];

        $availableSessions = [];

        foreach ($sessionTimes as $index => $session) {
            $sessionStart = $date . ' ' . $session['start'];
            $sessionEnd = $date . ' ' . $session['end'];

            $conflictingOrders = Order::where('tanggal', $date)
                ->where('id_ruangan', $ruanganId)
                ->whereHas('ruangan.session', function ($query) use ($sessionStart, $sessionEnd) {
                    $query->where('waktu_mulai', $sessionStart)
                          ->where('waktu_selesai', $sessionEnd);
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
            $dpAmount = $paket->harga_total * 0.1;
            $payment = Payment::create([
                'nominal_pembayaran' => $dpAmount,
                'metode_pembayaran' => 'Not Specified',
            ]);
            return response()->json(['payment_id' => $payment->id_payment]);
        }

        return response()->json(['error' => 'Invalid paket ID'], 400);
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
public function edit($id)
{
    $order = Order::with('ruangan.session')->findOrFail($id); // Eager load session details
    $pakets = Paket::all();

    // Convert session times to DateTime objects if available
    if ($order->ruangan && $order->ruangan->session) {
        $order->ruangan->session->waktu_mulai = new \DateTime($order->ruangan->session->waktu_mulai);
        $order->ruangan->session->waktu_selesai = new \DateTime($order->ruangan->session->waktu_selesai);
    }

    return view('order.edit', compact('order', 'pakets'));
}


public function update(Request $request, $id)
{
    // Validate the incoming request data
    $validated = $request->validate([
        'tanggal' => 'required|date',
        'id_paket' => 'required|integer',
        'waktu_mulai' => 'required',
        'waktu_selesai' => 'required',
    ]);

    $order = Order::with('ruangan.session')->findOrFail($id); // Eager load session details

    $paket = Paket::findOrFail($validated['id_paket']);
    $ruanganId = $paket->id_ruangan;
    $waktuMulai = $validated['tanggal'] . ' ' . $validated['waktu_mulai'] . ':00';
    $waktuSelesai = $validated['tanggal'] . ' ' . $validated['waktu_selesai'] . ':00';

    // Check if the room is available
    $overlappingOrders = Order::whereHas('ruangan.session', function ($query) use ($waktuMulai, $waktuSelesai) {
        $query->where(function ($q) use ($waktuMulai, $waktuSelesai) {
            $q->where('waktu_mulai', '<', $waktuSelesai)
              ->where('waktu_selesai', '>', $waktuMulai);
        });
    })->whereHas('paket', function ($query) use ($ruanganId) {
        $query->where('id_ruangan', $ruanganId);
    })->where('id_order', '!=', $id)->exists();

    if ($overlappingOrders) {
        return redirect()->back()->withErrors(['error' => 'The selected room is already booked for the chosen time. Please select a different time.']);
    }

    // Update the session in the ruangan table
    if ($order->ruangan && $order->ruangan->session) {
        $session = $order->ruangan->session;
        $session->update([
            'waktu_mulai' => $waktuMulai,
            'waktu_selesai' => $waktuSelesai,
        ]);
    } else {
        $session = Session::create([
            'waktu_mulai' => $waktuMulai,
            'waktu_selesai' => $waktuSelesai,
        ]);
        $order->ruangan->update(['id_session' => $session->id_session]);
    }

    // Update the order
    $order->update([
        'tanggal' => $validated['tanggal'],
        'id_paket' => $validated['id_paket'],
    ]);

    return redirect('/admin/orders')->with('message', 'Order updated successfully');
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
}