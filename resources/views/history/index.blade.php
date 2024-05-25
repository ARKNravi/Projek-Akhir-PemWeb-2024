@extends('template.index')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Sejarah Pemesanan</h1>

        @if ($orders->count() > 0)
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No. Pesanan</th>
                                <th>Nama Pemesan</th>
                                <th>No. HP Pemesan</th>
                                <th>Tanggal Pesanan</th>
                                <th>Paket</th>
                                <th>Sesi</th>
                                <th>Ruangan</th>
                                <th>Metode Pembayaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->id_order }}</td>
                                    <td>{{ $order->pemesan->nama }}</td>
                                    <td>{{ $order->pemesan->nomor_telepon }}</td>
                                    <td>{{ $order->tanggal }}</td>
                                    <td>{{ $order->paket->nama }}</td>
                                    <td>{{ $order->session->waktu_mulai }} - {{ $order->session->waktu_selesai }}</td>
                                    <td>{{ $order->paket->fasilitas->ruangan->nama_ruangan }}</td>
                                    <td>{{ $order->payment->metode_pembayaran }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <div class="alert alert-info">Gagal menampilkan sejarah pemesanan</div>
        @endif
    </div>
@endsection
