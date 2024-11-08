<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios 1</title>
</head>
<body>
    <?php
    /**
     * EJERCICIO 1
     * 
     * Calcula la suma de todos los números pares del 0 al 20
     */
    $suma = 0;
	for ($i = 0; $i <=20; $i++){
		if ($i % 2 == 0) $suma += $i;
	}
	echo "<h3>Ejercicio 1: La suma total es $suma</h3>"

    ?>

    <?php
    /**
     * EJERCICIO 2
     * 
     * (Hay que investigar un poco)
     *
     * Muestra por pantalla la fecha actual con el siguiente formato:
     * "Miércoles 25 de septiembre de 2024"
     *
     */

     $dia = date("l");
     $dia = match($dia){
         "Monday" => "Lunes",
         "Tuesday" => "Martes",
         "Wednesday" => "Miércoles",
         "Thursday" => "Jueves",
         "Friday" => "Viernes",
         "Saturday" => "Sábado",
         "Sunday" => "Domingo"
     };
     
     $numero = date("j");
     
     $mes = date("F");
     $mes = match($mes){
         "January" => "Enero",
         "February" => "Febrero",
         "March" => "Marzo",
         "April" => "Abril",
         "May" => "Mayo", 
         "June" => "Junio",
         "July" => "Julio",
         "August" => "Agosto",
         "September" => "September",
         "October" => "Octubre",
         "November" => "Noviembre",
         "December" => "Diciembre"
     };
     $anio = date("Y");
     echo "<h3>Ejercicio 2: $dia $numero de $mes de $anio</h3>"
    ?>

    <?php
    /**
     * MUESTRA POR PANTALLA LOS 50 PRIMEROS NÚMEROS PRIMOS
     * 
     * UN NÚMERO ES PRIMO CUANDO SUS ÚNICOS DIVISORES SON 1 Y ÉL MISMO
     */


    $num = 2;
	$esPrimo = TRUE;
    $contador = 0;
    while ($contador <= 50){
        for($i = 2; $i < $num && $esPrimo ; $i++){
            if ($num % $i == 0){
                $esPrimo = FALSE;
            }
        }
        if ($esPrimo){
            echo "$num ";
            $contador++;
        }
        $esPrimo = TRUE;
        $num++;
    }
	


    

    //  CALCULAR EL FIBONACCI DE LOS 10 PRIMEROS NÚMEROS PRIMOS
    //  FIB(0) = 0      FIB(4) = 3      FIB(13) = ¿?
    //  FIB(1) = 1      FIB(5) = 5
    //  FIB(2) = 1      FIB(6) = 8
    //  FIB(3) = 2      FIB(7) = 13
    ?>  
</body>
</html>