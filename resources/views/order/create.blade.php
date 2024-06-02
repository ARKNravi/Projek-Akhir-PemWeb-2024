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
            const ruanganSelect = document.getElementById('id_ruangan');
            const paymentOptions = document.querySelectorAll('input[name="payment_option"]');
            const dpDetails = document.getElementById('dp_details');
            const dpAmountInput = document.getElementById('nominal_pembayaran');

            paketSelect.addEventListener('change', updateDPAmount);
            paymentOptions.forEach(option => {
                option.addEventListener('change', () => {
                    if (option.value === 'dp') {
                        dpDetails.style.display = 'block';
                        updateDPAmount();
                    } else {
                        dpDetails.style.display = 'none';
                    }
                });
            });

            function updateDPAmount() {
                const selectedPaket = paketSelect.value;
                const paketPrice = paketSelect.options[paketSelect.selectedIndex].dataset.price;
                if (selectedPaket && paketPrice) {
                    dpAmountInput.value = (paketPrice * 0.1).toFixed(2);
                } else {
                    dpAmountInput.value = '';
                }
            }
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
                <select name="tipe" id="tipe" class="form-select">
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
                        <option value="{{ $paket->id_paket }}" data-price="{{ $paket->harga_total }}">{{ $paket->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="id_ruangan" class="form-label">Ruangan:</label>
                <select id="id_ruangan" name="id_ruangan" class="form-select" required>
                    @foreach ($ruangans as $ruangan)
                        <option value="{{ $ruangan->id_ruangan }}">{{ $ruangan->nama_ruangan }}</option>
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
                <label class="form-label">Payment Option:</label>
                <div>
                    <input type="radio" id="no_dp" name="payment_option" value="no_dp" class="form-check-input" checked>
                    <label for="no_dp" class="form-check-label">No DP</label>
                </div>
                <div>
                    <input type="radio" id="dp" name="payment_option" value="dp" class="form-check-input">
                    <label for="dp" class="form-check-label">DP</label>
                </div>
            </div>
            <div id="dp_details" style="display: none;">
                <div class="mb-3">
                    <label for="nominal_pembayaran" class="form-label">Nominal Pembayaran DP:</label>
                    <input type="number" id="nominal_pembayaran" name="nominal_pembayaran" class="form-control" readonly>
                </div>
                <div class="mb-3">
                    <label for="metode_pembayaran" class="form-label">Metode Pembayaran:</label>
                    <select id="metode_pembayaran" name="metode_pembayaran" class="form-select">
                        <option value="QRIS">QRIS</option>
                        <option value="DEBIT">DEBIT</option>
                        <option value="CREDIT CARD">CREDIT CARD</option>
                        <option value="CASH">CASH</option>
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>
