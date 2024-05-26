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
    <h1 class="mb-4">Tambah fasilitas</h1>
    <a href="/layout" class="btn btn-info">Kembali</a>
    <form action="/layout/tambah" method="post">
        <div class="mb-3">
            <label for="id_layout">Id layout</label><br>
            <input type="text" name="id_layout" id="id_layout">
        </div>
        <div class="mb-3">
            <label for="nama_layout">Nama layout</label><br>
            <input type="text" name="nama_layout" id="nama_layout">
        </div>
        <div class="mb-3">
            <label for="harga">Harga</label><br>
            <input type="text" name="harga" id="harga">
        </div>
        <div class="mb-3">
            <label for="jumlahOrang">Kapasitas</label><br>
            <input type="text" name="jumlahOrang" id="jumlahOrang">
        </div>
        <input type="submit" value="tambah" class="btn btn-primary">
        <input type="submit" value="simpan">
    </form>
@endsection
</body>
</html>
