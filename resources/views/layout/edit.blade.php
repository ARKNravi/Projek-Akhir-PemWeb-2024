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
    <h1 class="mb-4">Edit layout</h1>
    <a href="/layout" class="btn btn-info">Kembali</a>
    @foreach ($layout as $lyt)
    <a href="/layout">Kembali</a>
    <form action="/layout/edit" method="post">
        <div class="mb-3">
            <label for="id_layout">Id layout</label><br>
            <input type="text" name="id_layout" id="id_layout" value="{{$lyt->id_layout}}">
        </div>
        <div class="mb-3">
            <label for="nama_layout">Nama layout</label><br>
            <input type="text" name="nama_layout" id="nama_layout" value="{{$lyt->nama_layout}}">
        </div>
        <div class="mb-3">
            <label for="harga">Harga</label><br>
            <input type="text" name="harga" id="harga" value="{{$lyt->harga}}">
        </div>
        <div class="mb-3">
            <label for="jumlahOrang">Kapasitas</label><br>
            <input type="text" name="jumlahOrang" id="jumlahOrang" value="{{$lyt->jumlahOrang}}">
        </div>
        <input type="submit" value="edit" class="btn btn-primary">
        <input type="submit" value="simpan">
    </form>
    @endforeach
    @endsection


</body>
</html>
