@extends('template.index')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Daftar Ruangan</h1>
    <div class="mb-3">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
        <a href="{{ route('admin.create') }}" class="btn btn-primary">Tambah Ruangan</a>
    </div>
    <div class="forms d-flex flex-row gap-3 justify-content-start align-items-start">
        <form action="{{route('admin.ruangan')}}" method="GET" class="mb-3 d-flex flex-row gap-1 justify-content-center align-items-start">
            <div class="input">
                <label for="search">Search</label>
                <input type="text" name="search" id="search">
            </div>
            <div class="submitButton">
                <input type="submit" value="search" class="btn btn-secondary btn-sm px-4">
            </div>
        </form>
        <form action="{{route('admin.ruangan')}}" method="GET" class="mb-3 d-flex flex-row gap-1 justify-content-start align-items-stretch">
            <div class="input">
                <label for="sort">Sort by : </label>
                <select name="sort" id="sort">
                    <option value="id_ruangan">Id ruangan</option>
                    <option value="nama_ruangan">Nama ruangan</option>
                    <option value="backdrop">Backdrop</option>
                </select>
            </div>
            <div class="submitButton">
                <input type="submit" value="sort"class="btn btn-secondary btn-sm px-4">
            </div>
        </form>
    </div>

    @if($message)
        <div class="alert alert-info">{{ $message }}</div>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id Ruangan</th>
                    <th>Nama Ruangan</th>
                    <th>Kapasitas Ruangan</th>
                    <th>Harga</th>
                    <th>Backdrop</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ruangan as $r)
                    <tr>
                        <td>{{$r->id_ruangan}}</td>
                        <td>{{ $r->nama_ruangan }}</td>
                        <td>{{ $r->kapasitas }}</td>
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
</div>
@endsection
