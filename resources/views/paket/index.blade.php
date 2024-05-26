@extends('template.index')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Paket</title>
</head>
<body>
    @section('content')
    <div class="container mt-4">
    <h1 class="mb-4">Daftar paket</h1><div class="mb-3">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
        <a href="/paket/tambah" class="btn btn-primary">Tambah Paket</a>
    </div>
    <div class="forms d-flex flex-row gap-3 justify-content-start align-items-start">
        <form action="/paket" method="GET" class="mb-3 d-flex flex-row gap-1 justify-content-center align-items-start">
            <div class="input">
                <label for="search">Search</label>
                <input type="text" name="search" id="search">
            </div>
            <div class="submitButton">
                <input type="submit" value="search" class="btn btn-secondary btn-sm px-4">
            </div>
        </form>
        <form action="/paket" method="GET" class="mb-3 d-flex flex-row gap-1 justify-content-start align-items-stretch">
            <div class="input">
                <label for="sort">Sort by : </label>
                <select name="sort" id="sort">
                    <option value="id_paket">Id fasilitas</option>
                    <option value="nama">Nama Paket</option>
                    <option value="harga_total">Harga total</option>
                    <option value="id_fasilitas">Id fasilitas</option>
                </select>
            </div>
            <div class="submitButton">
                <input type="submit" value="sort"class="btn btn-secondary btn-sm px-4">
            </div>
        </form>
    </div>

    @if (empty($paket))
    <div class="alert alert-info">Belum ada paket sama sekali</div>
    @else
    <table class="table table-striped">
        <tr>
            <th>id Paket</th>
            <th>Nama paket</th>
            <th>Harga total</th>
            <th>Id fasilitas</th>
            <th>Aksi</th>
        </tr>
        @foreach ($paket as $pkt)
            <tr>
               <td>{{$pkt->id_paket}}</td>
               <td>{{$pkt->nama}}</td>
               <td>{{$pkt->harga_total}}</td>
                <td>{{$pkt->id_fasilitas}}</td>
                <td><a href="/paket/edit/{{$pkt->id_paket}}" class="btn btn-warning btn-sm">Edit</a>|
                    <a href="/paket/hapus/{{$pkt->id_paket}}" class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>
        @endforeach
    </table>
    @endif
    @endsection
    </div>
</body>
</html>
