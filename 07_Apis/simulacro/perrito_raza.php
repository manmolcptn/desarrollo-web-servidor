<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perros Raza</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 ); 
    ?>
</head>
<body>
    <?php 
        $url = "https://dog.ceo/api/breeds/list/all";

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
        $dogs = $datos["message"];
    ?>
    <div class="container">
    <form action="" method="get">
        <select name="razas" id="">
            <?php foreach($dogs as $dog => $breeds){ ?>
                <option value="<?php echo $dog ?>"> <?php echo ucwords($dog) ?> </option>
                <?php foreach($breeds as $subBreed){?>
                    <option value="<?php echo $dog . "/" . $subBreed; ?>"><?php echo ucwords($dog) . " " . ucwords($subBreed) ?></option>
                    <?php } ?>
                <?php } ?>
        </select>
        <input type="submit" value="Enviar">
    </form>
    <?php 
        
        if($_SERVER["REQUEST_METHOD"] =="GET"){
            if(isset($_GET["razas"])){
                $razas = $_GET["razas"];
                $url = "https://dog.ceo/api/breed/$razas/images/random";
            }
        
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
        }
    ?>
    <h1>Perrito Random</h1>
        <div>
            <?php 
            if(!is_array($message)){
                echo "<img style='max-width: 500px;' src='$message' alt=''>";
            }?> 
        </div>
    </div>
</body>
</html>