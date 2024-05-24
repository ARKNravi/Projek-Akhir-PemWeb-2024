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
    <a href="/makanan/tambah">Tambah Makanan</a>
    @if (empty($makanan))
    <p>Tidak ada makanan dalam data</p>
    @else
    <table>
        <tr>
            <th>id makanan</th>
            <th>Nama makanan</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
        @foreach ($makanan as $mkn)
            <tr>
                <td>{{$mkn->id_makanan}}</td>
                <td>{{$mkn->nama_makanan}}</td>
                <td>{{$mkn->harga_makanan}}</td>
                <td><a href="/makanan/edit/{{$mkn->id_makanan}}">Edit</a>|
                    <a href="/makanan/hapus/{{$mkn->id_makanan}}">Hapus</a>
                </td>
            </tr>
        @endforeach
    </table>   
    @endif
    @endsection
</body>
</html>