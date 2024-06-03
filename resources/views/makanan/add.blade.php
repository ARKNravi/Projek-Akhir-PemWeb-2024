@extends('template.index')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Tambah Makanan</h1>
    <a href="/makanan" class="btn btn-info mb-3">Kembali</a>
    <form action="/makanan/tambah" method="post" class="needs-validation" novalidate>
        {{ csrf_field() }}
        <div class="mb-3">
            <label for="id_makanan" class="form-label">ID Makanan:</label>
            <input type="text" name="id_makanan" id="id_makanan" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="menu_makanan" class="form-label">Nama Makanan:</label>
            <input type="text" name="menu_makanan" id="menu_makanan" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="harga_makanan" class="form-label">Harga:</label>
            <input type="number" name="harga_makanan" id="harga_makanan" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
</div>
@endsection
