<!-- resources/views/about.blade.php -->
@extends('template.index')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">About Us</h1>

    <h2>UB Guesthouse Banquet System</h2>

    <h3>Anggota Kelompok</h3>
    <ul class="list-unstyled">
        <li><strong>Muhammad Alfaiz Khalifah Alamsyah</strong> - Frontend, Backend (Ketua Kelompok) [<a href="https://github.com/FaizKhalifah" target="_blank">GitHub</a>]</li>
        <li><strong>Ananda Ravi Kuntadi</strong> - Backend, Frontend, Debugger [<a href="https://github.com/ARKNravi" target="_blank">GitHub</a>]</li>
        <li><strong>Salsa Zufar Radinka Akmal</strong> - Frontend, Backend [<a href="https://github.com/salsazufar" target="_blank">GitHub</a>]</li>
        <li><strong>Muhammad Yasin Hakim</strong> - Data Analytic, Frontend [<a href="https://github.com/Y716" target="_blank">GitHub</a>]</li>
        <li><strong>Davin Dalana Fidelio Fredra</strong> - Frontend [<a href="https://github.com/davindalana" target="_blank">GitHub</a>]</li>
    </ul>

    <h3>Deskripsi Proyek</h3>
    <p>UB Guesthouse Banquet System adalah sebuah sistem manajemen pemesanan dan banquet yang dirancang untuk memudahkan pengelolaan acara di UB Guesthouse. Sistem ini akan membantu dalam memfasilitasi pemesanan ruang, pengelolaan jadwal, serta manajemen layanan banquet secara efisien dan terintegrasi.</p>

    <h3>Fitur Utama</h3>
    <ul>
        <li><strong>Profile:</strong> Menampilkan informasi admin seperti username dan password. Admin juga dapat mengganti username atau password.</li>
        <li><strong>Dashboard:</strong> Menampilkan overview statistik pesanan per bulan, distribusi pemesan, dan berbagai informasi terkait jumlah orders, paket, ruangan, kategori makanan, dan layout ruangan yang tersedia.</li>
        <li><strong>Orders:</strong> Mengelola tabel orders dengan fitur perubahan status order, penambahan order baru, dan pengisian form tambahan untuk setiap status.</li>
        <li><strong>Paket:</strong> Menyediakan list paket dengan fitur pencarian, pengurutan, penambahan, pengubahan, dan penghapusan paket.</li>
        <li><strong>Ruangan:</strong> Menyediakan list ruangan dengan fitur pencarian, pengurutan, penambahan, pengubahan, dan penghapusan ruangan.</li>
        <li><strong>Layout:</strong> Menyediakan list layout ruangan dengan fitur pencarian, pengurutan, penambahan, pengubahan, dan penghapusan layout ruangan.</li>
        <li><strong>Makanan:</strong> Menyediakan list makanan dengan fitur pencarian, pengurutan, penambahan, pengubahan, dan penghapusan makanan.</li>
        <li><strong>History:</strong> Menampilkan list pemesanan yang statusnya sudah menjadi checkout atau selesai.</li>
        <li><strong>Income:</strong> Menampilkan tabel pemasukan dari pesanan yang telah selesai dengan fitur filter dan pencetakan laporan.</li>
        <li><strong>FAQ:</strong> Menyediakan jawaban untuk pertanyaan yang sering diajukan terkait sistem.</li>
        <li><strong>Logout:</strong> Menu untuk keluar dari sistem dan mengakhiri sesi admin.</li>
    </ul>

    <h3>Tech Stack</h3>
    <ul class="list-inline">
        <li class="list-inline-item"><img src="https://img.shields.io/badge/HTML-E34F26?style=for-the-badge&logo=html5&logoColor=white" alt="HTML"></li>
        <li class="list-inline-item"><img src="https://img.shields.io/badge/CSS-1572B6?style=for-the-badge&logo=css3&logoColor=white" alt="CSS"></li>
        <li class="list-inline-item"><img src="https://img.shields.io/badge/Bootstrap-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white" alt="Bootstrap"></li>
        <li class="list-inline-item"><img src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel"></li>
        <li class="list-inline-item"><img src="https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL"></li>
        <li class="list-inline-item"><img src="https://img.shields.io/badge/Google_Cloud-4285F4?style=for-the-badge&logo=google-cloud&logoColor=white" alt="Google Cloud"></li>
        <li class="list-inline-item"><img src="https://img.shields.io/badge/Postman-FF6C37?style=for-the-badge&logo=postman&logoColor=white" alt="Postman"></li>
    </ul>

    <h3>Lisensi</h3>
    <p>Proyek ini dilisensikan di bawah <a href="LICENSE">MIT License</a>.</p>

    <h3>Kontak</h3>
    <p>Untuk informasi lebih lanjut, Anda dapat menghubungi anggota tim melalui email berikut:</p>
    <ul>
        <li>Muhammad Alfaiz Khalifah Alamsyah: <a href="mailto:alfaiz@example.com">alfaiz@example.com</a></li>
        <li>Ananda Ravi Kuntadi: <a href="mailto:anandaravik@student.ub.ac.id">anandaravik@student.ub.ac.id</a></li>
        <li>Salsa Zufar Radinka Akmal: <a href="mailto:salsa@example.com">salsa@example.com</a></li>
        <li>Muhammad Yasin Hakim: <a href="mailto:yasin@example.com">yasin@example.com</a></li>
        <li>Davin Dalana Fidelio Fredra: <a href="mailto:davin@example.com">davin@example.com</a></li>
    </ul>

    <p>Terima kasih telah menggunakan UB Guesthouse Banquet System! Anda dapat menemukan kode sumber proyek ini di GitHub: <a href="https://github.com/ARKNravi/Projek-Akhir-PemWeb-2024/" target="_blank">Projek-Akhir-PemWeb-2024</a></p>
</div>
@endsection
