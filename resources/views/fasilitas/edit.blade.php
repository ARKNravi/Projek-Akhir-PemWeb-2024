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
            <a href="/fasilitas" class="btn btn-secondary mb-4">Kembali</a>
            <h1 class="mb-4">Edit fasilitas</h1>
            @foreach ($fasilitas as $fslt)
            <form method="POST" action="/fasilitas/edit" class="needs-validation" novalidate>
                @csrf
                <input type="hidden" name="id_fasilitas" value="{{$fslt->id_fasilitas}}">
                <div class="mb-3">
                    <label for="nama_fasilitas" class="form-label">Nama fasilitas</label>
                    <input type="text" id="nama_fasilitas" name="nama_fasilitas" class="form-control" required value="{{$fslt->nama_fasilitas}}">
                </div>
                <div class="mb-3">
                    <label for="kapasitas" class="form-label">Kapasitas</label>
                    <input type="number" id="kapasitas" name="kapasitas" class="form-control" required value="{{$fslt->kapasitas}}">
                </div>
                <div class="mb-3">
                    <label for="lama_waktu peminjaman" class="form-label">Durasi peminjaman : </label>
                    <input type="text" id="lama_waktu_peminjaman" name="lama_waktu peminjaman" class="form-control" required value="{{$fslt->lama_waktu_peminjaman}}">
                </div>
                <div class="mb-3">
                    <label for="Materials" class="form-label">Materials</label>
                    <input type="text" id="materials" name="materials" class="form-control" required value="{{$fslt->materials}}">
                </div>
                <div class="mb-3">
                    <label for="id_ruangan">ID ruangan</label>
                    <select name="id_ruangan" id="id_ruangan" class="form-select">
                        @foreach ($ruangan as $rng)
                            <option value="{{$rng->id_ruangan}}">{{$rng->nama_ruangan}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="id_makanan">ID makanan</label>
                    <select name="id_makanan" id="id_makanan" class="form-select">
                        @foreach ($makanan as $mkn)
                            <option value="{{$mkn->id_makanan}}">{{$mkn->nama_makanan}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="nomor_kamar">Nomor kamar</label>
                    <select name="nomor_kamar" id="nomor_kamar" class="form-select">
                        @foreach ($kamar as $kmr)
                            <option value="{{$kmr->nomor_kamar}}">{{$kmr->nomor_kamar}}</option>
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