<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruangan;

class RuanganController extends Controller
{
    public function index()
    {
        $ruangan = Ruangan::all();

        if ($ruangan->isEmpty()) {
            $message = "Belum terdapat ruangan.";
        } else {
            $message = "";
        }

        return view('admin.ruangan.index', compact('ruangan', 'message'));
    }
    public function create()
{
    return view('admin.ruangan.create');
}

public function store(Request $request)
{
    $ruangan = Ruangan::create($request->all());
    return redirect()->route('admin.ruangan')->with('success', 'Ruangan berhasil ditambahkan');
}

public function edit($id_ruangan)
{
    $ruangan = Ruangan::findOrFail($id_ruangan);
    return view('admin.ruangan.edit', compact('ruangan'));
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
