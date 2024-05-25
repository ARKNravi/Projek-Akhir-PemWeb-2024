@extends('template.index')
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Ruangan</title>
</head>
<body>
    @section('content')
    <h1>Daftar Ruangan</h1>
    <a href="{{ route('admin.dashboard') }}">Kembali ke Dashboard</a>
    <a href="{{ route('admin.create') }}">Tambah Ruangan</a>
    @if($message)
        <p>{{ $message }}</p>
    @else
        <table>
            <tr>
                <th>Nama Ruangan</th>
                <th>Kapasitas Ruangan</th>
                <th>Harga</th>
                <th>Backdrop</th>
                <th>Aksi</th>
            </tr>
            @foreach($ruangan as $r)
                <tr>
                    <td>{{ $r->nama_ruangan }}</td>
                    <td>{{ $r->luas_ruangan }}</td>
                    <td>{{ $r->harga }}</td>
                    <td>{{ $r->backdrop }}</td>
                    <td>
                        <a href="{{ route('admin.ruangan.edit', $r->id_ruangan) }}">Edit</a>
                        <form method="POST" action="{{ route('admin.ruangan.destroy', $r->id_ruangan) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    @endif
    <form method="POST" action="{{ route('admin.logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
    @endsection
    
</body>
</html>
