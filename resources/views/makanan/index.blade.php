@extends('template.index')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Makanan</title>
</head>

<body>
    @section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Daftar Makanan</h1>
        <div class="mb-3">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
            <a href="/makanan/tambah" class="btn btn-primary">Tambah Makanan</a>
        </div>
        <div class="forms d-flex flex-row gap-3 justify-content-start align-items-start">
            <form action="/makanan" method="GET" class="mb-3 d-flex flex-row gap-1 justify-content-center align-items-start">
                <div class="input">
                    <label for="search">Search</label>
                    <input type="text" name="search" id="search">
                </div>
                <div class="submitButton">
                    <input type="submit" value="search" class="btn btn-secondary btn-sm px-4">
                </div>
            </form>
            <form action="/makanan" method="GET" class="mb-3 d-flex flex-row gap-1 justify-content-start align-items-stretch">
                <div class="input">
                    <label for="sort">Sort by : </label>
                    <select name="sort" id="sort">
                        <option value="id_makanan">ID makanan</option>
                        <option value="menu_makanan">Nama makanan</option>
                        <option value="harga_makanan">Harga makanan</option>
                    </select>
                </div>
                <div class="submitButton">
                    <input type="submit" value="sort" class="btn btn-secondary btn-sm px-4">
                </div>
            </form>
        </div>
        @if (empty($makanan))
        <p>Tidak ada makanan dalam data</p>
        @else
        <table class="table table-striped">
            <tr>
                <th>id makanan</th>
                <th>Nama makanan</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
            @foreach ($makanan as $mkn)
            <tr>
                <td>{{$mkn->id_makanan}}</td>
                <td>{{$mkn->menu_makanan}}</td>
                <td>{{$mkn->harga_makanan}}</td>
                <td><a href="/makanan/edit/{{$mkn->id_makanan}}" class="btn btn-warning btn-sm">Edit</a>|
                    <a href="/makanan/hapus/{{$mkn->id_makanan}}" class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>
            @endforeach
        </table>
        @endif
        @endsection
    </div>

</body>

</html>
