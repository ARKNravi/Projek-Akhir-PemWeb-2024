@extends('template.index')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fasilitas</title>
</head>
<body>
    @section('content')
    <div class="container mt-4">
    <h1 class="mb-4">Daftar fasilitas</h1>
    <div class="mb-3">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
        <a href="/fasilitas/tambah" class="btn btn-primary">Tambah Fasilitas</a>
    </div>
    <div class="forms d-flex flex-row gap-3 justify-content-start align-items-start">
        <form action="/fasilitas" method="GET" class="mb-3 d-flex flex-row gap-1 justify-content-center align-items-start">
            <div class="input">
                <label for="search">Search</label>
                <input type="text" name="search" id="search">
            </div>
            <div class="submitButton">
                <input type="submit" value="search" class="btn btn-secondary btn-sm px-4">
            </div>
        </form>
        <form action="/fasilitas" method="GET" class="mb-3 d-flex flex-row gap-1 justify-content-start align-items-stretch">
            <div class="input">
                <label for="sort">Sort by : </label>
                <select name="sort" id="sort">
                    <option value="id_fasilitas">Id fasilitas</option>
                    <option value="nama_fasilitas">Nama Fasilitas</option>
                    <option value="kapasitas">Kapasitas</option>
                    <option value="lama_waktu_peminjaman">Durasi peminjaman</option>
                    <option value="material">Materials</option>
                    <option value="id_ruangan">Id ruangan</option>
                    <option value="id_makanan">Id makanan</option>
                    <option value="nomor_kamar">Nomor kamar</option>
                </select>
            </div>
            <div class="submitButton">
                <input type="submit" value="sort"class="btn btn-secondary btn-sm px-4">
            </div>
        </form>
    </div>

    @if (empty($fasilitas))
    <p>Tidak ada fasilitas dalam data</p>
    @else
    <table class="table table-striped">
        <tr>
            <th>id fasilitas</th>
            <th>Nama fasilitas</th>
            <th>Kapasitas</th>
            <th>Durasi peminjaman</th>
            <th>Materials</th>
            <th>id ruangan</th>
            <th>id makanan</th>
            <th>Nomor kamar</th>
            <th>Aksi</th>
        </tr>
        @foreach ($fasilitas as $fslt)
            <tr>
                <td>{{$fslt->id_fasilitas}}</td>
                <td>{{$fslt->nama_fasilitas}}</td>
                <td>{{$fslt->kapasitas}}</td>
                <td>{{$fslt->lama_waktu_peminjaman}}</td>
                <td>{{$fslt->materials}}</td>
                <td>{{$fslt->id_ruangan}}</td>
                <td>{{$fslt->id_makanan}}</td>
                <td>{{$fslt->nomor_kamar}}</td>
                <td><a href="/fasilitas/edit/{{$fslt->id_fasilitas}}" class="btn btn-warning btn-sm">Edit</a>|
                    <a href="/fasilitas/hapus/{{$fslt->id_fasilitas}}" class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>
        @endforeach
    </table>
    @endif
    @endsection
    </div>

</body>
</html>
