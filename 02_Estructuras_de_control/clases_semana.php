<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clases de la semana</title>
    <?php
    //  Activamos los errores de PHP
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <?php    
    /*
    switch($dia) {
        case "Tuesday":
        case "Wednesday":
        case "Friday": 
            echo "<p>Hoy $dia sí hay clases de web servidor</p>";
            break;
        default:
            echo "<p>Hoy $dia no hay clases de web servidor</p>";
            break;
    }
    */

    /*
        1 - CREAR UN SWITCH QUE SEGÚN EL DÍA EN QUE ESTEMOS, ALMACENE EN
            UNA VARIABLE EL DÍA EN ESPAÑOL

        2 - REESCRIBIR EL SWITCH DE LA ASIGNATURA CON LOS DÍAS EN 
            ESPAÑOL
    */

    /* $dia_espanol = null;

    switch($dia) {
        case "Monday":
            $dia_espanol = "Lunes";
            break;
        case "Tuesday":
            $dia_espanol = "Martes";
            break;
        case "Wednesday":
            $dia_espanol = "Miércoles";
            break;
        case "Thursday":
            $dia_espanol = "Jueves";
            break;
        case "Friday":
            $dia_espanol = "Viernes";
            break;
        case "Saturday":
            $dia_espanol = "Sábado";
            break;
        case "Sunday":
            $dia_espanol = "Domingo";
            break;
    } */

    //  ESTRUCTURA MATCH PHP >= 8.0

    /* $resultado = match($dia_espanol) {
        "Martes",
        "Miércoles",
        "Jueves" => "<p>Hoy $dia_espanol sí tenemos clase de web servidor</p>",
        default => "<p>Hoy $dia_espanol no tenemos clase de web servidor</p>"
    }; */

    $dia = date("l");

	$dia_espanol = null;
	switch($dia){
		case "Monday":
			$dia_espanol = "Lunes";
			break;
		case "Tuesday":
			$dia_espanol = "Martes";
			break;
		case "Wednesday":
			$dia_espanol = "Miércoles";
			break;
		case "Thursday":
			$dia_espanol = "Jueves";
			break;
		case "Friday":
			$dia_espanol = "Viernes";
			break;
		case "Saturday":
			$dia_espanol = "Sábado";
			break;
		case "Sunday":
			$dia_espanol = "Domingo";
			break;
	}

	$result = match($dia_espanol){
		"Martes",
		"Miercoles",
		"Viernes" => "<p>Hoy es $dia_espanol y sí tenemos clase de Servidor</p>",
		default => "<p>Hoy es $dia_espanol y no tenemos clase de Servidor</p>"
	};

	echo $result;
    ?>
</body>
</html>