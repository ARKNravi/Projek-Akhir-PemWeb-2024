<!DOCTYPE html>
<html>
<head>
    <title>Laporan Pemasukan</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 18px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            table-layout: fixed;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 5px;
            text-align: left;
            vertical-align: top;
            box-sizing: border-box;
        }
        th {
            background-color: #f2f2f2;
        }
        .total-pendapatan {
            font-size: 14px;
            font-weight: bold;
            text-align: right;
            margin-top: 20px;
        }
        .no-break {
            page-break-inside: avoid;
        }
    </style>
</head>
<body>
    @php
        $bulan = [
            '01' => 'Januari', '02' => 'Februari', '03' => 'Maret',
            '04' => 'April', '05' => 'Mei', '06' => 'Juni',
            '07' => 'Juli', '08' => 'Agustus', '09' => 'September',
            '10' => 'Oktober', '11' => 'November', '12' => 'Desember'
        ];
    @endphp

    @if ($filter == 'all')
        <h1>Laporan Pemasukan Keseluruhan</h1>
    @elseif ($filter == 'monthly' && $month && $year)
        <h1>Laporan Pemasukan Bulan {{ $bulan[$month] }} {{ $year }}</h1>
    @elseif ($filter == 'yearly' && $year)
        <h1>Laporan Pemasukan Tahun {{ $year }}</h1>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID Pesanan</th>
                <th>Tanggal Pesanan</th>
                <th>Paket</th>
                <th>Ruangan</th>
                <th>Pemesan</th>
                <th>Admin</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr class="no-break">
                <td>{{ $order->id_order }}</td>
                <td>{{ $order->tanggal }}</td>
                <td>
                    <strong>{{ $order->paket->nama }}</strong><br>
                    Harga: {{ number_format($order->paket->harga_total, 2) }}
                </td>
                <td>
                    @if($order->ruangan)
                        <strong>Ruangan:</strong> {{ $order->ruangan->nama_ruangan }}<br>
                    @endif
                    @if($order->paket->makanan->isNotEmpty())
                        <strong>Makanan:</strong>
                        @foreach($order->paket->makanan as $makanan)
                            {{ $makanan->menu_makanan }} ({{ number_format($makanan->harga_makanan, 2) }})<br>
                        @endforeach
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
