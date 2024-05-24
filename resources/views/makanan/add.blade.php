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
    <a href="/makanan">Kembali</a>
    <form action="/makanan/tambah" method="post">
        {{ csrf_field() }}
        Id makanan <input type="text" name="id_makanan" id="id_makanan">
        Nama <input type="text" name="nama_makanan" id="nama_makanan">
        Harga <input type="text" name="harga_makanan" id="harga_makanan">
        <input type="submit" value="simpan">
    </form>
    @endsection
</body>
</html>