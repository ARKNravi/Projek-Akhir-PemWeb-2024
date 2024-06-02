@extends('template.index')

@section('content')
<div class="container mt-4">
    <div class="row mb-4">
        <div class="col-md-12">
            <form action="{{ route('income.index') }}" method="GET" class="form-inline mb-4">
                <div class="form-group mr-2">
                    <label for="filter" class="mr-2">Filter:</label>
                    <select name="filter" id="filter" class="form-control" onchange="toggleMonthYearFields()">
                        <option value="all" {{ request('filter') == 'all' ? 'selected' : '' }}>Keseluruhan</option>
                        <option value="monthly" {{ request('filter') == 'monthly' ? 'selected' : '' }}>Per Bulan</option>
                        <option value="yearly" {{ request('filter') == 'yearly' ? 'selected' : '' }}>Per Tahun</option>
                    </select>
                </div>
                <div class="form-group mr-2" id="monthField" style="display: none;">
                    <label for="month" class="mr-2">Bulan:</label>
                    <select name="month" id="month" class="form-control">
                        @foreach ([
                            '01' => 'Januari', '02' => 'Februari', '03' => 'Maret',
                            '04' => 'April', '05' => 'Mei', '06' => 'Juni',
                            '07' => 'Juli', '08' => 'Agustus', '09' => 'September',
                            '10' => 'Oktober', '11' => 'November', '12' => 'Desember'
                        ] as $num => $name)
                            <option value="{{ $num }}" {{ request('month') == $num ? 'selected' : '' }}>
                                {{ $name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mr-2" id="yearField" style="display: none;">
                    <label for="year" class="mr-2">Tahun:</label>
                    <select name="year" id="year" class="form-control">
                        @for ($i = now()->year; $i >= 2000; $i--)
                            <option value="{{ $i }}" {{ request('year') == $i ? 'selected' : '' }}>
                                {{ $i }}
                            </option>
                        @endfor
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Terapkan</button>
            </form>

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h1 class="mb-0">Laporan Pemasukan</h1>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>ID Pesanan</th>
                                <th>Paket</th>
                                <th>Ruangan</th>
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

                    <!-- Pagination Links -->
                    <div class="pagination m-3 mt-5">
                        Halaman : {{ $orders->currentPage() }} <br/>
                        Jumlah data : {{ $orders->total() }} <br/>
                        Data per halaman : {{ $orders->perPage() }}<br/>
                    </div>
                    <div class="pagination">
                        {{ $orders->appends(request()->except('page'))->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    <h3 class="card-title">Total Pendapatan</h3>
                </div>
                <div class="card-body">
                    <h4>{{ number_format($totalPendapatan, 2) }}</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <a href="{{ route('income.cetak', ['filter' => request('filter'), 'month' => request('month'), 'year' => request('year')]) }}" class="btn btn-primary float-left">Cetak Laporan</a>
        </div>
    </div>
</div>

<script>
    function toggleMonthYearFields() {
        const filter = document.getElementById('filter').value;
        document.getElementById('monthField').style.display = filter === 'monthly' ? 'block' : 'none';
        document.getElementById('yearField').style.display = (filter === 'monthly' || filter === 'yearly') ? 'block' : 'none';
    }

    document.addEventListener('DOMContentLoaded', function() {
        toggleMonthYearFields(); // Initial call to set the correct state on page load
    });
</script>
@endsection


