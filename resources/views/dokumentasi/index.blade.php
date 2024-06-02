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
                    Outline Dokumentasi
                </div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li><a href="#pendahuluan">1. Pendahuluan</a></li>
                        <li><a href="#profile">2. Profile</a></li>
                        <li><a href="#dashboard">3. Dashboard</a></li>
                        <li><a href="#orders">4. Orders</a></li>
                        <li><a href="#paket">5. Paket</a></li>
                        <li><a href="#ruangan">6. Ruangan</a></li>
                        <li><a href="#layout">7. Layout</a></li>
                        <li><a href="#makanan">8. Makanan</a></li>
                        <li><a href="#history">9. History</a></li>
                        <li><a href="#income">10. Income</a></li>
                        <li><a href="#logout">12. Logout</a></li>
                        <li><a href="#faq">11. Frequently Asked Questions (FAQ)</a></li>
                        
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-9">

            <div id="pendahuluan" class="section">
                <div class="card">
                    <div class="card-header">
                        Pendahuluan
                    </div>
                    <div class="card-body">
                        <p class="text-justify">
                            Selamat datang di dokumentasi penggunaan UB Guesthouse Banquet System. Sistem ini dirancang untuk memudahkan pengelolaan
                            pemesanan dan manajemen banquet di UB Guesthouse. Dalam dokumentasi ini, Anda akan menemukan penjelasan rinci tentang fitur-fitur
                            utama sistem dan bagaimana cara menggunakannya. Silakan gunakan menu di sebelah kiri untuk menavigasi ke bagian yang ingin Anda pelajari.
                        </p>
                    </div>
                </div>
            </div>

            <div id="profile" class="section">
                <div class="card">
                    <div class="card-header">
                        Profile
                    </div>
                    <div class="card-body">
                        <p class="text-justify">
                            Menu profile digunakan untuk menampilkan informasi dari admin berupa username dan password. 
                            Pada halaman profile, admin juga dapat mengganti username ataupun password.
                        </p>
                    </div>
                </div>
            </div>

            <div id="dashboard" class="section">
                <div class="card">
                    <div class="card-header">
                        Dashboard
                    </div>
                    <div class="card-body">
                        <p class="text-justify">
                            Menu dashboard digunakan untuk menampilkan summary atau overview berupa diagram statistik pesanan per bulan, 
                            dan statistik untuk memvisualisasikan distribusi dari pemesan. Terdapat juga card informasi yang berisi overview 
                            jumlah orders per hari, per bulan, per tahun, dan total keseluruhan order. Selain itu, terdapat overview jumlah paket 
                            yang tersedia, jumlah ruangan yang tersedia, jumlah kategori makanan, dan jumlah layout ruangan yang tersedia pada sistem kami. 
                            Untuk melihat detail informasi dari card, admin dapat menekan tombol more untuk beralih pada halaman informasi detail.
                        </p>
                    </div>
                </div>
            </div>

            <div id="orders" class="section">
                <div class="card">
                    <div class="card-header">
                        Orders
                    </div>
                    <div class="card-body">
                        <p class="text-justify">
                            Menu orders berisi tampilan tabel orders yang terdaftar pada sistem kami.
                            <ul>
                                <li><b>Perubahan Status Order:</b> Pada tabel tersebut, admin dapat melakukan perubahan status order mulai dari Batal Reservasi, CheckIn, hingga CheckOut. Untuk melakukan perubahan tersebut, admin dapat menekan tombol status yang terdapat pada kolom status. Setelah menekan tombol tersebut, admin akan dialihkan pada halaman detail untuk mengisi form tambahan yang diperlukan sesuai dengan status.</li>
                                <li><b>Menambah Order:</b> Untuk melakukan penambahan order, admin dapat menekan tombol tambah pesanan. Setelah menekan tombol tambah pesanan, admin akan dialihkan pada halaman yang berisi pengisian form untuk tambah pesanan. Setelah mengisi form tersebut, admin dapat menekan tombol Create Order, dan kemudian akan dialihkan kembali pada halaman Order dengan isi tabel Orders yang terbaru.</li>
                            </ul>
                        </p>
                    </div>
                </div>
            </div>

            <div id="paket" class="section">
                <div class="card">
                    <div class="card-header">
                        Paket
                    </div>
                    <div class="card-body">
                        <p class="text-justify">
                            Menu Paket berisi list paket yang terdapat pada sistem kami. Pada halaman ini, admin juga dapat melakukan beberapa operasi:
                            <ul>
                                <li><b>Cari Paket:</b> Untuk mencari paket yang diinginkan, admin dapat mengisi text field yang terdapat pada bagian search kemudian menekan tombol Search. Setelah itu, tampilan tabel akan diperbarui sesuai dengan paket yang dicari.</li>
                                <li><b>Pengurutan Paket:</b> Admin juga dapat melakukan pengurutan paket berdasarkan id paket, nama paket, dan harga total. Untuk melakukan pengurutan, admin dapat menekan pada option Field yang terdapat di bagian Sort.</li>
                                <li><b>Tambah Paket:</b> Untuk menambah paket, admin dapat menekan tombol Tambah Paket sehingga nantinya akan dialihkan pada halaman tambah paket yang berisi form pengisian.</li>
                                <li><b>Ubah Paket:</b> Untuk mengubah paket, admin dapat menekan tombol Edit yang terdapat pada kolom Aksi. Setelah menekan tombol tersebut, admin akan dialihkan pada halaman edit paket yang berisi form pengubahan data.</li>
                                <li><b>Hapus Paket:</b> Untuk menghapus paket, admin dapat menekan tombol Hapus yang terdapat pada kolom Aksi. Setelah menekan tombol Hapus, paket akan terhapus kemudian tabel list paket akan diperbarui sesuai dengan perubahan terbaru.</li>
                            </ul>
                        </p>
                    </div>
                </div>
            </div>

            <div id="ruangan" class="section">
                <div class="card">
                    <div class="card-header">
                        Ruangan
                    </div>
                    <div class="card-body">
                        <p class="text-justify">
                            Menu Ruangan berisi list ruangan yang terdapat pada sistem kami. Pada halaman ini, admin juga dapat melakukan beberapa operasi:
                            <ul>
                                <li><b>Cari Ruangan:</b> Untuk mencari ruangan yang diinginkan, admin dapat mengisi text field yang terdapat pada bagian search kemudian menekan tombol Search. Setelah itu, tampilan tabel akan diperbarui sesuai dengan ruangan yang dicari.</li>
                                <li><b>Pengurutan Ruangan:</b> Admin juga dapat melakukan pengurutan ruangan berdasarkan id ruangan, nama ruangan, dan backdrop. Untuk melakukan pengurutan, admin dapat menekan pada option Field yang terdapat di bagian Sort.</li>
                                <li><b>Tambah Ruangan:</b> Untuk menambah ruangan, admin dapat menekan tombol Tambah Ruangan sehingga nantinya akan dialihkan pada halaman tambah ruangan yang berisi form pengisian.</li>
                                <li><b>Ubah Ruangan:</b> Untuk mengubah ruangan, admin dapat menekan tombol Edit yang terdapat pada kolom Aksi. Setelah menekan tombol tersebut, admin akan dialihkan pada halaman edit ruangan yang berisi form pengubahan data.</li>
                                <li><b>Hapus Ruangan:</b> Untuk menghapus ruangan, admin dapat menekan tombol Hapus yang terdapat pada kolom Aksi. Setelah menekan tombol Hapus, ruangan akan terhapus kemudian tabel list ruangan akan diperbarui sesuai dengan perubahan terbaru.</li>
                            </ul>
                        </p>
                    </div>
                </div>
            </div>

            <div id="layout" class="section">
                <div class="card">
                    <div class="card-header">
                        Layout
                    </div>
                    <div class="card-body">
                        <p class="text-justify">
                            Menu Layout berisi list layout ruangan yang terdapat pada sistem kami. Pada halaman ini, admin juga dapat melakukan beberapa operasi:
                            <ul>
                                <li><b>Cari Layout:</b> Untuk mencari layout ruangan yang diinginkan, admin dapat mengisi text field yang terdapat pada bagian search kemudian menekan tombol Search. Setelah itu, tampilan tabel akan diperbarui sesuai dengan layout yang dicari.</li>
                                <li><b>Pengurutan Layout:</b> Admin juga dapat melakukan pengurutan layout ruangan berdasarkan id layout, nama layout, dan kapasitas. Untuk melakukan pengurutan, admin dapat menekan pada option Field yang terdapat di bagian Sort.</li>
                                <li><b>Tambah Layout:</b> Untuk menambah layout ruangan, admin dapat menekan tombol Tambah Layout sehingga nantinya akan dialihkan pada halaman tambah layout yang berisi form pengisian.</li>
                                <li><b>Ubah Layout:</b> Untuk mengubah layout ruangan, admin dapat menekan tombol Edit yang terdapat pada kolom Aksi. Setelah menekan tombol tersebut, admin akan dialihkan pada halaman edit layout yang berisi form pengubahan data.</li>
                                <li><b>Hapus Layout:</b> Untuk menghapus layout ruangan, admin dapat menekan tombol Hapus yang terdapat pada kolom Aksi. Setelah menekan tombol Hapus, layout ruangan akan terhapus kemudian tabel list layout akan diperbarui sesuai dengan perubahan terbaru.</li>
                            </ul>
                        </p>
                    </div>
                </div>
            </div>

            <div id="makanan" class="section">
                <div class="card">
                    <div class="card-header">
                        Makanan
                    </div>
                    <div class="card-body">
                        <p class="text-justify">
                            Menu Makanan berisi list makanan yang terdapat pada sistem kami. Pada halaman ini, admin juga dapat melakukan beberapa operasi:
                            <ul>
                                <li><b>Cari Makanan:</b> Untuk mencari makanan yang diinginkan, admin dapat mengisi text field yang terdapat pada bagian search kemudian menekan tombol Search. Setelah itu, tampilan tabel akan diperbarui sesuai dengan makanan yang dicari.</li>
                                <li><b>Pengurutan Makanan:</b> Admin juga dapat melakukan pengurutan makanan berdasarkan id makanan, nama makanan, dan kategori makanan. Untuk melakukan pengurutan, admin dapat menekan pada option Field yang terdapat di bagian Sort.</li>
                                <li><b>Tambah Makanan:</b> Untuk menambah makanan, admin dapat menekan tombol Tambah Makanan sehingga nantinya akan dialihkan pada halaman tambah makanan yang berisi form pengisian.</li>
                                <li><b>Ubah Makanan:</b> Untuk mengubah makanan, admin dapat menekan tombol Edit yang terdapat pada kolom Aksi. Setelah menekan tombol tersebut, admin akan dialihkan pada halaman edit makanan yang berisi form pengubahan data.</li>
                                <li><b>Hapus Makanan:</b> Untuk menghapus makanan, admin dapat menekan tombol Hapus yang terdapat pada kolom Aksi. Setelah menekan tombol Hapus, makanan akan terhapus kemudian tabel list makanan akan diperbarui sesuai dengan perubahan terbaru.</li>
                            </ul>
                        </p>
                    </div>
                </div>
            </div>

            <div id="history" class="section">
                <div class="card">
                    <div class="card-header">
                        History
                    </div>
                    <div class="card-body">
                        <p class="text-justify">
                            Menu History berisi table list Pemesanan  yang tercatat pada system. Pesanan yang masuk pada halaman history 
                            hanyalah pesanan atau order yang statusnya sudah menjadi checkout / telah selesai. Jika belum ada pesanan yang 
                            statusnya checkout atau telah selesai, halaman akan menampilkan pesan 'Gagal menampilkan sejarah pemesanan'.
                        </p>
                    </div>
                </div>
            </div>

            <div id="income" class="section">
                <div class="card">
                    <div class="card-header">
                        Income
                    </div>
                    <div class="card-body">
                        <p class="text-justify">
                            Menu Income, yang berisi table pemasukan dari pesanan yang tercatat pada system. Sama seperti menu history, pesanan yang tampil pada 
                            menu income hanyalah pesanan yang statusnya sudah checkout/telah selesai. Pada halaman income, admin dapat melakukan beberapa operasi seperti :
                            <ul>
                                <li><b>Filter:</b> Admin dapat melakukan filter atau penyaringan table pemasukan berdasarkan pesanan keseluruhan, pesanan per bulan, atau pesanan per tahun. Untuk menerapkan filter, admin dapat menekan option field pada bagian Filter kemudian memilih filter yang diinginkan. </li>
                                <li><b>Cetak Laporan:</b> Admin dapat melakukan pencetakan laporan dari table laporan pemasukan. Untuk melakukan pencetakan tersebut,admin dapat menekan tombol Cetak Laporan. Setelah menekan tombol tersebut, file laporan akan terunduh dengan format pdf. </li>
                            </ul>
                        </p>
                        
                    </div>
                </div>
            </div>

            <div id="faq" class="section">
                <div class="card">
                    <div class="card-header">
                        Frequently Asked Questions (FAQ)
                    </div>
                    <div class="card-body">
                        <p class="text-justify">
                            Berikut adalah beberapa pertanyaan yang sering diajukan terkait UB Guesthouse Banquet System:
                            <ul>
                                <li><b>Bagaimana cara membuat pemesanan baru?</b><br>
                                    Untuk membuat pemesanan baru, Anda dapat masuk ke menu Orders, lalu klik tombol Tambah Pesanan. Isi form yang muncul dengan detail pemesanan yang diperlukan, kemudian klik tombol Create Order.
                                </li>
                                <li><b>Bagaimana cara mengubah status pemesanan?</b><br>
                                    Anda dapat mengubah status pemesanan dengan menekan tombol status pada kolom Status di tabel Orders. Pilih status baru yang diinginkan dan isi form tambahan jika diperlukan.
                                </li>
                                <li><b>Apa yang harus dilakukan jika saya lupa password?</b><br>
                                    Jika Anda lupa password, Anda dapat menghubungi admin sistem untuk reset password. Pastikan memberikan informasi identitas yang valid untuk verifikasi.
                                </li>
                                <li><b>Bagaimana cara menambah makanan atau ruangan baru?</b><br>
                                    Untuk menambah makanan atau ruangan baru, masuk ke menu Makanan atau Ruangan, lalu klik tombol Tambah Makanan atau Tambah Ruangan. Isi form yang muncul dengan detail yang diperlukan, kemudian klik tombol Tambah.
                                </li>
                            </ul>
                        </p>
                    </div>
                </div>
            </div>

            <div id="logout" class="section">
                <div class="card">
                    <div class="card-header">
                        Logout
                    </div>
                    <div class="card-body">
                        <p class="text-justify">
                            Menu Logout digunakan untuk keluar dari sistem UB Guesthouse Banquet. Setelah menekan tombol Logout, admin akan 
                            dialihkan kembali ke halaman login dan sesi admin akan berakhir.
                        </p>
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
