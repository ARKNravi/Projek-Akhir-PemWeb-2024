@extends('template.index')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit layout</title>
</head>
<body>
    @section('content')
    <a href="/layout">Kembali</a>
    @foreach ($layout as $lyt)
    <a href="/layout">Kembali</a>
    <form action="/layout/edit" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id_layout" value="{{ $lyt->id_layout }}"> <br/>
        nama layout <input type="text" name="nama_layout" id="nama_layout" value="{{$lyt->nama_layout}}">
        Harga <input type="text" name="harga" id="harga" value="{{$lyt->harga}}">
        Kapasitas <input type="text" name="jumlahOrang" id="jumlahOrang" value="{{$lyt->jumlahOrang}}">
        <input type="submit" value="simpan">
    </form>
    @endforeach
    @endsection
   
   
</body>
</html>