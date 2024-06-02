<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        nav, aside {
            background-color: rgb(58, 18, 18);
            color: white;
        }
        .content {
            flex-grow: 1;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="content p-3">
        <h1>Edit Order Session</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('admin.order.update', $order->id_order) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <h2>Order Details</h2>
            </div>
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal:</label>
                <input type="date" id="tanggal" name="tanggal" class="form-control" value="{{ $order->tanggal }}" required>
            </div>
            <div class="mb-3">
                <label for="id_paket" class="form-label">Paket:</label>
                <select id="id_paket" name="id_paket" class="form-select" required>
                    @foreach ($pakets as $paket)
                        <option value="{{ $paket->id_paket }}" {{ $paket->id_paket == $order->id_paket ? 'selected' : '' }}>{{ $paket->nama }}</option>
                    @endforeach
                </select>
            </div>
            @if ($order->ruangan && $order->ruangan->session)
                <div class="mb-3">
                    <label for="waktu_mulai" class="form-label">Waktu Mulai:</label>
                    <input type="time" id="waktu_mulai" name="waktu_mulai" class="form-control" value="{{ $order->ruangan->session->waktu_mulai->format('H:i') }}" required>
                </div>
                <div class="mb-3">
                    <label for="waktu_selesai" class="form-label">Waktu Selesai:</label>
                    <input type="time" id="waktu_selesai" name="waktu_selesai" class="form-control" value="{{ $order->ruangan->session->waktu_selesai->format('H:i') }}" required>
                </div>
            @else
                <div class="mb-3">
                    <label for="waktu_mulai" class="form-label">Waktu Mulai:</label>
                    <input type="time" id="waktu_mulai" name="waktu_mulai" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="waktu_selesai" class="form-label">Waktu Selesai:</label>
                    <input type="time" id="waktu_selesai" name="waktu_selesai" class="form-control" required>
                </div>
            @endif
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
    <footer class="mt-auto bg-dark text-white text-center py-3">
        &copy; 2024 Your Company
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
