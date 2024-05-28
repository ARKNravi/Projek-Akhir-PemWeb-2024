@extends('template.index')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4 text-center">Sejarah Pemesanan</h1>

        @if ($orders->count() > 0)
            <div class="card shadow-lg rounded-lg">
                <div class="card-header bg-primary text-white rounded-top">
                    <h3 class="card-title mb-0">Daftar Pesanan</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered rounded">
                            <thead class="thead-dark">
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
            </div>
        @else
            <div class="alert alert-info text-center">Gagal menampilkan sejarah pemesanan</div>
        @endif
    </div>

    <style>
        .card {
            border-radius: 0.75rem; /* Custom larger rounded corners */
        }

        .table {
            border-radius: 0.75rem; /* Custom larger rounded corners */
            overflow: hidden; /* Ensures rounded corners apply to the table */
        }

        .table th,
        .table td {
            vertical-align: middle; /* Center-aligns text vertically for better readability */
        }
    </style>
@endsection
