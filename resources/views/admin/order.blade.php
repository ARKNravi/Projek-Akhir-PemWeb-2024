<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pesanan</title>
</head>
<body>
    <h1>Daftar Pesanan</h1>
    @if($message)
        <p>{{ $message }}</p>
    @else
        <table>
            <tr>
                <th>Tanggal Pesanan</th>
                <th>Jenis Paket</th>
                <th>Sesi</th>
                <th>Ruangan</th>
                <th>Nama Pemesan</th>
                <th>Nomor HP Pemesan</th>
                <th>Metode Pembayaran</th>
            </tr>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->tanggal }}</td>
                    <td>{{ $order->paket ? $order->paket->nama : '' }}</td>
                    <td>{{ $order->session->waktu_mulai }} - {{ $order->session->waktu_selesai }}</td>
                    <td>{{ $order->paket && $order->paket->fasilitas && $order->paket->fasilitas->ruangan ? $order->paket->fasilitas->ruangan->nama_ruangan : 'N/A' }}</td>
                    <td>{{ $order->pemesan->nama }}</td>
                    <td>{{ $order->pemesan->nomor_telepon }}</td>
                    <td>{{ $order->payment->metode_pembayaran }}</td>
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
