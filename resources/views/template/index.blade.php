<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }
        aside {
            background-color: #114430;
            color: #fff;
            position: fixed;
            top: 0;
            bottom: 0;
            width: 200px;
            padding: 20px;
        }
        aside ul {
            padding: 0;
            margin: 0;
        }
        aside ul li {
            list-style: none;
        }
        aside ul li a {
            display: block;
            padding: 8px;
            color: #fff;
            text-decoration: none;
            transition: color 0.3s, background-color 0.3s, text-decoration 0.3s;
        }
        aside ul li a:hover {
            background-color: white;
            color: #145c43;
            text-decoration: underline;
        }
        .main-content {
            margin-left: 220px;
            padding: 20px;
        }
        .content {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
    </style>
</head>
<body>
    <aside>
        <ul>
            <li><a href="/admin/profile">Profile</a></li>
            <li><a href="/admin/dashboard">Dashboard</a></li>
            <li><a href="/admin/orders">Orders</a></li>
            <li>
                <a href="/paket">Paket</a>
                <ul class="ms-3">
                    <li><a href="/admin/ruangan">Ruangan</a></li>
                    <li><a href="/layout">Layout</a></li>
                    <li><a href="/makanan">Makanan</a></li>
                </ul>
            </li>
            <li><a href="/history">History</a></li>
            <li><a href="/income">Income</a></li>
            <li><a href="/docs">Docs</a></li>
            <li><a href="/about">About Us</a></li>
            <li><a href="{{route('admin.logout')}}">Logout</a></li>
        </ul>
    </aside>
    <div class="main-content">
        <div class="content">
            @yield('content')
        </div>
    </div>
</body>
</html>
