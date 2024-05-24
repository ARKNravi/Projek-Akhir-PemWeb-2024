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
    <a href="/kamar/tambah">Tambah Kamar</a>
    @if (empty($kamar))
    <p>Tidak ada kamar di dalam data</p>
    @else
    <table>
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
                <td><a href="/kamar/edit/{{$kmr->nomor_kamar}}">Edit</a>|
                    <a href="/kamar/hapus/{{$kmr->nomor_kamar}}">Hapus</a>
                </td>
            </tr>
        @endforeach
    </table>  
    @endif
    @endsection
</body>
</html>