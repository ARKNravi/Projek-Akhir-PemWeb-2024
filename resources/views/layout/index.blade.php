@extends('template.index')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Layout</title>
</head>
<body>
    @section('content')
    <h1 class="mb-4">Layout</h1>
    <a href="/layout/tambah" class="btn btn-primary mb-4">Tambah layout</a>
    @if (empty($layout))
    <p>Tidak ada layout dalam data</p>
    @else
    <div class="forms d-flex flex-row gap-3 justify-content-start align-items-start">
        <form action="/layout" method="GET" class="mb-3 d-flex flex-row gap-1 justify-content-center align-items-start">
            <div class="input">
                <label for="search">Search</label>
                <input type="text" name="search" id="search">
            </div>
            <div class="submitButton">
                <input type="submit" value="search" class="btn btn-secondary btn-sm px-4">
            </div>
        </form>
        <form action="/layout" method="GET" class="mb-3 d-flex flex-row gap-1 justify-content-start align-items-stretch">
            <div class="input">
                <label for="sort">Sort by : </label>
                <select name="sort" id="sort">
                    <option value="id_layout">Id layout</option>
                    <option value="nama_layout">Nama layout</option>
                    <option value="harga">Harga</option>
                    <option value="jumlahOrang">Kapasitas</option>
                </select>
            </div>
            <div class="submitButton">
                <input type="submit" value="sort"class="btn btn-secondary btn-sm px-4">
            </div>
        </form>
    </div>

    <table class="table table-striped">
        <tr>
            <th>id layout</th>
            <th>Nama layout</th>
            <th>Harga</th>
            <th>Jumlah orang</th>
            <th>Aksi</th>
        </tr>
        @foreach ($layout as $lyt)
            <tr>
                <td>{{$lyt->id_layout}}</td>
                <td>{{$lyt->nama_layout}}</td>
                <td>{{$lyt->harga}}</td>
                <td>{{$lyt->jumlahOrang}}</td>
                <td><a href="/layout/edit/{{$lyt->id_layout}}" class="btn btn-warning btn-sm">Edit</a>|
                    <a href="/layout/hapus/{{$lyt->id_layout}}" class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>
        @endforeach
    </table>
    @endif
    @endsection
</body>
</html>
