@extends('template.index')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Check In Ruangan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
    </style>
</head>
<body class="d-flex flex-column min-vh-100">
    @section('content')
    <div class="content p-3">
        <h1>Check In Ruangan</h1>
        <form method="POST" action="{{ route('admin.order.processCheckin', ['id' => $order->id_order]) }}" class="needs-validation" novalidate>
            @csrf
            <div class="mb-3">
                <label for="nominal_pembayaran" class="form-label">Nominal Pembayaran:</label>
                <input type="text" id="nominal_pembayaran" name="nominal_pembayaran" class="form-control" value="{{ $order->paket->harga_total }}" readonly required>
            </div>
            <div class="mb-3">
                <label for="metode_pembayaran" class="form-label">Metode Pembayaran:</label>
                <select id="metode_pembayaran" name="metode_pembayaran" class="form-select" required>
                    <option value="Cash">Cash</option>
                    <option value="Credit Card">Credit Card</option>
                    <option value="Debit">Debit</option>
                    <option value="QRIS">QRIS</option>
                    <!-- Add more payment methods as needed -->
                </select>
            </div>
            <input type="hidden" name="id_payment" value="{{ $order->id_payment }}">
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>   
    @endsection
</body>
</html>
