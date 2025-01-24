<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anime</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php 
        error_reporting(E_ALL);
        ini_set ("display_errors", 1);
    ?>
</head>
<body>
    <?php 
        $url = "https://api.jikan.moe/v4/anime/";
        if(isset($_GET["mal_id"])){
            $mal_id = $_GET["mal_id"];
            $url = $url . $mal_id;
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
        $anime = $datos["data"];
    ?>
    <div class="container">
        <h1><?php echo $anime["title"]?></h1>
        <div class="row">
            <div class="col">
                <img src="<?php echo $anime["images"]["jpg"]["large_image_url"] ?>" alt="">
            </div>
            <div class="col">
                <h2>Sinopsis</h2>
                <p><?php echo $anime["synopsis"]?></p>
            </div>
       </div>
       <div class="row">
            <div class="col-6">
                <h2>Año</h2>
                <p><?php echo $anime["year"]?></p>
            </div>
            <div class="col-6">
                <h2>Video</h2>
                <iframe src="<?php echo $anime["trailer"]["embed_url"]?>"></iframe>
            </div>
       </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>