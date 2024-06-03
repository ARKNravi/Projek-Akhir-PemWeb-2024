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
            width: 100px;
            height: 100px;
            margin: 5px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-decoration: none;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">
    @section('content')
    <div class="content p-3">
        <h1>Room Schedules</h1>
        @foreach($rooms as $room)
            <h3>{{ $room->nama_ruangan }}</h3>
            @for ($day = 0; $day < 7; $day++)
                @for ($hour = 8; $hour < 18; $hour++)
                    @php
                        $sessionTime = now()->startOfDay()->addDays($day)->addHours($hour);
                        $order = $room->orders->first(function($order) use ($sessionTime) {
                            return $order->session->waktu_mulai->equalTo($sessionTime);
                        });
                    @endphp
    
                    <div class="session-box {{ $order ? 'booked' : 'available' }}" onclick="location.href='{{ $order ? route('admin.order.edit', $order->id_order) : route('admin.order.create', ['room_id' => $room->id_ruangan, 'session_time' => $sessionTime]) }}'">
                        {{ $sessionTime->format('H:i') }}
                    </div>
                @endfor
            @endfor
        @endforeach

   
    </div>
    @endsection
</body>
</html>