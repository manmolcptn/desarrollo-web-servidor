<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--
        CREAR CON NÚMEROS A VUESTRA ELECCIÓN

        MOSTRAR DICHOS NÚMEROS DE LA FORMA QUE MÁS OS GUSTE

        CREAR UN FORMULARIO DONDE SE INTENTE INTRODUCIR EL MÁXIMO VALOR Y SE
        COMPRUEBE SI HAS ACERTADO
    -->
    <?php
    $numeros = [1,5,3,9,20,15,22,11];

    for($i = 0; $i < count($numeros); $i++) {
        echo "$numeros[$i] ";
    }
    ?>
    <br><br>
    <form action="" method="post">
        <label for="numero">Máximo</label>
        <input type="text" name="numero" id="numero" placeholder="Introduce el máximo">
        <br><br>
        <input type="submit" value="Comprobar">
    </form>

    <?php
    //Si el método es post hacemos los siguiente
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        //guardamos en número lo que hay en el array de post 
        //con la clave número
        $numero = $_POST["numero"];
        //Escogemos candidato
        $candidato = $numeros[0];

        for($i = 0; $i < count($numeros); $i++){
            if ($numeros[$i] > $candidato) $candidato = $numeros[$i];
        }
        $maximo = $candidato;

        if ($numero == $maximo){
            echo "<h1>Has acertado!!El máximo es $maximo </h1>";
        } else{
            echo "<h1>Fallaste el número!!!El máximo es $maximo </h1>";
        }
    }
    ?>
</body>
</html>