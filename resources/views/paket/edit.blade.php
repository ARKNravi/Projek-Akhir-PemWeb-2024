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
            <label for="id_makanan" class="form-label">Makanan</label>
            <div id="menuItems">
                @foreach ($paket->id_makanan as $makananId)
                    @php
                        $makanan = App\Models\Makanan::find($makananId);
                    @endphp
                    @if ($makanan)
                        <div class="input-group mb-3">
                            <select name="id_makanan[]" class="form-control">
                                <option value="{{ $makanan->id_makanan }}" selected>{{ $makanan->menu_makanan }}</option>
                                @foreach ($allMakanan as $mkn)
                                    @if ($mkn->id_makanan != $makanan->id_makanan)
                                        <option value="{{ $mkn->id_makanan }}">{{ $mkn->menu_makanan }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <button type="button" class="btn btn-danger" onclick="removeMenuItem(this)">Remove</button>
                        </div>
                    @else
                        <div class="alert alert-warning">Makanan with ID {{ $makananId }} not found.</div>
                    @endif
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
