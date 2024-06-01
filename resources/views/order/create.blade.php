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
            const paymentOptions = document.querySelectorAll('input[name="payment_option"]');
            const dpDetails = document.getElementById('dp_details');
            const dpAmountInput = document.getElementById('nominal_pembayaran');

            dateInput.addEventListener('change', function() {
                fetchAvailableSessions();
            });

            paketSelect.addEventListener('change', function() {
                fetchAvailableSessions();
                updateDpAmount();
            });

            paymentOptions.forEach(option => {
                option.addEventListener('change', function() {
                    if (this.value === 'dp') {
                        dpDetails.style.display = 'block';
                        updateDpAmount();
                    } else {
                        dpDetails.style.display = 'none';
                    }
                });
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

            function updateDpAmount() {
                const paketId = paketSelect.value;
                if (paketId) {
                    fetch(`/admin/orders/get-paket-price?paket_id=${paketId}`)
                        .then(response => response.json())
                        .then(data => {
                            const dpAmount = data.price * 0.1;
                            dpAmountInput.value = dpAmount.toFixed(2);
                        });
                }
            }

            updateDpAmount(); // Initial call to set the correct DP amount
        });
    </script>
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="content p-3">
        <h1>Create Order</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
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
                <label for="tipe" class="form-label" required>Tipe:</label>
                <select name="tipe" id="tipe">
                    <option value="internal">Internal</option>
                    <option value="eksternal">Eksternal</option>
                </select>
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
                <select id="id_paket" name="id_paket" class="form-control" required>
                    @foreach ($pakets as $paket)
                        <option value="{{ $paket->id_paket }}">{{ $paket->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="waktu_mulai" class="form-label">Waktu Mulai:</label>
                <input type="time" id="waktu_mulai" name="waktu_mulai" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="waktu_selesai" class="form-label">Waktu Selesai:</label>
                <input type="time" id="waktu_selesai" name="waktu_selesai" class="form-control" required>
            </div>
            <div class="mb-3">
                <h2>Payment Details</h2>
            </div>
            <div class="mb-3">
                <label class="form-label">Payment Option:</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment_option" id="payment_option_no_dp" value="no_dp" checked>
                    <label class="form-check-label" for="payment_option_no_dp">No DP</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment_option" id="payment_option_dp" value="dp">
                    <label class="form-check-label" for="payment_option_dp">DP</label>
                </div>
            </div>
            <div id="dp_details" class="mb-3" style="display: none;">
                <label for="nominal_pembayaran" class="form-label">Nominal Pembayaran DP:</label>
                <input type="text" id="nominal_pembayaran" name="nominal_pembayaran" class="form-control" readonly>
            </div>
            <div class="mb-3">
                <label for="metode_pembayaran" class="form-label">Metode Pembayaran:</label>
                <input type="text" id="metode_pembayaran" name="metode_pembayaran" class="form-control">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Create Order</button>
            </div>
        </form>
    </div>
</body>
</html>
