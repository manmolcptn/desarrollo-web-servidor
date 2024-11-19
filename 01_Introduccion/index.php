<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <?php
        //  Activamos los errores de PHP
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <?php
    //Define se usa para definir constantes
    define("EDAD",25);

    $var = "hola mundo";
    //echo $var;
    //var_dump es como un echo pero mucho mas detallado 
    var_dump($var); 
    
    
    $var = 3;
    var_dump($var);

    echo EDAD;

    echo "<br>";

    echo "<h2 style='color: orange'>La variable es $var</h2>";

    $frase1 = "hola";
    $frase2 = "mundo";

    echo "<p>$frase1 $frase2</p>";

    echo $frase1 . $frase2;
    ?>
</body>
</html>