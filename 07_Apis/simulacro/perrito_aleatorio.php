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
    <?php 
        if(isset($_GET["otro"])) $url = "https://dog.ceo/api/breeds/image/random";
        
        $url = "https://dog.ceo/api/breeds/image/random";

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
        $message = $datos["message"];

    ?>
        <h1>Perrito Random</h1>
        <div>
            <img style="max-width: 500px;" src="<?php echo $message?>" alt="">
        </div>
        <form action="" method="get">
            <input type="submit" value="Otro" name="otro">
        </form>
    </div>
</body>
</html>