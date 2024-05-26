<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        nav, aside, footer, ul, li{
            background-color: rgb(17, 68, 48);
        }
    </style>
</head>
<body class="">
     <main class="d-flex flex-row justify-content-start align-content-center mt-0">
        <aside>
            <ul class="d-flex flex-column justify-content-md-between list-unstyled p-3 gap-5" >
                <li><a class="text-decoration-none text-white" href="/admin/profile">Profile</a></li>
                <li><a class="text-decoration-none text-white" href="/admin/dashboard">dashboard</a></li>
                <li><a class="text-decoration-none text-white" href="/admin/orders">order</a></li>

                <li><a class="text-decoration-none text-white" href="/paket">paket</a>
                    <ul class="d-flex flex-column justify-content-md-between list-unstyled p-2 gap-2">
                        <li><a class="text-decoration-none text-white" href="/fasilitas">Fasilitas</a></li>
                        <li><a class="text-decoration-none text-white" href="/admin/ruangan">Ruangan</a></li>
                        <li><a class="text-decoration-none text-white" href="/layout">Layout</a></li>
                        <li><a class="text-decoration-none text-white" href="/kamar">Kamar</a></li>
                        <li><a class="text-decoration-none text-white" href="/makanan">makanan</a></li>
                    </ul></li>
                <li><a class="text-decoration-none text-white" href="/history">history</a></li>
                <li><a class="text-decoration-none text-white" href="/income">income</a></li>
                <li><a class="text-decoration-none text-white" href="/dokumentasi">Docs</a></li>
                <li><a class="text-decoration-none text-white" href="/logout">Logout</a></li>
            </ul>
         </aside>
         <div class="content p-3 m-2">
            @yield('content')
         </div>

     </main>

</body>
</html>
