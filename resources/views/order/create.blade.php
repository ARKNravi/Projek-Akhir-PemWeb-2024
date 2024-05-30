<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Order</title>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dateInput = document.getElementById('tanggal');
            const paketSelect = document.getElementById('id_paket');
            const sessionSelect = document.getElementById('id_session');

            dateInput.addEventListener('change', function() {
                fetchAvailableSessions();
            });

            paketSelect.addEventListener('change', function() {
                fetchAvailableSessions();
            });

            function fetchAvailableSessions() {
                const date = dateInput.value;
                const paketId = paketSelect.value;

                if (date && paketId) {
                    fetch(`/admin/orders/available-sessions?date=${date}&paket_id=${paketId}`)
                        .then(response => response.json())
                        .then(data => {
                            sessionSelect.innerHTML = '';
                            data.forEach(session => {
                                const option = document.createElement('option');
                                option.value = session.id;
                                option.text = `${session.start} - ${session.end}`;
                                sessionSelect.appendChild(option);
                            });
                        });
                }
            }
        });
    </script>
</head>
<body class="d-flex flex-column min-vh-100">
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
                <label for="nama_perusahaan" class="form-label">Nama Perusahaan:</label>
                <input type="text" id="nama_perusahaan" name="nama_perusahaan" class="form-control" required>
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
                    <!-- Options will be populated by JavaScript -->
                </select>
            </div>
            <input type="hidden" id="id_payment" name="id_payment" value="1">
            <input type="hidden" id="status" name="status" value="Reservasi">
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
    <footer class="mt-auto bg-dark text-white text-center py-3">
        &copy; 2024 Your Company
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
