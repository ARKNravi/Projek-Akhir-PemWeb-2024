<!DOCTYPE html>
<html>
<head>
    <title>Ubah Detail Ruangan</title>
</head>
<body>
    <h1>Ubah Detail Ruangan</h1>
    <form method="POST" action="{{ route('admin.ruangan.update', $ruangan->id_ruangan) }}">
        @csrf
        @method('PUT')
        <label for="nama_ruangan">Nama Ruangan:</label><br>
        <input type="text" id="nama_ruangan" name="nama_ruangan" value="{{ $ruangan->nama_ruangan }}"><br>
        <label for="luas_ruangan">Kapasitas Ruangan:</label><br>
        <input type="number" id="luas_ruangan" name="luas_ruangan" value="{{ $ruangan->luas_ruangan }}"><br>
        <label for="harga">Harga:</label><br>
        <input type="number" id="harga" name="harga" value="{{ $ruangan->harga }}"><br>
        <label for="status">Status:</label><br>
        <input type="text" id="backdrop" name="backdrop" value="{{ $ruangan->backdrop }}"><br>
        <input type="submit" value="Simpan">
    </form>
</body>
</html>
