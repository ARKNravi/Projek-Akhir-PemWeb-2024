@extends('template.index')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit kamar</title>
</head>
<body>
    @section('content')
    <a href="/kamar">Kembali</a>
    @foreach ($kamar as $kmr)
    <a href="/kamar">Kembali</a>
    <form action="/kamar/edit" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="nomor_kamar" value="{{ $kmr->nomor_kamar }}"> <br/>
        Tipe <input type="text" name="tipe" id="tipe" value="{{$kmr->tipe}}">
        Harga <input type="text" name="harga" id="harga" value="{{$kmr->harga}}">
        <input type="submit" value="simpan">
    </form>
    @endforeach
    @endsection
   
   
</body>
</html>