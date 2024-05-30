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
            <label for="id_ruangan" class="form-label">Ruangan</label>
            <select name="id_ruangan" id="id_ruangan" class="form-control">
                @foreach ($ruangan as $rng)
                    <option value="{{$rng->id_ruangan}}">{{$rng->nama_ruangan}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_makanan" class="form-label">Makanan</label>
            <select name="id_makanan" id="id_makanan" class="form-control">
                @foreach ($makanan as $mkn)
                    <option value="{{$mkn->id_makanan}}">{{$mkn->menu_makanan}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
</div>
@endsection
