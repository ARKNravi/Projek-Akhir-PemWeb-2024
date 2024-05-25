<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Makanan;
use App\Models\Ruangan;
use Illuminate\Http\Request;
use App\Models\Fasilitas;


class fasilitasController extends Controller
{
    public function index(){
        $fasilitas = Fasilitas::all();
        return view('fasilitas.index',compact('fasilitas'));
    }

    public function add(){
        $ruangan = Ruangan::all();
        $makanan = Makanan::all();
        $kamar = Kamar::all();

        return view('fasilitas.add',compact('ruangan','makanan','kamar'));
    }

    public function store(Request $request){
        $fasilitas = new Fasilitas;
        $fasilitas->id_fasilitas=$request->id_fasilitas;
        $fasilitas->nama_fasilitas=$request->nama_fasilitas;
        $fasilitas->kapasitas=$request->kapasitas;
        $fasilitas->lama_waktu_peminjaman=$request->lama_waktu_peminjaman;
        $fasilitas->materials=$request->materials;
        $fasilitas->id_ruangan=$request->id_ruangan;
        $fasilitas->id_makanan=$request->id_makanan;
        $fasilitas->nomor_kamar=$request->nomor_kamar;
        $fasilitas->save();
        return redirect('/fasilitas');
    }

    public function edit($id_fasilitas){
        $fasilitas = Fasilitas::where('id_fasilitas',$id_fasilitas)->get();
        return view('fasilitas.edit',compact('fasilitas'));
    }

    public function update(Request $request){
        $fasilitas = Fasilitas::find($request)->first();
        $fasilitas->id_fasilitas=$request->id_fasilitas;
        $fasilitas->nama_fasilitas=$request->nama_fasilitas;
        $fasilitas->kapasitas=$request->kapasitas;
        $fasilitas->lama_waktu_peminjaman=$request->lama_waktu_peminjaman;
        $fasilitas->materials=$request->materials;
        $fasilitas->id_ruangan=$request->id_ruangan;
        $fasilitas->id_makanan=$request->id_makanan;
        $fasilitas->nomor_kamar=$request->nomor_kamar;
        $fasilitas->save();
        return redirect('/fasilitas');
    }

    public function destroy($id_fasilitas){
        $fasilitas = Fasilitas::findOrFail($id_fasilitas);
        $fasilitas->delete();
        return redirect('fasilitas');
    }
}