@extends('template.index')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ubah Detail Ruangan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="d-flex flex-column min-vh-100">
    @section('content')
    <div class="p-3">
        <h1>Ubah Detail Ruangan</h1>
        <form method="POST" action="{{ route('admin.ruangan.update', $ruangan->id_ruangan) }}" class="needs-validation" novalidate>
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama_ruangan" class="form-label">Nama Ruangan:</label>
                <input type="text" id="nama_ruangan" name="nama_ruangan" class="form-control" value="{{ $ruangan->nama_ruangan }}" required>
            </div>
            <div class="mb-3">
                <label for="luas_ruangan" class="form-label">Kapasitas Ruangan:</label>
                <input type="number" id="luas_ruangan" name="luas_ruangan" class="form-control" value="{{ $ruangan->luas_ruangan }}" required>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga:</label>
                <input type="number" id="harga" name="harga" class="form-control" value="{{ $ruangan->harga }}" required>
            </div>
            <div class="mb-3">
                <label for="backdrop" class="form-label">Status:</label>
                <input type="text" id="backdrop" name="backdrop" class="form-control" value="{{ $ruangan->backdrop }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
    @endsection
</body>
</html>
