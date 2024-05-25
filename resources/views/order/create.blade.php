<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
    <nav class="navbar navbar-expand-lg navbar-dark p-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Docs</a>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link">Log Out</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="d-flex flex-row flex-grow-1">
        <aside class="p-3">
            <ul class="nav flex-column gap-3">
                <li class="nav-item"><a class="nav-link text-white" href="/profile">Profile</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="/admin/dashboard">Dashboard</a></li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/packets">Packets</a>
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item"><a class="nav-link text-white" href="/fasilitas">Fasilitas</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="/admin/ruangan">Ruangan</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="/layout">Layout</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="/kamar">Kamar</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="/makanan">Makanan</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link text-white" href="/admin/orders">Order</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="/history">History</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="/income">Income</a></li>
            </ul>
        </aside>
        <div class="content p-3">
            <h1>Create Order</h1>
            <form action="{{ route('admin.order.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <h2>Pemesan Details</h2>
                </div>
                <div class="mb-3">
                    <label for="nik" class="form-label">NIK:</label>
                    <input type="text" id="nik" name="nik" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama:</label>
                    <input type="text" id="nama" name="nama" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="nomor_telepon" class="form-label">Nomor Telepon:</label>
                    <input type="text" id="nomor_telepon" name="nomor_telepon" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="tipe" class="form-label">Tipe:</label>
                    <input type="text" id="tipe" name="tipe" class="form-control" required>
                </div>
                <div class="mb-3">
                    <h2>Order Details</h2>
                </div>
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal:</label>
                    <input type="date" id="tanggal" name="tanggal" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="id_paket" class="form-label">Paket:</label>
                    <select id="id_paket" name="id_paket" class="form-select" required>
                        @foreach ($pakets as $paket)
                            <option value="{{ $paket->id_paket }}">{{ $paket->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="id_session" class="form-label">Session:</label>
                    <select id="id_session" name="id_session" class="form-select" required>
                        @foreach ($sessions as $session)
                            <option value="{{ $session->id_session }}">{{ $session->waktu_mulai }} - {{ $session->waktu_selesai }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="hidden" id="id_payment" name="id_payment" value="4">
                <input type="hidden" id="status" name="status" value="Reservasi">
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
    <footer class="mt-auto bg-dark text-white text-center py-3">
        &copy; 2024 Your Company
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+HXt0CA5tD7zV84/Q7H8bo1ltjHQ2" crossorigin="anonymous"></script>
</body>
</html>
