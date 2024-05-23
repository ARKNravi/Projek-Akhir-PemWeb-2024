<!DOCTYPE html>
<html>
<head>
    <title>Daftar Ruangan</title>
</head>
<body>
    <h1>Daftar Ruangan</h1>
    @if($message)
        <p>{{ $message }}</p>
    @else
        <table>
            <tr>
                <th>Nama Ruangan</th>
                <th>Kapasitas Ruangan</th>
                <th>Harga</th>
                <th>Status</th>
            </tr>
            @foreach($ruangan as $r)
                <tr>
                    <td>{{ $r->nama_ruangan }}</td>
                    <td>{{ $r->luas_ruangan }}</td>
                    <td>{{ $r->harga }}</td>
                    <td>{{ $r->status }}</td>
                </tr>
            @endforeach
        </table>
    @endif
    <form method="POST" action="{{ route('admin.logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>
