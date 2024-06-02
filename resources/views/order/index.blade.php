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
        @foreach($rooms as $room)
            <h2>{{ $room->name }}</h2>
            @foreach($room->sessions->groupBy('tanggal') as $date => $dateSessions)
                <div>
                    <h3>{{ \Carbon\Carbon::parse($date)->translatedFormat('d F Y') }}</h3>
                    @foreach($dateSessions as $session)
                        <a href="" class="session-box ">
                            {{ $session->start_time }} - {{ $session->end_time }}
                            @foreach($session->orders as $order)
                                <div><p>Order</p></div>
                            @endforeach
                        </a>
                    @endforeach
                </div>
            @endforeach
        @endforeach
        <a href="">Create New Order</a>
    
    </div>
    @endsection
</body>
</html>
