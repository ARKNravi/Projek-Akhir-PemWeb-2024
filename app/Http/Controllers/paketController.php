<?php

namespace App\Http\Controllers;
use App\Models\Paket;
use App\Models\Fasilitas;
use Illuminate\Http\Request;

class paketController extends Controller
{
    public function index(){
        $paket = Paket::all();
        if($paket->isEmpty()){
            $message= "Belum ada paket";
        }else{
            $message="";
        }
        return view('paket.index', compact('paket','message'));
    }

    public function create(){
        $fasilitas = Fasilitas::all();
        return view('paket.add',compact('fasilitas'));

    }

    public function updateHargaTotal($paketId){
    $paket = Paket::find($paketId);
    if ($paket) {
        $hargaTotal = $paket->hargaTotal();
        $paket->harga_total = $hargaTotal;
        $paket->save();
    }
}

    public function store(Request $request){
        $paket = new Paket;
        $paket->id_paket=$request->id_paket;
        $paket->nama=$request->nama;
        $paket->id_fasilitas=$request->id_fasilitas;
        $paket->hargaTotal();
        $paket->save();
        return redirect('/paket');
    }

    public function edit($id_paket){
        $paket = Paket::where('id_paket',$id_paket)->get();
        $fasilitas = Fasilitas::all();
        return view('paket.edit',compact('paket','fasilitas'));
    }

    public function update(Request $request){
        $paket = Paket::find($request)->first();
        $paket->id_paket=$request->id_paket;
        $paket->nama=$request->nama;
        $paket->harga_total=$request->harga_total;
        $paket->id_fasilitas=$request->id_fasilitas;
        $paket->hargaTotal();
        $paket->save();
        return redirect('/paket');
    }

    public function destroy($id_paket){
        $paket = Paket::findOrFail($id_paket);
        $paket->delete();
        return redirect('/paket');
    }
}
