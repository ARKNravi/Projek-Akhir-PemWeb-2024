@extends('template.index')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="mb-0">Laporan Pemasukan</h1>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID Pesanan</th>
                                <th>Paket</th>
                                <th>Fasilitas</th>
                                <th>Pemesan</th>
                                <th>Admin</th>
                                <th>Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->id_order }}</td>
                                <td>
                                    <strong>{{ $order->paket->nama }}</strong>
                                    <br>
                                    Harga: {{ number_format($order->paket->harga_total, 2) }}
                                </td>
                                <td>
                                    @if($order->paket->fasilitas->ruangan)
                                    <strong>Ruangan:</strong> {{ $order->paket->fasilitas->ruangan->nama_ruangan }}<br>
                                    @endif

                                    @if($order->paket->fasilitas->kamar)
                                    <strong>Kamar:</strong> {{ $order->paket->fasilitas->kamar->tipe }} ({{ $order->paket->fasilitas->kamar->harga }})<br>
                                    @endif

                                    @if($order->paket->fasilitas->makanan)
                                    <strong>Makanan:</strong> {{ $order->paket->fasilitas->makanan->nama_makanan }} ({{ $order->paket->fasilitas->makanan->harga_makanan }})<br>
                                    @endif
                                </td>
                                <td>{{ $order->pemesan->nama }}</td>
                                <td>{{ $order->admin->username }}</td>
                                <td>
                                    {{ number_format($order->paket->harga_total + ($order->payment->nominal_pembayaran ?? 0), 2) }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Total Pendapatan</h3>
                </div>
                <div class="card-body">
                    <h4>{{ number_format($totalPendapatan, 2) }}</h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
