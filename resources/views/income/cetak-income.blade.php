{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Income</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
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
</body>
</html>
 --}}


 <!DOCTYPE html>
<html>
<head>
    <title>Laporan Pemasukan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .total-pendapatan {
            font-size: 1.2em;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Laporan Pemasukan</h1>
    <table>
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
                    <strong>{{ $order->paket->nama }}</strong><br>
                    Harga: {{ number_format($order->paket->harga_total, 2) }}
                </td>
                <td>
                    @if($order->paket->fasilitas->ruangan)
                        <strong>Ruangan:</strong> {{ $order->paket->fasilitas->ruangan->nama_ruangan }}<br>
                    @endif
                    @if($order->paket->fasilitas->kamar)
                        <strong>Kamar:</strong> {{ $order->paket->fasilitas->kamar->tipe }} ({{ number_format($order->paket->fasilitas->kamar->harga, 2) }})<br>
                    @endif
                    @if($order->paket->fasilitas->makanan)
                        <strong>Makanan:</strong> {{ $order->paket->fasilitas->makanan->nama_makanan }} ({{ number_format($order->paket->fasilitas->makanan->harga_makanan, 2) }})<br>
                    @endif
                </td>
                <td>{{ $order->pemesan->nama }}</td>
                <td>{{ $order->admin->username }}</td>
                <td>{{ number_format($order->paket->harga_total + ($order->payment->nominal_pembayaran ?? 0), 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="total-pendapatan">
        Total Pendapatan: {{ number_format($totalPendapatan, 2) }}
    </div>
</body>
</html>
