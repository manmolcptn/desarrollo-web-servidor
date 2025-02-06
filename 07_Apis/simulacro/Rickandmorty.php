<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RickAndMorty</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 ); 
    ?>
</head>
<body>
    <div class="container">
    <form action="" method="get">
        <input type="radio" name="gender" value="Male">Male
        <input type="radio" name="gender" value="Female">Female
        <input type="radio" name="species" value="Human">Human
        <input type="radio" name="species" value="Alien">Alien
        <br><br>Number
        <input type="text" name="number" value="">
        <input type="submit" value="Enviar">
    </form>
    <?php 

        if(isset($_GET["gender"])) $gender = $_GET["gender"];
        else $gender = "";

        if(isset($_GET["species"])) $species = $_GET["species"];
        else $species = "";

        if(isset($_GET["number"])) $numero = (int)$_GET["number"];
        else $numero = "";

        if($gender != "" && $species != "") $url = "https://rickandmortyapi.com/api/character/?gender=$gender&species=$species";
        elseif($gender != "") $url = "https://rickandmortyapi.com/api/character/?gender=$gender";
        elseif($species != "") $url = "https://rickandmortyapi.com/api/character/?species=$species";
        else $url = "https://rickandmortyapi.com/api/character";
        
        
        $numeroTotal = 0;
        /* print_r($numero, $numeroTotal); */

        //Iniciamos el curl
        $curl = curl_init();
        //pasamos la URL
        curl_setopt($curl, CURLOPT_URL, $url);
        //Le decimos que nos devuelva lo que haya 
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        //Ejecutalo
        $respuesta = curl_exec($curl);
        //cierra
        curl_close($curl);

        $datos = json_decode($respuesta, true);
        $characters = $datos["results"];

    ?>
    <table class="table">
        <thead>
            <th class="p-3">Número</th>
            <th class="p-3">Nombre</th>
            <th class="p-3">Género</th>
            <th class="p-3">Especie</th>
            <th class="p-3">Origen</th>
            <th class="p-3">Imagen</th>
        </thead>
        <tbody>
        <?php
            foreach($characters as $character){ 
                $numeroTotal = $numeroTotal + 1; ?>
            <tr class="table-light">
                <td><?php echo $numeroTotal?></td>
                <td><?php echo $character["name"] ?></td>
                <td><?php echo $character["gender"] ?></td>
                <td><?php echo $character["species"] ?></td>
                <td><?php echo $character["origin"]["name"] ?></td>
                <td>
                    <img src="<?php echo $character["image"]?>" alt="">
                </td>
            </tr>
            <?php if($numero != "" && $numero == $numeroTotal) break; ?>
        <?php } ?>
        </tbody>
    </table>
    </div>
</body>
</html>