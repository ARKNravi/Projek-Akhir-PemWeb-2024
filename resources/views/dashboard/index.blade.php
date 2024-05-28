@extends('template.index')

@section('content')
<div class="container mt-5">
    <div class="header mb-5 text-center">
        <h1>Dashboard</h1>
        <h2>Business Analytics</h2>
    </div>
    <hr>
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
                <h4 class="card-title">Jumlah Fasilitas</h4>
                <h2 class="card-text text-primary mb-3">{{$totalFasilitas}}</h2>
                <a href="/fasilitas" class="btn btn-info">More</a>
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
                <h4 class="card-title">Jumlah Kamar</h4>
                <h2 class="card-text text-primary mb-3">{{$totalKamar}}</h2>
                <a href="/kamar" class="btn btn-info">More</a>
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
@endsection