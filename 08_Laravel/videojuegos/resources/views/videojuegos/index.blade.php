<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Index de videojuegos</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Pegi</th>
                <th>Genero</th>
            </tr>
        </thead>
        <tbody>
            @foreach($videojuegos as $videojuego)
            @php
                list($titulo, $pegi, $genero) = $videojuego //lista para poder sacar en codigo php
            @endphp
                <tr>
                    <td>{{$videojuego -> Titulo}}</td>
                    <td>{{$videojuego -> Titulo}}</td>
                    <td>{{$videojuego -> Titulo}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>