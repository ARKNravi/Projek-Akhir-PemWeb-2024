@extends('template.index')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Tambah Ruangan</h1>
    <form method="POST" action="{{ route('admin.ruangan.store') }}" class="needs-validation" novalidate>
        @csrf
        <div class="mb-3">
            <label for="nama_ruangan" class="form-label">Nama Ruangan:</label>
            <input type="text" id="nama_ruangan" name="nama_ruangan" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="luas_ruangan" class="form-label">Luas Ruangan:</label>
            <input type="number" id="luas_ruangan" name="luas_ruangan" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga:</label>
            <input type="number" id="harga" name="harga" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="backdrop" class="form-label">Backdrop:</label>
            <input type="text" id="backdrop" name="backdrop" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="id_layout" class="form-label">ID Layout:</label>
            @if($message)
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                <a href="/layout" class="btn btn-primary">Halaman layout</a>
            @else
<<<<<<< HEAD
            <select name="id_layout" id="id_layout">
            @foreach ($layout as $lyt)
            <option value="{{$lyt->id_layout}}">{{$lyt->nama_layout}}</option>
            @endforeach
            </select><br><br>
            <input type="submit" value="Tambah">
=======
                <select name="id_layout" id="id_layout" class="form-select">
                    @foreach ($layout as $lyt)
                        <option value="{{ $lyt->id_layout }}">{{ $lyt->nama_layout }}</option>
                    @endforeach
                </select>
>>>>>>> origin/main
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
</div>
@endsection
