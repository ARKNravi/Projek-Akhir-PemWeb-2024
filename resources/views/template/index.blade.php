<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
     <nav>
        <ul>
            <li>Home</li>
            <li>Docs</li>
            <li>Log Out</li>
        </ul>
     </nav>
     <aside>
        <ul>
            <li>Profile</li>
            <li>Dashboard</li>
            <li>Packets</li>
            <li>Orders</li>
            <li>History</li>
            <li>Income</li>
        </ul>
     </aside>
     <main class="content">
        @yield('content')
     </main>
     
 
     @include('template.partials.footer')
</body>
</html>