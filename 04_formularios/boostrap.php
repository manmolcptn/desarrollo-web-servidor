<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );    
    ?>
    <style>
        .error{
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $tmp_titulo = $_POST["titulo"];
            if (isset($_POST["consola"])) $tmp_consola = $_POST["consola"];
            else $tmp_consola = "";
            $tmp_descripcion = $_POST["descripcion"];
            $tmp_fecha_lanzamiento = $_POST["fecha_lanzamiento"];
            

            //Primero comprobamos si está vacío, si lo está escribimos un error.
            if ($tmp_titulo == "") $err_titulo = "El título es obligatorio";
            else{
                //Si no está vacio comprobamos que cumple con el tamaño
                if (strlen($tmp_titulo) > 60) $err_titulo = "El título debe tener entre 1 y 60 caracteres";
                else{
                    //Si cumple con el tamaño comprobamos que cumple con el patrón adecuado.
                    $patron = "/^[a-zA-Z0-9 ]+$/";
                    if (!preg_match($patron, $tmp_titulo)) $err_titulo = "El título solo puedo contener letras, numeros y espacios en blanco.";
                    else $titulo = $tmp_titulo;
                }
            }

            if ($tmp_consola == "") $err_consola = "La consola es obligatoria";
            else{
                //si las consolas han sido seleccionadas comprobamos que sean las adecuadas.
                $consolas_validas = ["play4", "play5", "pc", "switch"];
                
                //Comprobamos que lo que hay en la variable temporal coincida con algunas de las variables del array
                if(!in_array($tmp_consola, $consolas_validas)) $err_consola = "Elige una consola válida";
                else $consola = $tmp_consola;
            }
                
            if ($tmp_descripcion == "") $descripcion = $tmp_descripcion;
            else{
                if (strlen($tmp_descripcion) > 255) $err_descripcion = "La descripción debe tener entre 0 y 255 caracteres";
                else{
                    $patron = "/^[a-zA-Z0-9 .,]+$/";
                    if(!preg_match($patron, $tmp_descripcion)) $err_descripcion = "La descripción solo puede contener números, letras, espacios, comas y puntos";
                    else $descripcion = $tmp_descripcion;
                }
            }

        
            //Fecha de Lanzamiento: entre el 1 de enero de 1947 y dentro de 10 años (dinámico).
            if ($tmp_fecha_lanzamiento == "") $err_fecha_lanzamiento = "La fecha de lanzamiento es obligatoria.";
            else{
                $patron = "/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/";
                if (!preg_match($patron, $tmp_fecha_lanzamiento)) $err_fecha_lanzamiento = "El formato de la fecha es incorrecto";
                else{
                    //Para comprobar la fecha, le hacemos explode con los guiones y los introducimos en un list
                    list($anno, $mes, $dia) = explode('-', $tmp_fecha_lanzamiento);
                    
                    if ($anno < 1947) $err_fecha_lanzamiento = "El año no puede ser anterior a 1947";
                    else{
                        //ahora comprobamos con la fecha actual
                        $anno_actual= date("Y");
                        $mes_actual = date("m");
                        $dia_actual = date("d");
                        
                        if ($anno - $anno_actual > 10) $err_fecha_lanzamiento = "El videojuego no puede lanzarse dentro de mas de 10 años.";
                        elseif($anno - $anno_actual < 10) $fecha_lanzamiento = $tmp_fecha_lanzamiento;
                        else{
                            if($mes - $mes_actual < 0) $fecha_lanzamiento = $tmp_fecha_lanzamiento;
                            else if ($mes - $mes_actual > 0) $err_fecha_lanzamiento = "El videojuego no puede lanzarse dentro de mas de 10 años.";
                            else{
                                if($dia - $dia_actual > 0) $err_fecha_lanzamiento = "El videojuego no puede lanzarse dentro de mas de 10 años.";
                                else $fecha_lanzamiento = $tmp_fecha_lanzamiento;
                            }
                        }
                    }
                }
            }
        }
    ?>
            
        <h1>Formulario</h1>
    
        <form class="col-6" action="" method="post">
            <div class="mb-3">
                <label class="form-label">Titulo</label>
                <input class="form-control" type="text" name="titulo">
                <?php 
                    if (isset($err_titulo)) echo "<span class='error'>$err_titulo</span>";
                ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Descripcion</label>
                <textarea class="form-control" name="descripcion"></textarea>
                <?php 
                    if (isset($err_descripcion)) echo "<span class='error'>$err_descripcion</span>";
                ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Consola</label>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="consola" value="play4">
                    <label class="form-check-label">Play 4</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="consola" value="play5">
                    <label class="form-check-label">Play 5</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="consola" value="switch"> 
                    <label class="form-check-label">Switch</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="consola" value="pc"> 
                    <label class="form-check-label">Pc</label>
                </div>
                <?php 
                    if (isset($err_consola)) echo "<span class='error'>$err_consola</span>";
                ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Fecha de lanzamiento</label>
                <input type="date" class="form-control" name="fecha_lanzamiento">
                <?php 
                    if (isset($err_fecha_lanzamiento)) echo "<span class='error'>$err_fecha_lanzamiento</span>";
                ?>
            </div>
            <div class="mb-3">
                <input type="submit" value="Enviar" class="btn btn-primary">
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>