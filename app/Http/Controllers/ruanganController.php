<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruangan;
use App\Models\Layout;

class RuanganController extends Controller
{
    public function index(Request $request)
    {
        
        $sort = $request->input('sort', 'created_at');
        $search = $request->input('search');
        $query =Ruangan::orderBy($sort,'desc');
        if (!empty($search)) {
            $query->where('nama_ruangan', 'like', '%' . $search . '%');
        }
        $ruangan=$query->get();
        if ($ruangan->isEmpty()) {
            $message = "Belum terdapat ruangan.";
        } else {
            $message = "";
        }

        return view('ruangan.index', compact('ruangan','message'));
    }
    public function create()
{
    $layout = Layout::all();
    if($layout->isEmpty()){
        $message="Belum ada layout untuk dipilih. Buat layout terlebih dahulu";
    }else{
        $message="";
    }
    return view('ruangan.create',compact('layout','message'));
}

public function store(Request $request)
{
    $ruangan = Ruangan::create($request->all());
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