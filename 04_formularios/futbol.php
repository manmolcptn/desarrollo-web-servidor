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
    <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $tmp_equipo = $_POST["equipo"];
            $tmp_iniciales = $_POST["iniciales"];
            if (isset($_POST["liga"])) $tmp_liga = $_POST["liga"];
            else $tmp_liga = "";
            $tmp_numero_jugadores = $_POST["numero_jugadores"];
            $tmp_fecha_fundacion = $_POST["fecha_fundacion"];

            if ($tmp_equipo == "") $err_equipo = "El nombre del equipo es obligatorio";
            else{
                if (strlen($tmp_equipo) < 3 || strlen($tmp_equipo) > 20) $err_equipo = "El nombre del equipo debe ser entre 3 y 20 caractéres.";
                else{
                    $patron = "/^[a-zA-Z. ]+$/";
                    if (!preg_match($patron, $tmp_equipo)) $err_equipo = "El nombre del equipo solo puede contener letras, espacios en blanco y puntos.";
                    else{
                        $equipo = $tmp_equipo;
                    }
                }
            }

            if ($tmp_iniciales == "") $err_iniciales = "Las iniciales son obligatorias";
            else{
                if(strlen($tmp_iniciales) != 3) $err_iniciales = "Solo pueden ser 3 caractéres.";
                else{
                    $patron = "/^[A-Z]$+/";
                    if (!preg_match($patron, $tmp_iniciales)) $err_equipo = "Sólo puede contener letras";
                    else $iniciales = $tmp_iniciales;
                }
            }

            if ($tmp_liga == "") $err_liga = "La liga es obligatoria.";
            else{
                $ligas_validas = ["Liga EA Sports", "Liga HyperMotion", "Primera RFEF"];
                if (!in_array($tmp_liga, $ligas_validas)) $err_liga = "Escoja una liga válida";
                else $liga = $tmp_liga;
            }

            if ($tmp_numero_jugadores == "") $err_numero_jugadores = "El número de jugadores es obligatorio.";
            else{
                $patron = "/^[0-9]{2}$/";
                if(!preg_match($patron, $tmp_numero_jugadores)) $err_numero_jugadores = "El número solo puede tener 2 cifras";
                else{
                    if (intval($tmp_numero_jugadores) < 26 || intval($tmp_numero_jugadores) > 32) $err_numero_jugadores = "Los jugadores deben ser entre 26 y 32.";
                    else $numero_jugadores = $tmp_numero_jugadores;
                }
                
            }

            if ($tmp_fecha_fundacion == "") $err_fecha_fundacion = "La fecha de fundación es obligatoria.";
            else{
                $patron = "/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/";
                if(!preg_match($patron, $tmp_fecha_fundacion)) $err_fecha_fundacion = "El formato introducido no es válido.";
                else{
                    list($anno, $mes, $dia) = explode('-', $tmp_fecha_fundacion);
                    $anno_actual = date("Y");
                    $mes_actual = date("m");
                    $dia_actual = date("d");
                    $anno_max = 1889;
                    $mes_max = 12;
                    $dia_max = 18;

                    //18 diciembre
                    if($anno > $anno_max) $fecha_fundacion = $tmp_fecha_fundacion;
                    elseif ($anno < $anno_max) $err_fecha_fundacion = "La fecha máxima es 18 de Diciembre de 1889";
                    else{
                        if ($mes < $mes_max) $fecha_fundacion = $tmp_fecha_fundacion;
                        elseif($mes > $mes_max) $err_fecha_fundacion = "La fecha máxima es 18 de Diciembre de 1889";
                        else{
                            /* if($dia <= $dia_max) */
                        }
                    }
                }
            }

        }
    ?>
    <div class="container">
        <h1>Formulario de Fútbol</h1>
        <form class="col-6" method="post" action="">
            <div class="mb-3">
                <label class="form-label">Equipo</label>
                <input class="form-control" type="text" name="equipo">
                <?php 
                    if (isset($err_equipo)) echo "<span class='error'>$err_equipo</span>";
                ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Iniciales</label>
                <input class="form-control" name="iniciales"></input>
                <?php 
                    if (isset($err_iniciales)) echo "<span class='error'>$err_iniciales</span>";
                ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Escoja una liga:</label>
                <br>
                <select name="liga">
                    <option value="Liga EA Sports">Liga EA Sports</option>
                    <option value="Liga Hypermotion">Liga Hypermotion</option>
                    <option value="Primera RFEF">Primera RFEF</option>
                </select>
                <?php 
                    if (isset($err_liga)) echo "<span class='error'>$err_liga</span>";
                ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Número de jugadores</label>
                <input class="form-control" name="numero_jugadores" type="number"></input>
                <?php 
                    if (isset($err_numero_jugadores)) echo "<span class='error'>$err_numero_jugadores</span>";
                ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Fecha de fundación</label>
                <input class="form-control" name="fecha" type="date"></input>
                <?php 
                    if (isset($err_fecha_fundacion)) echo "<span class='error'>$err_fecha_fundacion</span>";
                ?>
            </div>
        </form>
    </div>
</body>
</html>