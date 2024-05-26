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
        <div class="mb-3">
            <label for="nomor_kamar">Nomor kamar</label><br>
            <input type="text" name="nomor_kamar" id="nomor_kamar" value="{{$kmr->nomor_kamar}}">
        </div>
        <div class="mb-3">
            <label for="tipe">Tipe</label><br>
            <input type="text" name="tipe" id="tipe" value="{{$kmr->tipe}}">
        </div>
        <div class="mb-3">
            <label for="harga">Harga</label><br>
            <input type="text" name="harga" id="harga" value="{{$kmr->harga}}">
        </div>
        <input type="submit" value="Edit" class="btn btn-primary">
    </form>
    @endforeach
    @endsection
   
   
</body>
</html>