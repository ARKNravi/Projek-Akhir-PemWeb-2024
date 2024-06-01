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
            <div class="mb-3">
                <label class="form-label">Payment:</label>
                <div class="form-check">
                    <input type="radio" id="no_dp" name="payment_option" value="no_dp" class="form-check-input" checked>
                    <label for="no_dp" class="form-check-label">No DP</label>
                </div>
                <div class="form-check">
                    <input type="radio" id="dp" name="payment_option" value="dp" class="form-check-input">
                    <label for="dp" class="form-check-label">DP (10%)</label>
                </div>
            </div>
            <div id="dp_details" style="display:none;">
                <div class="mb-3">
                    <label for="metode_pembayaran" class="form-label">Metode Pembayaran:</label>
                    <select id="metode_pembayaran" name="metode_pembayaran" class="form-select">
                        <option value="QRIS">QRIS</option>
                        <option value="Cash">Cash</option>
                        <option value="Debit">Debit</option>
                        <option value="Credit">Credit</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="nominal_pembayaran" class="form-label">Nominal Pembayaran:</label>
                    <input type="number" id="nominal_pembayaran" name="nominal_pembayaran" class="form-control" readonly>
                </div>
            </div>
            <input type="hidden" id="id_payment" name="id_payment" value="">
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
