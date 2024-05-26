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
    <h1 class="mb-4">Daftar paket</h1>
    <a href="/paket/tambah" class="btn btn-primary mb-4">Tambah Paket</a>
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