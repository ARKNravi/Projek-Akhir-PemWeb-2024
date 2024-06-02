@extends('template.index')

@section('content')
<div class="container mt-4">
    <a href="/paket" class="btn btn-secondary mb-4">Kembali</a>
    <h1 class="mb-4">Tambah Paket</h1>
    <form method="POST" action="/paket/tambah" class="needs-validation" novalidate>
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama paket</label>
            <input type="text" id="nama" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="id_makanan" class="form-label">Makanan</label>
            <div id="menuItems">
                <div class="input-group mb-3">
                    <select name="id_makanan[]" class="form-control">
                        @foreach ($makanan as $mkn)
                            <option value="{{$mkn->id_makanan}}">{{$mkn->menu_makanan}}</option>
                        @endforeach
                    </select>
                    <button type="button" class="btn btn-danger" onclick="removeMenuItem(this)">Remove</button>
                </div>
            </div>
            <button type="button" class="btn btn-success" onclick="addMenuItem()">Add Menu Item</button>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
</div>

<script>
    function addMenuItem() {
        const menuItem = `
            <div class="input-group mb-3">
                <select name="id_makanan[]" class="form-control">
                    @foreach ($makanan as $mkn)
                        <option value="{{$mkn->id_makanan}}">{{$mkn->menu_makanan}}</option>
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
