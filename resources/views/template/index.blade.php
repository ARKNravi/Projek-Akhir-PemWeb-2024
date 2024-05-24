<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        nav, aside{
            background-color: rgb(58, 18, 18);
            color: white
        }
    </style>
</head>
<body class="">
     <nav class=>
        <ul class="d-flex flex-row justify-content-md-between list-unstyled p-3">
            <div>
                <li>Home</li>
            </div>
            <div class="d-flex flex-row justify-content-center gap-2">
                <li>Docs</li>
                <li>Log Out</li>
            </div>
        </ul>
     </nav>
     <main class="d-flex flex-row justify-content-start align-content-center mt-0">
        <aside>
            <ul class="d-flex flex-column justify-content-md-between list-unstyled p-3 gap-5" >
                <li><a class="text-decoration-none text-white" href="">Profile</a></li>
                <li><a class="text-decoration-none text-white" href="">dashboard</a></li>
                <li><a class="text-decoration-none text-white" href="packets">packets</a></li>
                <li><a class="text-decoration-none text-white" href="">order</a></li>
                <li><a class="text-decoration-none text-white" href="">history</a></li>
                <li><a class="text-decoration-none text-white" href="">income</a></li>
            </ul>
         </aside>
         <div class="content">
            @yield('content')
         </div>
         
     </main>
     <footer>

     </footer>
</body>
</html>