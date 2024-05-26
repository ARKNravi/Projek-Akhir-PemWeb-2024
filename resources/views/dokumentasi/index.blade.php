@extends('template.index')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokumentasi Penggunaan</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #1b1b1b;
            color: white;
        }
        .section {
            padding-top: 60px;
            padding-bottom: 60px;
        }
        a {
            color: #f66d9b;
        }
        a:hover {
            color: #f22b6d;
        }
        .list-unstyled a {
            color: #000000; /* Atau warna yang Anda inginkan */
            text-decoration: none;
        }
        .list-unstyled a:hover {
            color: #0056b3; /* Warna hover */
        }
        .list-unstyled {
            background-color: transparent; /* Pastikan latar belakang transparan */
        }
        .list-unstyled li {
            background-color: transparent; /* Pastikan latar belakang transparan */
        }
        .ul-unstyled {
            background-color: transparent;
        }
    </style>
</head>
<body>
@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Outline Fitur</h1>
    <ul class="list-unstyled">
        <li><a href="#crud">1. CRUD</a>
            <ul class="ul-unstyled">
                <li><a href="#create">Create</a></li>
                <li><a href="#read">Read</a></li>
                <li><a href="#update">Update</a></li>
                <li><a href="#delete">Delete</a></li>
            </ul>
        </li>
        <li><a href="#sorting">2. Sorting</a></li>
        <li><a href="#searching">3. Searching</a></li>
        <li><a href="#rekap">4. Rekap</a></li>
        <li><a href="#history">5. History</a></li>
    </ul>
</div>

<div id="crud" class="section container">
    <h2>CRUD</h2>
    <p>Content for CRUD.</p>
</div>

<div id="create" class="section container">
    <h3>Create</h3>
    <p>Content for Create.</p>
</div>

<div id="read" class="section container">
    <h3>Read</h3>
    <p>Content for Read.</p>
</div>

<div id="update" class="section container">
    <h3>Update</h3>
    <p>Content for Update.</p>
</div>

<div id="delete" class="section container">
    <h3>Delete</h3>
    <p>Content for Delete.</p>
</div>

<div id="sorting" class="section container">
    <h2>Sorting</h2>
    <p>Content for Sorting.</p>
</div>

<div id="searching" class="section container">
    <h2>Searching</h2>
    <p>Content for Searching.</p>
</div>

<div id="rekap" class="section container">
    <h2>Rekap</h2>
    <p>Content for Rekap.</p>
</div>

<div id="history" class="section container">
    <h2>History</h2>
    <p>Content for History.</p>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    // Smooth scrolling for internal links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
</script>
@endsection
</body>
</html>

