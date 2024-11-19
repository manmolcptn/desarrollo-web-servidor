<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consolas</title>
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
        crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );

        require('./conexion.php');
    ?>
</head>
<body>
    <div class="container">
        <?php 
            //creamos variable sql donde introducimos la consulta
            $sql = "SELECT * FROM consolas";

            //Guarda un objeto resultante a una consulta en la conexión creada
            $resultado = $_conexion -> query($sql);
            //si falla query devuelve false
        ?>
        <a href="nueva_consola.php">Nueva consola</a>
        <a href="nuevo_fabricante.php">Nuevo fabricante</a>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Consola</th>
                    <th>Fabricante</th>
                    <th>Generacion</th>
                    <th>Unidades vendidas</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    //Trata el objeto resultado como un array asociativo
                    while($fila = $resultado -> fetch_assoc()){
                        //["titulo" = "Frieren", "nombre_estudio"="Pierrot"...]
                        echo "<tr>";
                        echo "<td>" . $fila["nombre"] . "</td>";
                        echo "<td>" . $fila["fabricante"] . "</td>";
                        echo "<td>" . $fila["generacion"] . "</td>";
                        /* $fila["unidades_vendidas"] === NULL ? echo "<td> No hay datos </td>" : echo "<td>" . $fila["unidades_vendidas"] . "</td>"; */
                

                        
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