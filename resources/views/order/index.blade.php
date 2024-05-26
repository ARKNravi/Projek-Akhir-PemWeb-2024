@extends('template.index')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Pesanan</title>
   
</head>
<body class="d-flex flex-column min-vh-100">
        @section('content')
        <div class="content p-3">
            <h1>Daftar Pesanan</h1>
            <a href="{{ route('admin.order.create') }}" class="btn btn-primary mb-3">Tambah Pesanan</a>
            @if($message)
                <div class="alert alert-info">{{ $message }}</div>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
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
                        </thead>
                        <tbody>
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
                                            <form method="POST" action="{{ route('admin.order.upload', ['id' => $order->id_order]) }}" enctype="multipart/form-data" class="mb-2">
                                                @csrf
                                                <input type="file" name="dokumentasi[]" multiple required class="form-control mb-2">
                                                <button type="submit" class="btn btn-success btn-sm">Unggah Dokumentasi</button>
                                            </form>
                                        @endif
                                        @if($order->dokumentasi)
                                            @php
                                                $images = json_decode($order->dokumentasi, true);
                                            @endphp
                                            @if($images)
                                                @foreach($images as $image)
                                                    <div class="d-flex mb-2">
                                                        <a href="{{ route('admin.order.viewImage', ['id' => $order->id_order, 'image' => $image]) }}" class="btn btn-info btn-sm me-2">Lihat {{ $image }}</a>
                                                        <a href="{{ route('admin.order.downloadImage', ['id' => $order->id_order, 'image' => $image]) }}" class="btn btn-warning btn-sm me-2">Unduh {{ $image }}</a>
                                                        <form method="POST" action="{{ route('admin.order.deleteImage', ['id' => $order->id_order, 'image' => $image]) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm">Hapus {{ $image }}</button>
                                                        </form>
                                                    </div>
                                                @endforeach
                                            @endif
                                        @endif
                                    </td>
                                    <td>
                                        @if($order->status == 'Check In')
                                            <form method="POST" action="{{ route('admin.order.checkout', ['id' => $order->id_order]) }}" class="mb-2">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-secondary btn-sm">Check Out</button>
                                            </form>
                                        @endif
                                        @if($order->status == 'Reservasi')
                                            <form method="POST" action="{{ route('admin.order.cancel', ['id' => $order->id_order]) }}" class="mb-2">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-danger btn-sm">Batal</button>
                                            </form>
                                            <a href="{{ route('admin.order.checkin', ['id' => $order->id_order]) }}" class="btn btn-primary btn-sm">Check In</a>
                                        @elseif($order->status == 'Dibatalkan')
                                            <form method="POST" action="{{ route('admin.order.delete', ['id' => $order->id_order]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
        @endsection
        
 </body>
</html>
