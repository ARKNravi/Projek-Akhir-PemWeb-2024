<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        nav, aside {
            background-color: rgb(58, 18, 18);
            color: white;
        }
        .content {
            flex-grow: 1;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-lg navbar-dark p-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Docs</a>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link">Log Out</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="d-flex flex-row flex-grow-1">
        <aside class="p-3">
            <ul class="nav flex-column gap-3">
                <li class="nav-item"><a class="nav-link text-white" href="/profile">Profile</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="/admin/dashboard">Dashboard</a></li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/packets">Packets</a>
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item"><a class="nav-link text-white" href="/fasilitas">Fasilitas</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="/admin/ruangan">Ruangan</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="/layout">Layout</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="/kamar">Kamar</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="/makanan">Makanan</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link text-white" href="/admin/orders">Order</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="/admin/history">History</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="/admin/income">Income</a></li>
            </ul>
        </aside>
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
    <footer class="mt-auto bg-dark text-white text-center py-3">
        &copy; 2024 Your Company
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+HXt0CA5tD7zV84/Q7H8bo1ltjHQ2" crossorigin="anonymous"></script>
</body>
</html>
