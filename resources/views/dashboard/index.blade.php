@extends('template.index')

@section('content')
<div class="container mt-5">
    <div class="header mb-5 text-center">
        <h1>Dashboard</h1>
        <h2>Business Analytics</h2>
    </div>
    <hr>
    <h3 class="my-4">Statistik</h3>
    <div class="d-flex flex-row flex-wrap align-items-start justify-content-between gap-3">
        <div class="graph flex-fill">

            <canvas id="orderChart"></canvas>
        </div>
        <div class="graph flex-fill">
            <canvas id="pemesanChart"></canvas>
        </div>
    </div>

    <h3 class="mb-4">Orders</h3>
    <div class="order d-flex flex-row flex-wrap align-items-start justify-content-start gap-3">
        <div class="card text-center p-3 border-0 shadow-sm">
            <div class="card-body">
                <h4 class="card-title">Today's Orders</h4>
                <h2 class="card-text text-primary">{{$todayOrders}}</h2>
            </div>
        </div>

        <div class="card text-center p-3 border-0 shadow-sm">
            <div class="card-body">
                <h4 class="card-title">This Month's Orders</h4>
                <h2 class="card-text text-primary">{{$thisMonthOrders}}</h2>
            </div>
        </div>

        <div class="card text-center p-3 border-0 shadow-sm">
            <div class="card-body">
                <h4 class="card-title">This Year's Orders</h4>
                <h2 class="card-text text-primary">{{$thisYearOrders}}</h2>
            </div>
        </div>

        <div class="card text-center p-3 border-0 shadow-sm">
            <div class="card-body">
                <h4 class="card-title">Total Orders</h4>
                <h2 class="card-text text-primary">{{$totalOrders}}</h2>
                <a href="/admin/orders" class="btn btn-info mt-3">More</a>
            </div>
        </div>
    </div>

    <h3 class="my-4">Utilities</h3>
    <div class="utilities d-flex flex-row flex-wrap align-items-start justify-content-start gap-3">
        <div class="card text-center p-3 border-0 shadow-sm">
            <div class="card-body">
                <h4 class="card-title">Jumlah Paket</h4>
                <h2 class="card-text text-primary mb-3">{{$totalPaket}}</h2>
                <a href="/paket" class="btn btn-info">More</a>
            </div>
        </div>

        <div class="card text-center p-3 border-0 shadow-sm">
            <div class="card-body">
                <h4 class="card-title">Jumlah Ruangan</h4>
                <h2 class="card-text text-primary mb-3">{{$totalRuangan}}</h2>
                <a href="/admin/ruangan" class="btn btn-info">More</a>
            </div>
        </div>

        <div class="card text-center p-3 border-0 shadow-sm">
            <div class="card-body">
                <h4 class="card-title">Jumlah Kategori Makanan</h4>
                <h2 class="card-text text-primary mb-3">{{$totalMakanan}}</h2>
                <a href="/makanan" class="btn btn-info">More</a>
            </div>
        </div>

        <div class="card text-center p-3 border-0 shadow-sm">
            <div class="card-body">
                <h4 class="card-title">Jumlah Layout Ruangan</h4>
                <h2 class="card-text text-primary mb-3">{{$totalLayout}}</h2>
                <a href="/layout" class="btn btn-info">More</a>
            </div>
        </div>
    </div>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Order Chart
    var ctxOrder = document.getElementById('orderChart').getContext('2d');
    var orderChart = new Chart(ctxOrder, {
        type: 'bar',
        data: {
            labels: @json($orderLabels),
            datasets: [{
                label: 'Order Statistics',
                data: @json($orderData), // Example: [12, 19, 3, 5, 2]
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            plugins: {
                title: {
                    display: true,
                    text: 'Statistik Pesanan'
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 10
                    }
                }
            }
        }
    });

    // Pemesan Chart
    var ctxPemesan = document.getElementById('pemesanChart').getContext('2d');
    var pemesanChart = new Chart(ctxPemesan, {
        type: 'pie', // or 'doughnut'
        data: {
            labels: @json($pemesanLabels), // Example: ['VIP', 'Regular']
            datasets: [{
                label: 'Pemesan Statistics',
                data: @json($pemesanData), // Example: [30, 70]
                backgroundColor: ['rgba(75, 192, 192, 0.2)', 'rgba(255, 159, 64, 0.2)'],
                borderColor: ['rgba(75, 192, 192, 1)', 'rgba(255, 159, 64, 1)'],
                borderWidth: 1
            }]
        },
        options: {
            plugins: {
                title: {
                    display: true,
                    text: 'Statistik Pemesan'
                }
            },
            responsive: true,
            maintainAspectRatio: false
        }
    });
});
</script>
@endsection
