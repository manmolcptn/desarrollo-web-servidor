<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
        crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );

<<<<<<< HEAD
        require('../conexion.php');
=======
        require('./conexion.php');
>>>>>>> master
    ?>
</head>
<body>
    <div class="container">
<<<<<<< HEAD
=======
        <h1>Listado de animes</h1>
>>>>>>> master
        <?php 
            //creamos variable sql donde introducimos la consulta
            $sql = "SELECT * FROM animes";

            //Guarda un objeto resultante a una consulta en la conexión creada
            $resultado = $_conexion -> query($sql);
            //si falla query devuelve false
        ?>
<<<<<<< HEAD
=======
        <a class="btn btn-secondary" href="nuevo_anime.php">Nuevo anime</a>
        <a class="btn btn-secondary" href="nuevo_estudio.php">Nuevo estudio</a>
>>>>>>> master
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Estudio</th>
                    <th>Año</th>
                    <th>Temporadas</th>
<<<<<<< HEAD
=======
                    <th>Imagen</th>
>>>>>>> master
                </tr>
            </thead>
            <tbody>
                <?php 
                    //Trata el objeto resultado como un array asociativo
                    while($fila = $resultado -> fetch_assoc()){
                        //["titulo" = "Frieren", "nombre_estudio"="Pierrot"...]
                        echo "<tr>";
                        echo "<td>" . $fila["titulo"] . "</td>";
                        echo "<td>" . $fila["nombre_estudio"] . "</td>";
                        echo "<td>" . $fila["anno_estreno"] . "</td>";
                        echo "<td>" . $fila["num_temporadas"] . "</td>";
<<<<<<< HEAD
=======
                        echo "<td><img src=./" . $fila["imagen"]." width=150px></td>";
>>>>>>> master
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
    <script 
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
        crossorigin="anonymous">
    </script>
</body>

</html>