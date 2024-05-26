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
            $query->where('nama_makanan', 'like', '%' . $search . '%');
        }
        $makanan=$query->get();
        return view('makanan.index',["makanan"=>$makanan]);
    }

    public function create(){
        return view('makanan.add');
    }

    public function store(Request $request){
        $makanan = new Makanan;
        $makanan->id_makanan=$request->id_makanan;
        $makanan->nama_makanan=$request->nama_makanan;
        $makanan->harga_makanan=$request->harga_makanan;
        $makanan->save();

        return redirect('/makanan');
    }

    public function edit($id_makanan){
        $makanan = Makanan::where('id_makanan',$id_makanan)->get();
        return view('makanan.edit',['makanan'=>$makanan]);
    }

    public function update(Request $request){
        $makanan = Makanan::find($request)->first();
        $makanan->id_makanan=$request->id_makanan;
        $makanan->nama_makanan=$request->nama_makanan;
        $makanan->harga_makanan=$request->harga_makanan;
        
        $makanan->save();

        return redirect('/makanan');
    }

    public function destroy($id_makanan){
        $makanan = Makanan::findOrFail($id_makanan);
        $makanan->delete();
        return redirect('/makanan');   
    }
}