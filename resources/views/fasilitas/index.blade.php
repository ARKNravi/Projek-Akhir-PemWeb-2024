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
    <a href="/fasilitas/tambah" class="btn btn-primary mb-4">Tambah Fasilitas</a>
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
