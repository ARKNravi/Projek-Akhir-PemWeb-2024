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
        <a href="/kamar">Kembali</a>
        <form action="/kamar/tambah" method="post">
            {{ csrf_field() }}
            Nomor kamar <input type="text" name="nomor_kamar" id="nomor_kamar">
            Tipe <input type="text" name="tipe" id="tipe">
            Harga <input type="text" name="harga" id="harga">
            <input type="submit" value="simpan">
        </form>
    @endsection
</body>
</html>