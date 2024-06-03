@extends('template.index')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Layout</title>
    <style>
        .pagination li {
            float: left;
            list-style-type: none;
            margin: 5px;
        }

        .form-container {
            display: flex;
            gap: 1rem;
        }

    </style>
</head>

<body>
    @section('content')
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Layout</h1>
        <div class="mb-4">
            <a href="/layout/tambah" class="btn btn-primary">Tambah Layout</a>
        </div>
        <div class="form-container mb-4">
            <form action="/layout" method="GET" class="d-flex gap-1">
                <div class="flex-grow-1">
                    <input type="text" name="search" id="search" class="form-control" placeholder="Cari layout...">
                </div>
                <button type="submit" class="btn btn-secondary">Search</button>
            </form>
            <form action="/layout" method="GET" class="d-flex gap-1">
                <div class="flex-grow-1">
                    <select name="sort" id="sort" class="form-select">
                        <option value="id_layout">ID Layout</option>
                        <option value="nama_layout">Nama Layout</option>
                        <option value="harga">Harga</option>
                        <option value="jumlahOrang">Kapasitas</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-secondary">Sort</button>
            </form>
        </div>

        @if ($layout->isEmpty())
            <div class="alert alert-warning text-center" role="alert">
                Tidak ada layout dalam data
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>ID Layout</th>
                            <th>Nama Layout</th>
                            <th>Harga</th>
                            <th>Jumlah Orang</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($layout as $lyt)
                            <tr>
                                <td>{{ $lyt->id_layout }}</td>
                                <td>{{ $lyt->nama_layout }}</td>
                                <td>{{ $lyt->harga }}</td>
                                <td>{{ $lyt->jumlahOrang }}</td>
                                <td>
                                    <a href="/layout/edit/{{ $lyt->id_layout }}" class="btn btn-warning btn-sm btn-oval">Edit</a>
                                    <a href="/layout/hapus/{{ $lyt->id_layout }}" class="btn btn-danger btn-sm btn-oval">Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pagination mt-5">
                Halaman: {{ $layout->currentPage() }} <br/>
                Jumlah data: {{ $layout->total() }} <br/>
                Data per halaman: {{ $layout->perPage() }} <br/>
            </div>
            <div class="d-flex">
                {{ $layout->links('pagination::bootstrap-5') }}
            </div>
        @endif
    </div>
    @endsection
</body>

</html>
