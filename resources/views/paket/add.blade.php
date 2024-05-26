@extends('template.index')

@section('content')
<div class="container mt-4">
    <a href="/paket" class="btn btn-secondary mb-4">Kembali</a>
    <h1 class="mb-4">Tambah Paket</h1>
    <form method="POST" action="/paket/tambah" class="needs-validation" novalidate>
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama paket</label>
            <input type="text" id="nama" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="id_fasilitas" class="form-label">Fasilitas</label>
            <select name="id_fasilitas" id="id_fasilitas">
                @foreach ($fasilitas as $fslt)
                    <option value="{{$fslt->id_fasilitas}}">{{$fslt->nama_fasilitas}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
</div>
@endsection