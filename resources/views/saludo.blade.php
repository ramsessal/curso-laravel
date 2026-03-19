<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>No se</title>
</head>
<body>
    <h1>Hola mundo</h1>
    <h2>Bienvenido {{ $nombre }}. Hoy es {{ $fecha }}</h2>
    @if ($edad >= 18)
        <p>Eres mayor de edad</p>
    @else
        <p>Eres menor de edad</p>
    @endif
</body>
</html>