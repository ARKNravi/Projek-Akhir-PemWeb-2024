<?php

namespace App\Http\Controllers;

use App\Models\Makanan;
use Illuminate\Http\Request;

class makananController extends Controller
{
    public function index(){
        $makanan = Makanan::all();
        return view('fasilitas.index',['makanan'->$makanan]);
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
        $makanan = Makanan::find($request);
        $makanan->id_makanan=$request->id_makanan;
        $makanan->nama_makanan=$request->nama_makanan;
        $makanan->harga_makanan=$request->harga_makanan;
        $makanan->save();

        return redirect('/makanan');
    }

    public function delete($id_makanan){
        $makanan = Makanan::where('id_makanan',$id_makanan)->get();
        $makanan->delete();
        return redirect('/makanan');   
    }
}