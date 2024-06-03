<?php

namespace App\Http\Controllers;

use App\Models\Makanan;
use Illuminate\Http\Request;

class makananController extends Controller
{
    public function index(Request $request){
        $sort = $request->input('sort', 'created_at');
        $search = $request->input('search');
        $query =Makanan::orderBy($sort,'desc');
        if (!empty($search)) {
            $query->where('menu_makanan', 'like', '%' . $search . '%');
        }
        $makanan=$query->paginate(5);
        return view('makanan.index',compact('makanan'));
    }

    public function create(){
        return view('makanan.add');
    }

    public function store(Request $request){
        $makanan = new Makanan;
        $makanan->id_makanan=$request->id_makanan;
        $makanan->menu_makanan=$request->menu_makanan;
        $makanan->harga_makanan=$request->harga_makanan;
        $makanan->save();

        return redirect('/makanan');
    }

    public function edit($id_makanan){
        $makanan = Makanan::where('id_makanan',$id_makanan)->get();
        return view('makanan.edit',['makanan'=>$makanan]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'menu_makanan' => 'required',
            'harga_makanan' => 'required|numeric',
        ]);

        $makanan = Makanan::findOrFail($request->id_makanan);
        $makanan->menu_makanan = $request->menu_makanan;
        $makanan->harga_makanan = $request->harga_makanan;
        $makanan->save();

        return redirect('/makanan')->with('success', 'Makanan berhasil diperbarui.');
    }

    public function destroy($id_makanan){
        $makanan = Makanan::findOrFail($id_makanan);
        $makanan->delete();
        return redirect('/makanan');
    }
    
}