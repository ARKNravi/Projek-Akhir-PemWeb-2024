@extends('template.index')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Tambah Paket</h1>
    <form method="POST" action="/paket/tambah" class="needs-validation" novalidate>
        @csrf
        <div class="mb-3">
            <label for="nama_paket" class="form-label">Nama paket</label>
            <input type="text" id="nama_paket" name="nama_paket" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="kapasitas" class="form-label">Kapasitas</label>
            <input type="number" id="kapasitas" name="kapasitas" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="lama_waktu peminjaman" class="form-label">Durasi peminjaman : </label>
            <input type="text" id="lama_waktu_peminjaman" name="lama_waktu peminjaman" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="Materials" class="form-label">Materials</label>
            <input type="text" id="materials" name="materials" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="id_ruangan">ID ruangan</label>
            <select name="id_ruangan" id="id_ruangan" class="form-select">
                @foreach ($ruangan as $rng)
                    <option value="{{$rng->id_ruangan}}">{{$rng->nama_ruangan}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_makanan">ID makanan</label>
            <select name="id_makanan" id="id_makanan" class="form-select">
                @foreach ($makanan as $mkn)
                    <option value="{{$mkn->id_makanan}}">{{$mkn->nama_makanan}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="nomor_kamar">Nomor kamar</label>
            <select name="nomor_kamar" id="nomor_kamar" class="form-select">
                @foreach ($kamar as $kmr)
                    <option value="{{$kmr->nomor_kamar}}">{{$kmr->nomor_kamar}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
</div>
@endsection