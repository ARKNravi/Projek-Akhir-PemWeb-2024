@extends('template.index')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ruangan</title>
    <style>
        .pagination li {
            float: left;
            list-style-type: none;
            margin: 5px;
        }
        .form-container {
            display: flex;
            gap: 1rem;
            margin-bottom: 1rem;
        }
        .btn-oval {
            border-radius: 50px;
        }
    </style>
</head>
<body>
@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Daftar Ruangan</h1>
    <div class="mb-4">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary btn-oval">Kembali ke Dashboard</a>
        <a href="{{ route('admin.create') }}" class="btn btn-primary btn-oval">Tambah Ruangan</a>
    </div>
    <div class="form-container">
        <form action="{{ route('admin.ruangan') }}" method="GET" class="d-flex gap-2">
            <input type="text" name="search" id="search" class="form-control" placeholder="Cari ruangan...">
            <button type="submit" class="btn btn-secondary btn-oval">Search</button>
        </form>
        <form action="{{ route('admin.ruangan') }}" method="GET" class="d-flex gap-2">
            <select name="sort" id="sort" class="form-select">
                <option value="id_ruangan">Id ruangan</option>
                <option value="nama_ruangan">Nama ruangan</option>
                <option value="backdrop">Backdrop</option>
            </select>
            <button type="submit" class="btn btn-secondary btn-oval">Sort</button>
        </form>
    </div>

    @if($message)
        <div class="alert alert-info">{{ $message }}</div>
    @else
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Id Ruangan</th>
                        <th>Nama Ruangan</th>
                        <th>Kapasitas Ruangan</th>
                        <th>Harga</th>
                        <th>Backdrop</th>
                        <th>Tanggal</th>
                        <th>Waktu Mulai</th>
                        <th>Waktu Selesai</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ruangan as $r)
                        <tr>
                            <td>{{ $r->id_ruangan }}</td>
                            <td>{{ $r->nama_ruangan }}</td>
                            <td>{{ $r->kapasitas }}</td>
                            <td>{{ $r->harga }}</td>
                            <td>{{ $r->backdrop }}</td>
                            <td>{{ $r->session->tanggal ?? 'N/A' }}</td>
                            <td>{{ $r->session->waktu_mulai ?? 'N/A' }}</td>
                            <td>{{ $r->session->waktu_selesai ?? 'N/A' }}</td>
                            <td>
                                <a href="{{ route('admin.ruangan.edit', $r->id_ruangan) }}" class="btn btn-warning btn-sm btn-oval">Edit</a>
                                <form method="POST" action="{{ route('admin.ruangan.destroy', $r->id_ruangan) }}" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm btn-oval">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    <div class="pagination mt-4">
        Halaman : {{ $ruangan->currentPage() }}<br>
        Jumlah data : {{ $ruangan->total() }}<br>
        Data per halaman : {{ $ruangan->perPage() }}<br>
    </div>
    <div class="pagination">
        {{ $ruangan->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
</body>
</html>
