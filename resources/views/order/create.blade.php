<!DOCTYPE html>
<html>
<head>
    <title>Create Order</title>
</head>
<body>
    <form action="{{ route('admin.reservasi.store') }}" method="POST">
        @csrf

        <!-- Fields for creating a Pemesan -->
        <h2>Pemesan Details</h2>

        <label for="nik">NIK:</label>
        <input type="text" id="nik" name="nik">

        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama">

        <label for="nomor_telepon">Nomor Telepon:</label>
        <input type="text" id="nomor_telepon" name="nomor_telepon">

        <label for="tipe">Tipe:</label>
        <input type="text" id="tipe" name="tipe">

        <!-- Fields for creating an Order -->
        <h2>Order Details</h2>

        <label for="tanggal">Tanggal:</label>
        <input type="date" id="tanggal" name="tanggal">

        <label for="id_paket">Paket:</label>
        <select id="id_paket" name="id_paket">
            @foreach ($pakets as $paket)
                <option value="{{ $paket->id_paket }}">{{ $paket->nama }}</option>
            @endforeach
        </select>

        <label for="id_session">Session:</label>
        <select id="id_session" name="id_session">
            @foreach ($sessions as $session)
                <option value="{{ $session->id_session }}">{{ $session->waktu_mulai }} - {{ $session->waktu_selesai }}</option>
            @endforeach
        </select>

        <input type="hidden" id="id_payment" name="id_payment" value="4">

        <input type="hidden" id="status" name="status" value="Reservasi">

        <button type="submit">Save</button>
    </form>
</body>
</html>
