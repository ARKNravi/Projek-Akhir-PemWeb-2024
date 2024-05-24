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
                <th>Status</th>
                <th>Dokumentasi</th>
                <th>Aksi</th>
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
                    <td>{{ $order->status }}</td>
                    <td>
                        @if($order->status == 'Check Out')
                            <form method="POST" action="{{ route('admin.order.upload', ['id' => $order->id_order]) }}" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="dokumentasi[]" multiple required>
                                <button type="submit">Unggah Dokumentasi</button>
                            </form>
                        @endif
                        @if($order->dokumentasi)
                            @php
                                $images = json_decode($order->dokumentasi, true);
                            @endphp
                            @if($images)
                                @foreach($images as $image)
                                    <a href="{{ route('admin.order.viewImage', ['id' => $order->id_order, 'image' => $image]) }}">
                                        <button type="button">Lihat {{ $image }}</button>
                                    </a>
                                    <a href="{{ route('admin.order.downloadImage', ['id' => $order->id_order, 'image' => $image]) }}">
                                        <button type="button">Unduh {{ $image }}</button>
                                    </a>
                                    <form method="POST" action="{{ route('admin.order.deleteImage', ['id' => $order->id_order, 'image' => $image]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Hapus {{ $image }}</button>
                                    </form>
                                @endforeach
                            @endif
                        @endif
                    </td>
                    <td>
                        @if($order->status == 'Check In')
                            <form method="POST" action="{{ route('admin.order.checkout', ['id' => $order->id_order]) }}">
                                @csrf
                                @method('PUT')
                                <button type="submit">Check Out</button>
                            </form>
                        @endif
                        @if($order->status == 'Reservasi')
                            <form method="POST" action="{{ route('admin.order.cancel', ['id' => $order->id_order]) }}">
                                @csrf
                                @method('PUT')
                                <button type="submit">Batal</button>
                            </form>
                            <a href="{{ route('admin.order.checkin', ['id' => $order->id_order]) }}">
                                <button type="button">Check In</button>
                            </a>
                        @elseif($order->status == 'Dibatalkan')
                            <form method="POST" action="{{ route('admin.order.delete', ['id' => $order->id_order]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Hapus</button>
                            </form>
                        @endif
                    </td>
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
