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
                $titulo = $_POST["titulo"];
                $nombre_estudio = $_POST["nombre_estudio"];
                $anno_estreno = $_POST["anno_estreno"];
                $num_temporadas = $_POST["num_temporadas"];
                //$_FILES es una matriz
                $nombre_imagen = $_FILES["imagen"]["name"];

               $direccion_temporal = $_FILES["imagen"]["tmp_name"];
               $nombre_imagen = $_FILES["imagen"]["name"];
               move_uploaded_file($direccion_temporal, "imagenes/$nombre_imagen");
                $sql = "INSERT INTO animes (titulo, nombre_estudio, anno_estreno, num_temporadas, imagen)
                        VALUES 
                        ('$titulo', '$nombre_estudio', $anno_estreno, $num_temporadas, 
                        './imagenes/$nombre_imagen')";

                $_conexion -> query($sql);
            }       
        ?>
        <form action="" method="post" class="col-6" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Titulo</label>
                <input name="titulo" class="form-control" type="text">
            </div>
            <div class="mb-3">
                <label class="form-label">Estudio</label>
                <input name="nombre_estudio" class="form-control" type="text">
            </div>
            <div class="mb-3">
                <label class="form-label">Año estreno</label>
                <input name="anno_estreno" class="form-control" type="text">
            </div>
            <div class="mb-3">
                <label class="form-label">Número Temporadas</label>
                <input name="num_temporadas" class="form-control" type="text">
            </div>
            <div class="mb-3">
                <label class="form-label">Imagen</label>
                <input name="imagen" class="form-control" type="file">
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