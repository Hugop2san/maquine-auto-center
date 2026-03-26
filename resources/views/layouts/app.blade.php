<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Maquine Auto Center')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite('resources/css/app.css')

    <style>
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            background: url("{{ asset('/background.png') }}") no-repeat center center;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body>
    
    @yield('content')

</body>
</html>