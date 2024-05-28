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
            padding-top: 0px;
            padding-bottom: 30px;
        }
        a {
            color: #f66d9b;
        }
        a:hover {
            color: #f22b6d;
        }
        .list-unstyled a {
            color: #000000;
            text-decoration: none;
        }
        .list-unstyled a:hover {
            color: #0056b3;
        }
        .list-unstyled {
            background-color: transparent;
        }
        .list-unstyled li {
            background-color: transparent;
        }
        .ul-unstyled {
            background-color: transparent;
        }
        .card {
            background-color: #2c2c2c;
            border: none;
            font-size: 20px;
        }
        .card-header {
            background-color: #333;
            color: #f66d9b;
        }
        .card-body {
            color: #ddd;
            font-size: 20px;
        }
        .card-body a {
            color: #000000;
            font-size: 20px;
        }
        .card-body a:hover {
            color: #4f5255;
        }
    </style>
</head>
<body>
@section('content')

<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header">
                    Outline Fitur
                </div>
                <div class="card-body">
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
            </div>
        </div>
        <div class="col-lg-9">
            <div id="crud" class="section">
                <div class="card">
                    <div class="card-header">
                        CRUD
                    </div>
                    <div class="card-body">
                        <p class="text-justify">CRUD adalah singkatan dari Create, Read, Update, dan Delete, yang merupakan operasi dasar yang diperlukan dalam aplikasi manajemen data. 
                        Pada Project Akhir ini kami menggunakan CRUD untuk memperbagus dalam pembuatan web. Sistem CRUD pada UB Guesthouse Banquet System 
                        berfungsi untuk mengelola data pemesanan banquet (acara) di UB Guesthouse.</p>
                    </div>
                </div>
            </div>

            <div id="create" class="section">
                <div class="card">
                    <div class="card-header">
                        Create
                    </div>
                    <div class="card-body">
                        <p class="text-justify">Create sendiri merupakan pengguna dapat menambahkan catatan atau entri baru ke database. Fungsi ini meliputi memasukkan data ke dalam 
                        database, membuat baris baru dalam tabel, dan menentukan nilai untuk atribut (kolom) dari baris itu. Operasi Create digunakan untuk 
                        menambahkan data baru ke dalam sistem. Dalam konteks UB Guesthouse Banquet System, ini berarti membuat pemesanan banquet baru.</p>
                    </div>
                </div>
            </div>

            <div id="read" class="section">
                <div class="card">
                    <div class="card-header">
                        Read
                    </div>
                    <div class="card-body">
                        <p class="text-justify">Read merupakan salah satu operasi dari CRUD untuk membantu pengguna untuk mengambil atau mengakses data yang ada dari database, 
                        seperti saat mencari catatan tertentu atau memperoleh semua catatan yang memenuhi kriteria tertentu. Operasi Read digunakan untuk 
                        membaca atau menampilkan data yang ada dalam sistem. Ini bisa berupa menampilkan daftar semua pemesanan banquet atau detail dari 
                        pemesanan tertentu.</p>
                    </div>
                </div>
            </div>

            <div id="update" class="section">
                <div class="card">
                    <div class="card-header">
                        Update
                    </div>
                    <div class="card-body">
                        <p class="text-justify">Update memungkinkan pengguna untuk mengubah atau mengedit data yang ada di database. Operasi Update digunakan untuk memperbarui data 
                        yang sudah ada dalam sistem. Dalam konteks UB Guesthouse Banquet System, ini berarti memperbarui informasi pemesanan banquet yang sudah ada.</p>
                    </div>
                </div>
            </div>

            <div id="delete" class="section">
                <div class="card">
                    <div class="card-header">
                        Delete
                    </div>
                    <div class="card-body">
                        <p class="text-justify">Fungsi Delete memberi akses ke pengguna untuk menghapus data yang tidak diinginkan dari database. Operasi Delete digunakan untuk 
                        menghapus data dari sistem. Dalam konteks UB Guesthouse Banquet System, ini berarti menghapus pemesanan banquet yang tidak 
                        diperlukan lagi. Sebagai contoh yaitu membatalkan pemesanan dengan cara menghapus pemesanan banquet dari sistem.</p>
                    </div>
                </div>
            </div>

            <div id="sorting" class="section">
                <div class="card">
                    <div class="card-header">
                        Sorting
                    </div>
                    <div class="card-body">
                        <p class="text-justify">Fitur sorting pada UB Guesthouse Banquet System berfungsi untuk mengatur urutan data pemesanan berdasarkan kriteria tertentu 
                        seperti tanggal acara, jenis acara, jumlah tamu, atau nama pemesan. Sorting membantu pengguna untuk menemukan dan menganalisis 
                        data dengan lebih mudah dan efisien. Berikut adalah cara implementasi dan penjelasan mengenai fitur sorting pada sistem ini.</p>
                    </div>
                </div>
            </div>

            <div id="searching" class="section">
                <div class="card">
                    <div class="card-header">
                        Searching
                    </div>
                    <div class="card-body">
                        <p class="text-justify">Fitur searching pada UB Guesthouse Banquet System memungkinkan pengguna untuk mencari data pemesanan berdasarkan berbagai 
                        kriteria seperti nama pemesan, tanggal acara, jenis acara, atau lainnya. Fitur ini sangat berguna untuk mempermudah pengguna 
                        dalam menemukan pemesanan tertentu dengan cepat</p>
                    </div>
                </div>
            </div>

            <div id="rekap" class="section">
                <div class="card">
                    <div class="card-header">
                        Rekap
                    </div>
                    <div class="card-body">
                        <p class="text-justify">Fitur rekap pada UB Guesthouse Banquet System berfungsi untuk menyajikan ringkasan data pemesanan yang berguna untuk analisis
                        dan pelaporan. Rekap ini dapat mencakup berbagai metrik seperti total pemesanan, pemesanan berdasarkan jenis acara, pemesanan 
                        per bulan, dan sebagainya. Fitur ini membantu manajemen dalam mengambil keputusan yang lebih baik berdasarkan data yang tersedia.</p>
                    </div>
                </div>
            </div>

            <div id="history" class="section">
                <div class="card">
                    <div class="card-header">
                        History
                    </div>
                    <div class="card-body">
                        <p class="text-justify">Fitur history pada UB Guesthouse Banquet System berfungsi untuk mencatat dan menampilkan riwayat perubahan dan aktivitas yang 
                        terjadi pada data pemesanan. Ini termasuk perubahan status pemesanan, pembaruan informasi, dan penghapusan pemesanan. Fitur 
                        ini penting untuk audit, pelacakan, dan referensi di masa depan.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
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