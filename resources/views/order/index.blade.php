@extends('template.index')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Pesanan</title>
    <style>
        .thumbnail {
            max-width: 100px;
            max-height: 100px;
        }
        .thumbnail img {
            width: 100%;
            height: auto;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">
    @section('content')
    <div class="content p-3">
        <h1>Order Management</h1>
        <div id="sessions">
            @foreach($sessions->groupBy('session_date') as $date => $dateSessions)
                <div>
                    <h2>{{ $tanggal }}</h2>
                    @foreach($dateSessions as $session)
                        <a href="{{ route('orders.create', $session->id) }}" class="session-box">
                            {{ $session->start_time }} - {{ $session->end_time }}
                            @foreach($session->orders as $order)
                                <div>{{ $order->customer_name }}</div>
                            @endforeach
                        </a>
                    @endforeach
                </div>
            @endforeach
        </div>
        <a href="{{ route('orders.create') }}" class="btn btn-primary">Create New Order</a>
    
    </div>
    @endsection
</body>
</html>
