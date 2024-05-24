<?php

namespace App\Http\Controllers;
use App\Models\Kamar;
use Illuminate\Http\Request;

class kamarController extends Controller
{
    public function index(){
        $kamar = Kamar::all();
        return view('kamar.index',["kamar"=>$kamar]);
    }

    public function create(){
        return view('kamar.add');
    }

    public function store(Request $request){
        $kamar = new Kamar;
        $kamar->nomor_kamar=$request->nomor_kamar;
        $kamar->tipe=$request->tipe;
        $kamar->harga=$request->harga;
        $kamar->save();
        return redirect('/kamar');
    }

    public function edit($nomor_kamar){
        $kamar = Kamar::where('nomor_kamar',$nomor_kamar)->get();
        return view('kamar.edit',["kamar"=>$kamar]);
    }

    public function update(Request $request){
        $kamar=Kamar::find($request);
        $kamar->nomor_kamar=$request->nomor_kamar;
        $kamar->tipe=$request->tipe;
        $kamar->harga=$request->harga;
        $kamar->save();
        return redirect('/kamar');
    }

    public function destroy($nomor_kamar){
        $kamar = Kamar::where('nomor_kamar',$nomor_kamar)->get();
        $kamar->delete();
        return redirect('/kamar');
    }
}