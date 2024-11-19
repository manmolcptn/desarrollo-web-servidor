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
 
        require('./conexion.php');
    ?>
</head>
<body>
    <div class="container">
        <?php 
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                $id_consola = $_POST["id_consola"];
                $nombre = $_POST["nombre"];
                $fabricante = $_POST["fabricante"];
                $generacion = $_POST["generacion"];

                $sql = "INSERT INTO consolas (id_consola, nombre, fabricante, generacion)
                        VALUES ($id_consola, '$nombre', '$fabricante', $generacion)";

                $_conexion -> query($sql);
            }       
        ?>
        <form action="" method="post" class="col-6">
            <div class="mb-3">
                <label class="form-label">ID</label>
                <input name="id_consola" class="form-control" type="text">
            </div>
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input name="nombre" class="form-control" type="text">
            </div>
            <div class="mb-3">
                <label class="form-label">Fabricante</label>
                <input name="fabricante" class="form-control" type="text">
            </div>
            <div class="mb-3">
                <label class="form-label">Generación</label>
                <input name="generacion" class="form-control" type="text">
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value="Crear">
            </div>
        </form>
    </div>
    <script 
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
        crossorigin="anonymous">
    </script>
</body>

</html>