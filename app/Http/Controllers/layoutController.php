<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Layout;

class layoutController extends Controller
{
    public function index(Request $request){
        $sort = $request->input('sort', 'created_at');
        $search = $request->input('search');
        $query = Layout::orderBy($sort,'desc');
        if (!empty($search)) {
            $query->where('nama_layout', 'like', '%' . $search . '%');
        }
        $layout = $query->get();
        return view('layout.index',compact('layout'));
    }

    public function create(){
        return view('layout.add');
    }

    public function store(Request $request){
        $layout = new Layout;
        $layout->id_layout=$request->id_layout;
        $layout->nama_layout=$request->nama_layout;
        $layout->harga=$request->harga;
        $layout->jumlahOrang=$request->jumlahOrang;
        $layout->save();
        return redirect('/layout');
    }

    public function edit($id_layout){
        $layout = Layout::where('id_layout',$id_layout)->get();
        return view('layout.edit',["layout"=>$layout]);
    }

    public function update(Request $request){
        $layout = Layout::find($request)->first();
        $layout->id_layout=$request->id_layout;
        $layout->nama_layout=$request->nama_layout;
        $layout->harga=$request->harga;
        $layout->jumlahOrang=$request->jumlahOrang;
        $layout->save();
        return redirect('/layout');
    }

    public function destroy($id_layout){
        $layout = Layout::findOrFail($id_layout);
        $layout->delete();
        return redirect('/layout');
    }
}