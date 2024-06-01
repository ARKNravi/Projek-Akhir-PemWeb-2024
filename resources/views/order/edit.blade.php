@extends('template.index')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
        });
    </script>
</head>
<body>
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Edit Order</h1>
            <a href="{{ route('admin.order') }}" class="btn btn-secondary">Back</a>
        </div>
        <form action="{{ route('admin.order.update', $order->id_order) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <h2>Pemesan Details</h2>
            </div>
            <div class="mb-3">
                <label for="nik" class="form-label">NIK:</label>
                <input type="text" id="nik" name="nik" class="form-control" value="{{ $order->pemesan->nik }}" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" id="nama" name="nama" class="form-control" value="{{ $order->pemesan->nama }}" required>
            </div>
            <div class="mb-3">
                <label for="nama_perusahaan" class="form-label">Nama Perusahaan:</label>
                <input type="text" id="nama_perusahaan" name="nama_perusahaan" class="form-control" value="{{ $order->pemesan->nama_perusahaan }}" required>
            </div>
            <div class="mb-3">
                <label for="nomor_telepon" class="form-label">Nomor Telepon:</label>
                <input type="text" id="nomor_telepon" name="nomor_telepon" class="form-control" value="{{ $order->pemesan->nomor_telepon }}" required>
            </div>
            <div class="mb-3">
                <label for="tipe" class="form-label">Tipe:</label>
                <input type="text" id="tipe" name="tipe" class="form-control" value="{{ $order->pemesan->tipe }}" required>
            </div>
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
            <div class="mb-3">
                <label for="id_session" class="form-label">Session:</label>
                <select id="id_session" name="id_session" class="form-select" required>
                    <option value="{{ $order->id_session }}" selected>{{ $order->session->waktu_mulai }} - {{ $order->session->waktu_selesai }}</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Payment:</label>
                <div class="form-check">
                    <input type="radio" id="no_dp" name="payment_option" value="no_dp" class="form-check-input" {{ $order->payment->nominal_pembayaran == 0 ? 'checked' : '' }}>
                    <label for="no_dp" class="form-check-label">No DP</label>
                </div>
                <div class="form-check">
                    <input type="radio" id="dp" name="payment_option" value="dp" class="form-check-input" {{ $order->payment->nominal_pembayaran > 0 ? 'checked' : '' }}>
                    <label for="dp" class="form-check-label">DP (10%)</label>
                </div>
            </div>
            <div id="dp_details" style="display:{{ $order->payment->nominal_pembayaran > 0 ? 'block' : 'none' }};">
                <div class="mb-3">
                    <label for="metode_pembayaran" class="form-label">Metode Pembayaran:</label>
                    <select id="metode_pembayaran" name="metode_pembayaran" class="form-select">
                        <option value="QRIS" {{ $order->payment->metode_pembayaran == 'QRIS' ? 'selected' : '' }}>QRIS</option>
                        <option value="Cash" {{ $order->payment->metode_pembayaran == 'Cash' ? 'selected' : '' }}>Cash</option>
                        <option value="Debit" {{ $order->payment->metode_pembayaran == 'Debit' ? 'selected' : '' }}>Debit</option>
                        <option value="Credit" {{ $order->payment->metode_pembayaran == 'Credit' ? 'selected' : '' }}>Credit</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="nominal_pembayaran" class="form-label">Nominal Pembayaran:</label>
                    <input type="number" id="nominal_pembayaran" name="nominal_pembayaran" class="form-control" value="{{ $order->payment->nominal_pembayaran }}" readonly>
                </div>
            </div>
            <input type="hidden" id="id_payment" name="id_payment" value="{{ $order->id_payment }}">
            <input type="hidden" id="status" name="status" value="{{ $order->status }}">
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
