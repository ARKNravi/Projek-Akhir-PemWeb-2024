@extends('template.index')
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    @section('content')
    <div class="container mt-5">
        <div class="header mb-5">
            <h1>Dashboard</h1>
            <h2>Businessy Analytics</h2>
        </div>
        <hr>
        <h3>Orders</h3>
        <div class="order d-flex flex-row flex-wrap align-items-start justify-content-start gap-5 mt-3">
            <div class="p-3 border shadow">
                <h2>Today's Order</h2>
                <h3>{{$todayOrders}}</h3>
            </div>

            <div class="p-3 border shadow">
                <h2>This Month Orders</h2>
                <h3>{{$thisMonthOrders}}</h3>
            </div>

            <div class="p-3 border shadow">
                <h2>This Year Orders</h2>
                <h3>{{$thisYearOrders}}</h3>
            </div>

            <div class="px-lg-5 py-3 border shadow">
                <h2>Total Order</h2>
                <h3>{{$totalOrders}}</h3>
                <a href="/admin/orders" class="btn btn-info">More</a>
            </div>
        </div>
        <h3 class="my-3">Utilities</h3>
        <div class="utilities d-flex flex-row flex-wrap align-items-start justify-content-start gap-5 mt-3">

            <div class="px-lg-5 py-3 border shadow">
                <h2>Jumlah Paket</h2>
                <h3 class="mb-3">{{$totalPaket}}</h3>
                <a href="/paket" class="btn btn-info">More</a>
            </div>

            <div class="px-lg-5 py-3 border shadow">
                <h2>Jumlah Fasilitas</h2>
                <h3 class="mb-3">{{$totalFasilitas}}</h3>
                <a href="/fasilitas"  class="btn btn-info">More</a>
            </div>

            <div class="px-lg-5 py-3 border shadow">
                <h2>Jumlah Ruangan</h2>
                <h3 class="mb-3">{{$totalRuangan}}</h3>
                <a href="/admin/ruangan" class="btn btn-info">More</a>
            </div>

            <div class="px-lg-5 py-3 border shadow">
                <h2>Jumlah Kamar</h2>
                <h3 class="mb-3">{{$totalKamar}}</h3>
                <a href="/kamar" class="btn btn-info">More</a>
            </div>

            <div class="px-lg-5 py-3 border shadow">
                <h2>Jumlah Kategori Makanan</h2>
                <h3 class="mb-3">{{$totalMakanan}}</h3>
                <a href="/makanan" class="btn btn-info">More</a>
            </div>

            <div class="px-lg-5 py-3 border shadow">
                <h2>Jumlah Layout Ruangan</h2>
                <h3 class="mb-3">{{$totalLayout}}</h3>
                <a href="/layout" class="btn btn-info">More</a>
            </div>
        </div>

    </div>

    @endsection
</body>
</html>
