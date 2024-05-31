<?php
namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Makanan;
use App\Models\Ruangan;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->input('sort', 'created_at');
        $search = $request->input('search');

        $query = Paket::with(['ruangan'])->orderBy($sort, 'desc');

        if (!empty($search)) {
            $query->where('nama', 'like', '%' . $search . '%');
        }

        $paket = $query->get();

        $message = $paket->isEmpty() ? "Belum ada paket" : "";

        return view('paket.index', compact('paket', 'message'));
    }

    public function updateHargaTotal($paketId)
    {
        $paket = Paket::find($paketId);
        if ($paket) {
            $hargaTotal = $paket->hargaTotal();
            $paket->harga_total = $hargaTotal;
            $paket->save();
        }
    }

    public function create()
    {
        $ruangan = Ruangan::all();
        $makanan = Makanan::all();
        return view('paket.add', compact('ruangan', 'makanan'));
    }

    public function store(Request $request)
    {
        $paket = new Paket;
        $paket->nama = $request->nama;
        $paket->id_ruangan = $request->id_ruangan;
        $paket->id_makanan = json_encode($request->id_makanan); // Encode to JSON
        $paket->harga_total = $paket->hargaTotal();
        $paket->save();
        return redirect('/paket');
    }

    public function update(Request $request)
    {
        $paket = Paket::find($request->id_paket);
        $paket->nama = $request->nama;
        $paket->id_ruangan = $request->id_ruangan;
        $paket->id_makanan = json_encode($request->id_makanan); // Encode to JSON
        $paket->harga_total = $paket->hargaTotal();
        $paket->save();
        return redirect('/paket');
    }



    public function edit($id_paket)
    {
        $paket = Paket::find($id_paket);
        $ruangan = Ruangan::all();
        $makanan = Makanan::all();
        return view('paket.edit', compact('paket', 'ruangan', 'makanan'));
    }
    public function destroy($id_paket)
    {
        $paket = Paket::findOrFail($id_paket);
        $paket->delete();
        return redirect('/paket');
    }
}
