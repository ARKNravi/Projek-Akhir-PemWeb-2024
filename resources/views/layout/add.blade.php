@extends('template.index')
@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Tambah Layout</h1>
    <a href="/layout" class="btn btn-info mb-3">Kembali</a>
    <form action="/layout/tambah" method="post" class="needs-validation" novalidate>
        {{ csrf_field() }}
        <div class="mb-3">
            <label for="nama_layout" class="form-label">Nama Layout:</label>
            <input type="text" name="nama_layout" id="nama_layout" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga:</label>
            <input type="number" name="harga" id="harga" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="jumlahOrang" class="form-label">Kapasitas:</label>
            <input type="number" name="jumlahOrang" id="jumlahOrang" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
</div>
@endsection
