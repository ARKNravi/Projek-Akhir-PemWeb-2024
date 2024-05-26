@extends('template.index')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Kamar</title>
</head>
<body>
    @section('content')
    <h1 class="mb-4">Tambah Kamar</h1>
    <a href="/layout" class="btn btn-info">Kembali</a>
    <form action="/kamar/tambah" method="post">
        {{ csrf_field() }}
        <div class="mb-3">
            <label for="nomor_kamar">Nomor kamar</label><br>
            <input type="text" name="nomor_kamar" id="nomor_kamar">
        </div>
        <div class="mb-3">
            <label for="tipe">Tipe</label><br>
            <input type="text" name="tipe" id="tipe">
        </div>
        <div class="mb-3">
            <label for="harga">Harga</label><br>
            <input type="text" name="harga" id="harga">
        </div>
        <input type="submit" value="Tambah" class="btn btn-primary">
    </form>
    @endsection
</body>
</html>