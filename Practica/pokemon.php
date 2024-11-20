<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokemon</title>
    <style>
        .error{
            color: red;
        }
    </style>
</head>
<body>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $tmp_nombre = $_POST["nombre"];
            $tmp_peso = $_POST["peso"];
            if(isset($_POST["genero"])) $tmp_genero = $_POST["genero"];
            else $tmp_genero = "";
            //Hago esto al igual que el radio porque no estoy seguro de si da fallo también, por prevenir.
            if(isset($_POST["tipo"])) $tmp_tipo = $_POST["tipo"];
            else $tmp_tipo = "";
            $tmp_fecha_captura = $_POST["fecha_captura"];
            $tmp_descripcion = $_POST["descripcion"];


            //Validacion
            if($tmp_nombre == "") $err_nombre = "El nombre del pokemon es obligatorio.";
            else{
                if(strlen($tmp_nombre)<3 || strlen($tmp_nombre) > 30) $err_nombre = "Escriba un nombre entre 3 y 30 caracteres";
                else{
                    $patron = "/^[a-zA-Záéíóúñ]+$/";
                    if(!preg_match($patron, $tmp_nombre)) $err_nombre = "El nombre solo puede contener letras con o sin tilde y ñ";
                    else $nombre = $tmp_nombre;
                }
            }

            if($tmp_peso == "") $err_peso = "El peso es obligatorio.";
            else{
                if(floatval($tmp_peso) < 0.1 || floatval($tmp_peso) > 999.99) $err_peso = "El peso debe estar entre 0,1 y 999,99.";
                else{
                    $patron = "/^[0-9.,]+$/";
                    if (!preg_match($patron, $tmp_peso)) $err_peso = "Solo puedes introducir números enteros o decimales con el punto o coma.";
                    else $peso = $tmp_peso;
                }
            }

            if ($tmp_genero == "") $genero = "Desconocido.";
            else{
                $generos_validos = ["Hembra", "Macho"];
                if(!in_array($tmp_genero, $generos_validos)) $err_genero = "Escoja un género válido.";
                else $genero = $tmp_genero;
            }

            if ($tmp_tipo == "" || $tmp_tipo == "Tipo") $err_tipo = "El tipo es obligatorio.";
            else{
                $tipos_validos = ["Agua", "Fuego", "Volador", "Planta", "Eléctrico"];
                if(!in_array($tmp_tipo, $tipos_validos)) $err_tipo = "Introduce un tipo válido.";
                else $tipo = $tmp_tipo;
            }

            if($tmp_fecha_captura == ""){
                $err_fecha_captura = "La fecha de captura es obligatoria";
            } else{
                $patron = "/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/";
                if(!preg_match($patron, $tmp_fecha_captura)){
                    $err_fecha_captura= "El formato de la fecha es incorrecto.";
                }else{
                    list($anno, $mes, $dia) = explode('-', $tmp_fecha_captura);
                    $anno_actual = date("Y");
                    $mes_actual = date("m");
                    $dia_actual = date("d");
                    
                    if ($anno > $anno_actual) $err_fecha_captura = "La fecha de captura no puede ser a partir de hoy.";
                    elseif ($anno < $anno_actual){
                        if ($anno_actual - $anno > 30) $err_fecha_captura = "No puedes ingresar una fecha mayor a 30 años.";
                        elseif ($anno_actual - $anno < 30) $fecha_captura = $tmp_fecha_captura;
                        elseif($anno_actual - $anno == 30){
                            if ($mes - $mes_actual > 0) $fecha_captura = $tmp_fecha_captura;
                            elseif ($mes - $mes_actual < 0) $err_fecha_captura = "No puedes ingresar una fecha mayor a 30 años.";
                            else{
                                if ($dia - $dia_actual >= 0) $fecha_captura = $tmp_fecha_captura;
                                else $err_fecha_captura = "No puedes ingresar una fecha mayor a 30 años.";
                            }
                        }
                        else{
                            if ($mes - $mes_actual < 0) $fecha_captura = $tmp_fecha_captura;
                            elseif ($mes - $mes_actual > 0) $err_fecha_captura = "La fecha de captura no puede ser a partir de hoy.";
                            else{
                                if ($dia - $dia_actual <= 0) $fecha_captura = $tmp_fecha_captura;
                                else $err_fecha_captura = "La fecha de captura no puede ser a partir de hoy.";
                            }
                        }
                    }
                }  
            }
            if($tmp_descripcion != ""){
                if(strlen($tmp_descripcion) > 200){
                    $err_descripcion = "La descripcion no puede tener mas de 200 caracteres";
                }else{
                    $patron = "/^[a-zA-Záéíóúñ ]+$/";
                    if(!preg_match($patron, $tmp_descripcion)) {
                        $err_descripcion = "El nombre solo puede contener letras con o sin tilde, ñ y espacios en blanco.";
                    }else $descripcion = $tmp_descripcion;
                }
            }
            
        }
    ?>
    <h1>Pokemons</h1>
    <form action="" method="post">
        <label>Nombre</label><br>
        <input type="text" name="nombre">
        <?php
            if (isset($err_nombre)) echo "<span class='error'>$err_nombre</span>";
        ?>
        <br><br>
        <label>Peso</label><br>
        <input type="text" name="peso">
        <?php
            if (isset($err_peso)) echo "<span class='error'>$err_peso</span>";
        ?>
        <br><br>
        <label>Género</label><br>
        <input type="radio" name="genero" value="Hembra">
        <label>Hembra</label>
        <input type="radio" name="genero" value="Macho">
        <label>Macho</label>
        <?php
            if (isset($err_genero)) echo "<span class='error'>$err_genero</span>";
        ?>
        <br><br>
        <label>Tipo</label>
        <select name="tipo">
            <option value="Agua">Agua</option>
            <option value="Fuego">Fuego</option>
            <option value="Volador">Volador</option>
            <option value="Planta">Planta</option>
            <option value="Eléctrico">Eléctrico</option>
            <option value="Tipo" selected>Tipo</option>
        </select>
        <?php
            if (isset($err_tipo)) echo "<span class='error'>$err_tipo</span>";
        ?>
        <br><br>
        <label>Fecha de captura</label>
        <input type="date" name="fecha_captura">
        <?php
            if (isset($err_fecha_captura)) echo "<span class='error'>$err_fecha_captura</span>";
        ?>
        <br><br>
        <label>Descripcion</label><br>
            <textarea name="descripcion"></textarea>
            <?php 
                if (isset($err_descripcion)) echo "<span class='error'>$err_descripcion</span>";
            ?>
        <br><br>
        <input type="submit" value="Enviar">
        <?php
            if (isset($nombre) && isset($peso) && isset($tipo) && isset($fecha_captura)){
                echo "<h2>Nombre: $nombre</h2>";
                echo "<h2>Peso: $peso</h2>";
                echo "<h2>Género: $genero</h2>";
                echo "<h2>Tipo: $tipo</h2>";
                echo "<h2>Fecha de captura: $fecha_captura</h2>";
                if ($descripcion == "") $descripcion = "No hay descripción.";
                echo "<h2>Descripcion: $descripcion</h2>";
            }
        ?>
    </form>
</body>
</html>