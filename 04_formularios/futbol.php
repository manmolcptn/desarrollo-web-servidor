<!--
/**
* - Equipo: entre 3 y 20 caracteres. Puede contener letras, espacios
* en blanco y puntos. (ej: Málaga c.f)
*
* - Iniciales: 3 caracteres exactos (ej: "MCF")
* 
* - Liga: opciones con select, Liga EA Sports, Liga HyperMotion ys
* Primera Rfef
* 
* - Número de jugadores: entre 26 y 32.
*
* - Fecha de fundacion: entre hoy (dinámico) 
* y 23 de Octubre de 1889 (inclusive)
*
*/ 
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fútbol</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );    
    ?>
</head>
<body>
    <div class="container">
        <h1>Formulario de Fútbol</h1>
        <form class="col-6" method="post" action="">
            <div class="mb-3">
                <label class="form-label">Equipo</label>
                <input class="form-control" type="text" name="equipo">
                <?php 
                    if (isset($err_titulo)) echo "<span class='error'>$err_titulo</span>";
                ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Iniciales</label>
                <textarea class="form-control" name="iniciales"></textarea>
                <?php 
                    if (isset($err_descripcion)) echo "<span class='error'>$err_descripcion</span>";
                ?>
            </div>
        </form>
    </div>
</body>
</html>