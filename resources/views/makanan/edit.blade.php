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
    <h1 class="mb-4">Edit Makanan</h1>
    @foreach ($makanan as $mkn)
    <a href="/makanan" class="btn btn-info mb-4">Kembali</a>
    <form action="/makanan/edit" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="id_makanan" id="id_makanan" value="{{$mkn->id_makanan}}">
        <div class="mb-3">
            <label for="menu_makanan">Menu Makanan</label><br>
            <input type="text" name="=menu_makanan" id="menu_makanan" value="{{$mkn->menu_makanan}}">
        </div>
        <div class="mb-3">
            <label for="harga">Harga</label><br>
            <input type="text" name="harga_makanan" id="harga_makanan" value="{{$mkn->harga_makanan}}">
        </div>
        <input type="submit" value="edit" class="btn btn-primary">
    </form>
    @endforeach
    @endsection

</body>
</html>
