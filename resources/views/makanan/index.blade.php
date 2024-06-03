@extends('template.index')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Makanan</title>
    
    <style type ="text/css">
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
        <h1 class="mb-4 text-center">Daftar Makanan</h1>
        <div class="mb-4">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
            <a href="/makanan/tambah" class="btn btn-primary">Tambah Makanan</a>
        </div>
        <div class="form-container mb-4">
            <form action="/makanan" method="GET" class="d-flex gap-1">
                <div class="flex-grow-1">
                    <input type="text" name="search" id="search" class="form-control" placeholder="Cari makanan...">
                </div>
                <button type="submit" class="btn btn-secondary">Search</button>
            </form>
            <form action="/makanan" method="GET" class="d-flex gap-1">
                <div class="flex-grow-1">
                    <select name="sort" id="sort" class="form-select">
                        <option value="id_makanan">ID makanan</option>
                        <option value="menu_makanan">Nama makanan</option>
                        <option value="harga_makanan">Harga makanan</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-secondary">Sort</button>
            </form>
        </div>

        @if ($makanan->isEmpty())
            <div class="alert alert-warning text-center" role="alert">
                Tidak ada makanan dalam data
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>ID Makanan</th>
                            <th>Nama Makanan</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($makanan as $mkn)
                            <tr>
                                <td>{{ $mkn->id_makanan }}</td>
                                <td>{{ $mkn->menu_makanan }}</td>
                                <td>{{ $mkn->harga_makanan }}</td>
                                <td>
                                    <a href="/makanan/edit/{{ $mkn->id_makanan }}" class="btn btn-warning btn-sm btn-oval">Edit</a>
                                    <a href="/makanan/hapus/{{ $mkn->id_makanan }}" class="btn btn-danger btn-sm btn-oval">Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pagination m-3 mt-5">
                Halaman : {{ $makanan->currentPage() }} <br/>
                Jumlah data : {{ $makanan->total() }} <br/>
                Data per halaman : {{ $makanan->perPage() }}<br/>
            </div>
            <div class="pagination">
                {{ $makanan->links('pagination::bootstrap-5') }}
            </div>
        @endif
    </div>
    @endsection
</body>

</html>
