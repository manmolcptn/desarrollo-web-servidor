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
            
            $sql = "SELECT * FROM estudios ORDER BY nombre_estudio";
            $resultado = $_conexion -> query($sql);
            $estudios = [];

            //Introduce los nombres de los estudios en un nuevo array
            while($fila = $resultado -> fetch_assoc()){
                array_push($estudios, $fila["nombre_estudio"]);
            }
            /* print_r($estudios); */
        
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                $tmp_titulo = $_POST["titulo"];
                $tmp_nombre_estudio = $_POST["nombre_estudio"];
                $tmp_anno_estreno = $_POST["anno_estreno"];
                $num_temporadas = $_POST["num_temporadas"];
                //$_FILES es una matriz
                $nombre_imagen = $_FILES["imagen"]["name"];

                if ($tmp_titulo == "") $err_titulo = "El título es obligatorio.";
                else {
                    if (strlen($tmp_titulo) > 80) $err_titulo = "El título puede tener como máximo 80 caractéres.";
                    else $titulo = $tmp_titulo;
                }

                if ($tmp_nombre_estudio == "") $err_nombre_estudio = "El nombre del estudio es obligatorio.";
                else{
                    if (!in_array($tmp_nombre_estudio, $estudios)) $err_nombre_estudio = "Elige un estudio válido";
                    else $nombre_estudio = $tmp_nombre_estudio;
                }

                if ($tmp_anno_estreno == "") $anno_estreno = "Desconocido";
                else {
                    $patron = "/^[0-9]{4}+$/";
                    if (!preg_match($patron, $tmp_anno_estreno)) $err_anno_estreno = "Sólo se permiten 4 valores numéricos.";
                    else {
                        $anno_actual = date("Y");
                        if($tmp_anno_estreno < 1960) $err_anno_estreno = "El año de estreno debe ser posterior a 1960";
                        else if($tmp_anno_estreno > $anno_actual + 5) $err_anno_estreno = "El año de estreno no puede ser dentro de más de 5 años.";
                        else $anno_estreno = $tmp_anno_estreno;
                    }
                }

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
                <?php if(isset($err_titulo)) echo "<span class='error'>$err_titulo</span>"?>
            </div>
            <div class="mb-3">
                <label class="form-label">Estudio</label>
                <select class="form-select" name="nombre_estudio" id="">
                    <?php foreach($estudios as $estudio) { ?>
                        <option value="" selected disabled hidden>---Elige un estudio---</option>
                        <option value="<?php echo $estudio ?>">
                            <?php echo $estudio ?>
                        </option>

                    <?php  } ?>
                    <?php if(isset($err_nombre_estudio)) echo "<span class='error'>$err_nombre_estudio</span>"?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Año estreno</label>
                <input name="anno_estreno" class="form-control" type="text">
                <?php if(isset($err_anno_estreno)) echo "<span class='error'>$err_anno_estreno</span>"?>
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
                <a href="index.php" class="btn btn-secondary">Volver</a>
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