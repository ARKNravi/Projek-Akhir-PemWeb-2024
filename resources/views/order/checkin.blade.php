<!DOCTYPE html>
<html>
<head>
    <title>Check In Ruangan</title>
</head>
<body>
    <h1>Check In Ruangan</h1>
    <form method="POST" action="{{ route('admin.order.processCheckin', ['id' => $order->id_order]) }}">
        @csrf
        <div>
            <label for="nominal_pembayaran">Nominal Pembayaran:</label>
            <input type="text" id="nominal_pembayaran" name="nominal_pembayaran" required>
        </div>
        <div>
            <label for="metode_pembayaran">Metode Pembayaran:</label>
            <select id="metode_pembayaran" name="metode_pembayaran" required>
                <option value="Cash">Cash</option>
                <option value="Credit Card">Credit Card</option>
                <!-- Add more payment methods as needed -->
            </select>
        </div>
        <!-- Add a hidden input field for id_payment -->
        <input type="hidden" name="id_payment" value="{{ $order->id_payment }}">
        <button type="submit">Submit</button>
    </form>
</body>
</html>
