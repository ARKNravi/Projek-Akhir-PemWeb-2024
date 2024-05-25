@extends('template.index')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Daftar Ruangan</h1>
    <div class="mb-3">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
        <a href="{{ route('admin.create') }}" class="btn btn-primary">Tambah Ruangan</a>
    </div>
    @if($message)
        <div class="alert alert-info">{{ $message }}</div>
    @else
<<<<<<< HEAD
        <table>
            <tr>
                <th>Nama Ruangan</th>
                <th>Kapasitas Ruangan</th>
                <th>Harga</th>
                <th>Backdrop</th>
                <th>Layout</th>
                <th>Aksi</th>
            </tr>
            @foreach($ruangan as $r)
                <tr>
                    <td>{{ $r->nama_ruangan }}</td>
                    <td>{{ $r->luas_ruangan }}</td>
                    <td>{{ $r->harga }}</td>
                    <td>{{ $r->backdrop }}</td>
                    <td>{{$r->id_layout}}</td>
                    <td>
                        <a href="{{ route('admin.ruangan.edit', $r->id_ruangan) }}">Edit</a>
                        <form method="POST" action="{{ route('admin.ruangan.destroy', $r->id_ruangan) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
=======
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nama Ruangan</th>
                    <th>Kapasitas Ruangan</th>
                    <th>Harga</th>
                    <th>Backdrop</th>
                    <th>Aksi</th>
>>>>>>> origin/main
                </tr>
            </thead>
            <tbody>
                @foreach($ruangan as $r)
                    <tr>
                        <td>{{ $r->nama_ruangan }}</td>
                        <td>{{ $r->luas_ruangan }}</td>
                        <td>{{ $r->harga }}</td>
                        <td>{{ $r->backdrop }}</td>
                        <td>
                            <a href="{{ route('admin.ruangan.edit', $r->id_ruangan) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form method="POST" action="{{ route('admin.ruangan.destroy', $r->id_ruangan) }}" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    <form method="POST" action="{{ route('admin.logout') }}">
        @csrf
        <button type="submit" class="btn btn-danger mt-4">Logout</button>
    </form>
</div>
@endsection
