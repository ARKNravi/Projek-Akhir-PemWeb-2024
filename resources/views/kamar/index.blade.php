@extends('template.index')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kamar</title>
</head>
<body>
    @section('content') 
    <div class="container mt-4">
        <h1 class="mb-4">Daftar Kamar</h1>
        <div class="mb-3">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
            <a href="/kamar/tambah" class="btn btn-primary">Tambah Kamar</a>
        </div>
        <div class="forms d-flex flex-row gap-3 justify-content-start align-items-start">
            <form action="/kamar" method="GET" class="mb-3 d-flex flex-row gap-1 justify-content-center align-items-start">
                <div class="input">
                    <label for="search">Search</label>
                    <input type="text" name="search" id="search">
                </div>
                <div class="submitButton">
                    <input type="submit" value="search" class="btn btn-secondary btn-sm px-4">
                </div>
            </form>
            <form action="/kamar" method="GET" class="mb-3 d-flex flex-row gap-1 justify-content-start align-items-stretch">
                <div class="input">
                    <label for="sort">Sort by : </label>
                    <select name="sort" id="sort">
                        <option value="nomor_kamar">Nomor kamar</option>
                        <option value="tipe">Tipe</option>
                        <option value="harga">Harga</option>
                    </select>
                </div>
                <div class="submitButton">
                    <input type="submit" value="sort"class="btn btn-secondary btn-sm px-4">
                </div>
            </form>
        </div>

    @if (empty($kamar))
    <p>Tidak ada kamar di dalam data</p>
    @else
    <table class="table table-striped">
        <tr>
            <th>nomor kamar</th>
            <th>Tipe</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
        @foreach ($kamar as $kmr)
            <tr>
                <td>{{$kmr->nomor_kamar}}</td>
                <td>{{$kmr->tipe}}</td>
                <td>{{$kmr->harga}}</td>
                <td><a href="/kamar/edit/{{$kmr->nomor_kamar}}" class="btn btn-warning btn-sm">Edit</a>|
                    <a href="/kamar/hapus/{{$kmr->nomor_kamar}}" class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>
        @endforeach
    </table>   
    @endif
    @endsection
</body>
</html>