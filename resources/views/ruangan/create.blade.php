@extends('template.index')
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Ruangan</title>
</head>
<body>
    @section('content')
    <h1>Tambah Ruangan</h1>
    <form method="POST" action="{{ route('admin.ruangan.store') }}">
        @csrf
        <label for="nama_ruangan">Nama Ruangan:</label><br>
        <input type="text" id="nama_ruangan" name="nama_ruangan"><br>
        <label for="luas_ruangan">Luas Ruangan:</label><br>
        <input type="number" id="luas_ruangan" name="luas_ruangan"><br>
        <label for="harga">Harga:</label><br>
        <input type="number" id="harga" name="harga"><br>
        <label for="backdrop">Backdrop:</label><br>
        <input type="text" id="backdrop" name="backdrop"><br>
        <label for="id_layout">ID Layout:</label><br>
        
            @if($message)
                <p>{{$message}}</p>
                <a href="/layout">Halaman layout</a>
            @else
            <select name="id_layout" id="id_layout">
            @foreach ($layout as $lyt)
            <option value="{{$lyt->id_layout}}">{{$lyt->nama_layout}}</option>
            @endforeach
            </select><br><br>
            <input type="submit" value="Tambah">
            @endif
    </form>
    @endsection
   
</body>
</html>
