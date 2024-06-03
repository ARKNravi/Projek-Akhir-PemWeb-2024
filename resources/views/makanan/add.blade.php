@extends('template.index')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah makanan</title>
</head>
<body>
    @section('content')
    <h1 class="mb-4">Tambah fasilitas</h1>
    <a href="/makanan" class="btn btn-info">Kembali</a>
    <form action="/makanan/tambah" method="post">
        {{ csrf_field() }}
        <div class="mb-3">
            <label for="id_makanan">Id Makanan</label><br>
            <input type="text" name="id_makanan" id="id_makanan">
        </div>
        <div class="mb-3">
            <label for="menu_makanan">Nama makanan</label><br>
            <input type="text" name="menu_makanan" id="menu_makanan">
        </div>
        <div class="mb-3">
            <label for="harga">Harga</label><br>
            <input type="text" name="harga_makanan" id="harga_makanan">
        </div>
        <input type="submit" value="Tambah" class="btn btn-primary">
    </form>
    @endsection
</body>
</html>
