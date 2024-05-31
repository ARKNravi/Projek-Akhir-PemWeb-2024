@extends('template.index')

@section('content')
<div class="container mt-4">
    <a href="/paket" class="btn btn-secondary mb-4">Kembali</a>
    <h1 class="mb-4">Edit Paket</h1>
    <form method="POST" action="/paket/edit" class="needs-validation" novalidate>
        @csrf
        <input type="hidden" name="id_paket" id="id_paket" value="{{ $paket->id_paket }}">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Paket</label>
            <input type="text" id="nama" name="nama" class="form-control" required value="{{ $paket->nama }}">
        </div>
        <div class="mb-3">
            <label for="id_ruangan" class="form-label">Ruangan</label>
            <select name="id_ruangan" id="id_ruangan" class="form-control">
                @foreach ($ruangan as $rng)
                    <option value="{{ $rng->id_ruangan }}" {{ $paket->id_ruangan == $rng->id_ruangan ? 'selected' : '' }}>{{ $rng->nama_ruangan }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_makanan" class="form-label">Makanan</label>
            <div id="menuItems">
                @foreach ($makanan as $mkn)
                    <div class="input-group mb-3">
                        <select name="id_makanan[]" class="form-control">
                            <option value="{{ $mkn->id_makanan }}" {{ in_array($mkn->id_makanan, (array)$paket->id_makanan) ? 'selected' : '' }}>
                                {{ $mkn->menu_makanan }}
                            </option>
                        </select>
                        <button type="button" class="btn btn-danger" onclick="removeMenuItem(this)">Remove</button>
                    </div>
                @endforeach
            </div>
            <button type="button" class="btn btn-success" onclick="addMenuItem()">Add Menu Item</button>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
</div>
<script>
    function addMenuItem() {
        const menuItem = `
            <div class="input-group mb-3">
                <select name="id_makanan[]" class="form-control">
                    @foreach ($allMakanan as $mkn)
                        <option value="{{ $mkn->id_makanan }}">{{ $mkn->menu_makanan }}</option>
                    @endforeach
                </select>
                <button type="button" class="btn btn-danger" onclick="removeMenuItem(this)">Remove</button>
            </div>
        `;
        document.getElementById('menuItems').insertAdjacentHTML('beforeend', menuItem);
    }

    function removeMenuItem(button) {
        button.closest('.input-group').remove();
    }
</script>


@endsection
