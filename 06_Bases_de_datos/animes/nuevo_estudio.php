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
                $tmp_nombre_estudio = $_POST["nombre_estudio"];
                $tmp_ciudad = $_POST["ciudad"];
                $anno_fundacion = $_POST["anno_fundacion"];

                if ($tmp_nombre_estudio == "") $err_nombre_estudio = "El nombre del estudio es obligatorio.";
                else{
                    $patron = "/^[a-zA-Z0-9 ]+$/";
                    if (!preg_match($patron, $tmp_nombre_estudio)) $err_nombre_estudio = "El nombre del estudio solo puede contener letras, numeros y espacios.";
                    else $nombre_estudio = $tmp_nombre_estudio;
                }

                if($tmp_ciudad == "") $err_ciudad = "La ciudad es obligatoria.";
                else{
                    $patron = "/^[a-ZA-Z ]+$/";
                    if (!preg_match($patron, $ciudad)) $err_ciudad = "La ciudad solo puede contener letras y espacios en blanco.";
                    else $ciudad = $tmp_ciudad;
                }

                $sql = "INSERT INTO estudios (nombre_estudio, ciudad, anno_fundacion)
                        VALUES ('$nombre_estudio', '$ciudad', $anno_fundacion)";

                $_conexion -> query($sql);
            }       
        ?>
        <form action="" method="post" class="col-6">
            <div class="mb-3">
                <label class="form-label">Estudio</label>
                <input name="nombre_estudio" class="form-control" type="text">
                <?php if(isset($err_nombre_estudio)) echo "<span class='error'>$err_nombre_estudio</span>"?>
            </div>
            <div class="mb-3">
                <label class="form-label">Ciudad</label>
                <input name="anno_estreno" class="form-control" type="text">
                <?php if(isset($err_ciudad)) echo "<span class='error'>$err_ciudad</span>"?>
            </div>
            <div class="mb-3">
                <label class="form-label">Año fundacion</label>
                <input name="num_temporadas" class="form-control" type="text">
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