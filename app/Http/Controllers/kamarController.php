<?php

namespace App\Http\Controllers;
use App\Models\Kamar;
use Illuminate\Http\Request;

class kamarController extends Controller
{
    public function index(Request $request){
        $sort = $request->input('sort', 'created_at');
        $search = $request->input('search');
        $query=Kamar::orderBy($sort,'desc');
        if (!empty($search)) {
            $query->where('tipe', 'like', '%' . $search . '%');
        }
        $kamar = $query->get();
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
        $kamar=Kamar::find($request)->first();
        $kamar->nomor_kamar=$request->nomor_kamar;
        $kamar->tipe=$request->tipe;
        $kamar->harga=$request->harga;
        $kamar->save();
        return redirect('/kamar');
    }

    public function destroy($nomor_kamar){
        $kamar = Kamar::findOrFail($nomor_kamar);
        $kamar->delete();
        return redirect('/kamar');
    }
}