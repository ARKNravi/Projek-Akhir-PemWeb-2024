@extends('template.index')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Pesanan</title>
    <style>
        .session-box {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 5px;
            cursor: pointer;
            display: inline-block;
        }
   
    </style>
</head>
<body class="d-flex flex-column min-vh-100">
    @section('content')
    <h1>Order Management</h1>
    <div id="sessions">
        @foreach($sevenDays as $date => $dateSessions)
            <div>
                <h2>{{ $date }}</h2>
                @foreach($dateSessions as $session)
                    <a href="" class="session-box">
                        {{ $session->waktu_mulai }} - {{ $session->waktu_selesai }}
                        @foreach($session->orders as $order)
                            <div>{{ $order->customer_name }}</div>
                        @endforeach
                    </a>
                @endforeach
            </div>
        @endforeach
    </div>
    <a href="" class="btn btn-primary">Create New Order</a>
    @endsection
</body>
</html>
