<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruangan;
use App\Models\Layout;
use App\Models\Sesi;
use Carbon\Carbon;

class RuanganController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->input('sort', 'created_at');
        $search = $request->input('search');
        $query = Ruangan::with('session')->orderBy($sort, 'desc');
        if (!empty($search)) {
            $query->where('nama_ruangan', 'like', '%' . $search . '%');
        }
        $ruangan = $query->paginate(5);
        if ($ruangan->isEmpty()) {
            $message = "Belum terdapat ruangan.";
        } else {
            $message = "";
        }

        return view('ruangan.index', compact('ruangan', 'message'));
    }

    public function create()
    {
        $layout = Layout::all();
        if($layout->isEmpty()){
            $message = "Belum ada layout untuk dipilih. Buat layout terlebih dahulu";
        } else {
            $message = "";
        }
        return view('ruangan.create', compact('layout', 'message'));
    }

    public function store(Request $request)
    {
        // Create a new Sesi with random time but around the year 1000
        $year = rand(0, 9999);
        $month = rand(1, 12);
        $day = rand(1, 28); // To avoid complications with February
        $hour = rand(0, 23);
        $minute = rand(0, 59);
        $second = rand(0, 59);

        $tanggal = Carbon::create($year, $month, $day);
        $waktu_mulai = Carbon::create($year, $month, $day, $hour, $minute, $second);
        $waktu_selesai = $waktu_mulai->copy()->addHours(2); // Let's assume the session lasts 2 hours

        $sesi = Sesi::create([
            'tanggal' => $tanggal,
            'waktu_mulai' => $waktu_mulai,
            'waktu_selesai' => $waktu_selesai,
        ]);

        // Create a new Ruangan with the new Sesi's ID
        $ruangan = Ruangan::create($request->all() + ['id_session' => $sesi->id_session]);

        return redirect()->route('admin.ruangan')->with('success', 'Ruangan berhasil ditambahkan');
    }

    public function edit($id_ruangan)
    {
        $ruangan = Ruangan::findOrFail($id_ruangan);
        return view('ruangan.edit', compact('ruangan'));
    }

    public function update(Request $request, $id_ruangan)
    {
        $ruangan = Ruangan::findOrFail($id_ruangan);
        $ruangan->update($request->all());
        return redirect()->route('admin.ruangan')->with('success', 'Detail ruangan berhasil diubah');
    }

    public function destroy($id_ruangan)
    {
        $ruangan = Ruangan::findOrFail($id_ruangan);
        $ruangan->delete();
        return redirect()->route('admin.ruangan')->with('success', 'Ruangan berhasil dihapus');
    }
}