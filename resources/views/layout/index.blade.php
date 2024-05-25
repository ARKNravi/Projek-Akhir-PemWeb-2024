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
    <a href="/layout/tambah">Tambah layout</a>
    @if (empty($layout))
    <p>Tidak ada layout dalam data</p>
    @else
    <table>
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
                <td><a href="/layout/edit/{{$lyt->id_layout}}">Edit</a>|
                    <a href="/layout/hapus/{{$lyt->id_layout}}">Hapus</a>
                </td>
            </tr>
        @endforeach
    </table>   
    @endif
    @endsection
</body>
</html>