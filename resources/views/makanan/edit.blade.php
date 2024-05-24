@extends('template.index')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit makanan</title>
</head>
<body>
    @section('content')
    @foreach ($makanan as $mkn)
    <a href="/makanan">Kembali</a>
    <form action="/makanan/edit" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id_makanan" value="{{ $mkn->id_makanan }}"> <br/>
        Nama <input type="text" name="nama_makanan" id="nama_makanan" value="{{$mkn->nama_makanan}}">
        Harga <input type="text" name="harga_makanan" id="harga_makanan" value="{{$mkn->harga_makanan}}">
        <input type="submit" value="simpan">
    </form>
    @endforeach
    @endsection
   
</body>
</html>