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
             border: 1px;
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
             <tr class="no-break">
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
 
 
