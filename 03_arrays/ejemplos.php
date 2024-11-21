<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplos</title>
    <link href="estilos.css" rel="stylesheet" type="text/css">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <?php
    /* $frutas = array(
        "clave 1" => "Manzana",
        'clave 2' => 'Naranja',
        'clave 3' => "Cereza"
    ); */

    //echo $frutas["clave 4"];
    //echo "<br>";

    /* $numeros1 = [1,2,3,4,5];
    $numeros2 = ["1","2","3","4","5"];

    if($numeros1 === $numeros2) {
        echo "<h3>Los arrays de números son iguales</h3>";
    } else {
        echo "<h3>Los arrays de números NO iguales</h3>";
    }

    $frutas = [
        "Manzana",
        "Naranja",
        "Cereza",
    ]; */

    /* $frutas1 = [
        "Cereza",
        "Naranja",
        "Manzana",
    ];

    $frutas2 = [
        0 => "Naranja",
        1 => "Manzana",
        2 => "Cereza"
    ];

    $frutas3 = [
        1 => "Manzana",
        0 => "Naranja",
        2 => "Cereza"
    ];

    if($frutas == $frutas3) {
        echo "<h3>Los arrays de frutas son iguales</h3>";
    } else {
        echo "<h3>Los arrays de frutas no son iguales</h3>";
    }

    echo "<h3>Mis frutas con FOR</h3>";
    echo "<ol>";
	for ($i = 0; $i<count($frutas); $i++){
		echo "<li>$frutas[$i]</li>";
	}
	echo "</ol>";

    echo "<h3>Mis frutas con WHILE</h3>";
    echo "<ol>";
    $i = 0;
    while($i < count($frutas)) {
        echo "<li>" . $frutas[$i] . "</li>";    //  3N
        $i++;
    }
    echo "</ol>"; */

   /*  echo "<h3>Mis frutas con FOREACH</h3>";
    echo "<ol>";
    foreach($frutas as $fruta) {
        echo "<li>$fruta</li>";
    }
    echo "</ol>"; */

    /* echo "<h3>Mis frutas con FOREACH con claves</h3>";
    echo "<ol>";
    foreach($frutas as $clave => $fruta) {
        echo "<li>$clave, $fruta</li>";
    }
    echo "</ol>";

    array_push($frutas, "Mango", "Melocotón");
    $frutas[] = "Sandía";
    $frutas[] = "Uva";
    $frutas[] = "Melón";

    
    
    $frutas = array_values($frutas);
    unset($frutas[1]);

    print_r($frutas); */

    /*
        CREAR UN ARRAY CON UNA LISTA DE PERSONAS DONDE LA CLAVE SEA
        EL DNI Y EL VALOR EL NOMBRE

        QUE HAYA MINIMO 3 PERSONAS

        MOSTRAR EL ARRAY COMPLETO CON PRINT_R Y A ALGUNA PERSONA INDIVIDUAL

        AÑADIR ELEMENTOS CON Y SIN CLAVE

        BORRAR ALGUN ELEMENTO

        PROBAR A RESETAR LAS CLAVES
    */
    $personas = [
        "77137925L" => "Migue",
        "24454544D" => "Enya",
        "23872823C" => "Jose"
    ];

    echo "<p>" . $personas["77137925L"] . "</p>";

    $tamano = count($personas);
    echo "<h3>$tamano</h3>";
    //Añadir con y sin clave
    array_push($personas, "Juan");
    $personas["77123456D"]= "Migue";

    //Eliminar elemento
    unset($personas[0]);

    foreach($personas as $persona){
        echo "<h3>$persona</h3>";
    }
    ?>
    <!-- <table>
        <thead>
            <tr>
                <th>DNI</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($personas as $dni => $nombre) {
                echo "<tr>";
                echo "<td>$dni</td>";
                echo "<td>$nombre</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <br><br><br><br> -->
    
    <?php
    $personas["00112211A"] = "Paquito de la Torre";
    $personas["22110044B"] = "Paco Fiesta";
    //sort($personas); Ordena en orden ascendente
    //rsort($personas); Ordena en orden descendente
    //asort($personas); Ordena en orden ascendente manteniendo la asociacion del index.
    //arsort($personas); Ordena en orden descendente manteniendo la asociacion del index.
    //ksort($personas); Ordena el array por sus claves en orden ascendente.
    krsort($personas);  //Ordena el array por sus claves en orden descendente.
    ?>
    <table>
        <thead>
            <tr>
                <th>DNI</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($personas as $dni => $persona){ ?>
                <tr>
                    <td><?php echo $dni; ?></td>
                    <td><?php echo $persona; ?></td>
                </tr>
            <?php }
            ?>
        </tbody>
    </table>

    <!--
                Desarrollo web servidor => Alejandra
                Desarrollo web cliente => Jaime
                Diseño de interfaces => José
                Despliegue de aplicaciones web => Alejandro
                Empresa e inciativa emprendedora => Gloria
                Inglés => Virginia

                MOSTRAR EN UNA TABLA LAS ASIGNATURAS Y SUS RESPECTIVOS PROFESORES

                LUEGO:

                MOSTRAR UNA TABLA ADICIONAL ORDENADA POR LA ASIGNATURA EN ORDEN ALFABETICO

                MOSTRAR UNA TABLA ADICIONAL ORDENADA POR LOS PROFESORES EN ORDEN
                ALFABETICO INVERSO
    -->
    <?php
    $profesores = [
        "Desarrollo web servidor" => "Alejandra",
        "Desarrollo web cliente" => "Jaime",
        "Diseño de interfaces" => "José",
        "Despliegue de aplicaciones web" => "Alejandro",
        "Empresa e inciativa emprendedora" => "Gloria",
        "Inglés" => "Virginia"
    ]
    ?>
    <br><br><br>
    <table>
        <caption>Tabla normal </caption>
        <thead>
            <tr>
                <th>Asignatura</th>
                <th>Profesor</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach ($profesores as $asignatura => $profesor){ ?>
                <tr>
                    <td><?php echo "$asignatura"?></td>
                    <td><?php echo "$profesor"?></td>
                </tr>
            <?php }
            ?>
        </tbody>
    </table>
    <br><br><br>
    <table>
        <caption>Tabla por asignaturas en orden alfabetico </caption>
        <thead>
            <tr>
                <th>Asignatura</th>
                <th>Profesor</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            ksort($profesores);
            foreach ($profesores as $asignatura => $profesor){ ?>
                <tr>
                    <td><?php echo "$asignatura"?></td>
                    <td><?php echo "$profesor"?></td>
                </tr>
            <?php }
            ?>
        </tbody>
    </table>
    <br><br><br>
    <table>
        <caption>Tabla por profesores en orden alfabetico inverso</caption>
        <thead>
            <tr>
                <th>Asignatura</th>
                <th>Profesor</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            arsort($profesores);
            foreach ($profesores as $asignatura => $profesor){ ?>
                <tr>
                    <td><?php echo "$asignatura"?></td>
                    <td><?php echo "$profesor"?></td>
                </tr>
            <?php }
            ?>
        </tbody>
    </table>

    <!--
                Guillermo => 3      SUSPENSO
                Daiana => 5         APROBADO
                Ángel => 8          APROBADO
                Ayyoub => 7         APROBADO
                Mateo => 9          APROBADO
                Joaquín => 4        SUSPENSO

                DESPUES

                SI NOTA < 5 -> SUSPENSO
                SI NOTA < 7 -> APROBADO
                SI NOTA < 9 -> NOTABLE
                SI NOTA <= 10 -> SOBRESALIENTE

                ¡Y ADEMAS!  SI EL ALUMNO HA APROBADO, QUE SU FILA ESTÉ VERDE
                            SI EL ALUMNO HA SUSPENDIDO, QUE SU FILA ESTÉ ROJA


    -->
    <br>
    <?php
    $estudiantes = [
        "Guillermo" => 3,   
        "Daiana" => 5,
        "Ángel" => 8,
        "Ayyoub" => 7,     
        "Mateo" => 9,  
        "Joaquín" => 4        
    ];
    ?>
    <table>
        <caption>Tabla de alumnos</caption>
        <thead>
            <th>Alumnos</th>
            <th>Notas</th>
            <th>Calificación</th>
        </thead>
        <tbody>
        <?php
            foreach ($estudiantes as $estudiante => $nota){ ?>
                <tr bgcolor="<?php if($nota < 5 ) echo "red"; else echo "green"?>">
                    <td><?php echo $estudiante?></td>
                    <td><?php echo $nota?></td>
                    <td>
                        <?php 
                            if ($nota < 5){
                                echo "Suspenso";
                            } elseif ($nota < 7){
                                echo "Aprobado";
                            }elseif ($nota < 9){
                                echo "Notable";
                            }elseif($nota <=10){
                                echo "Sobresaliente";
                            }
                        ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>