@extends('template.index')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit fasilitas</title>
</head>
<body>
    @section('content')
        <div class="container mt-4">
            <a href="/paket" class="btn btn-secondary mb-4">Kembali</a>
            <h1 class="mb-4">Edit paket</h1>
            @foreach ($paket as $pkt)
            <p>{{$pkt->id_paket}}</p>
            <form method="POST" action="/paket/edit" class="needs-validation" novalidate>
                @csrf
                <input type="hidden" name="id_paket" id="id_paket" value="{{$pkt->id_paket}}">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama paket</label>
                    <input type="text" id="nama" name="nama" class="form-control" required value="{{$pkt->nama_paket}}">
                </div>
                <div class="mb-3">
                    <label for="id_fasilitas" class="form-label">id_fasilitas</label>
                    <select name="id_fasilitas" id="id_fasilitas">
                        @foreach ($fasilitas as $fslt)
                            <option value="{{$fslt->id_fasilitas}}">{{$fslt->nama_fasilitas}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
            </div>
            @endforeach

    @endsection
</body>
</html>
