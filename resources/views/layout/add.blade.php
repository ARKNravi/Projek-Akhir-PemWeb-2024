@extends('template.index')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah layout</title>
</head>
<body>
    @section('content')
    <a href="/layout">Kembali</a>
    <form action="/layout/tambah" method="post">
        {{ csrf_field() }}
        id layout <input type="text" name="id_layout" id="id_layout">
        nama layout <input type="text" name="nama_layout" id="nama_layout">
        Harga <input type="text" name="harga" id="harga">
        Kapasitas <input type="text" name="jumlahOrang" id="jumlahOrang">
        <input type="submit" value="simpan">
    </form>
@endsection
</body>
</html>