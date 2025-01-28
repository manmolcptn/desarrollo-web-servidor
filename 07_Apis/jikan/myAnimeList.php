<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anime</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 ); 
    ?>
</head>
<body>
    <form action="" method="get">
        <input type="radio" name="type" value="tv">TV
        <input type="radio" name="type" value="movie">Movie
        <input type="radio" name="type" value="">Todos
        <input type="submit" value="Enviar">
    </form>
    <?php 
        
        if(isset($_GET["type"])) {
            $tipo = $_GET["type"];

        } elseif(!isset($_GET["type"])) {
            $tipo = "";

        }
        /*Esto es para la paginación pero no funciona*/
        if(isset($_GET["page"])){
            if($_GET["page"] == "Siguente >"){
                $page = 0;
            }else if($_GET["page"] == "Anterior <"){
                $page = $page -1;
            }
        }

        if(isset($tipo)) $url = "https://api.jikan.moe/v4/top/anime?type=$tipo";
        elseif(isset($page)) $url = "https://api.jikan.moe/v4/top/anime?page=$page";
            
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
        $animes = $datos["data"];

    ?>
    <table>
        <thead>
            <th>Titulo</th>
            <th>Valoración</th>
            <th>Imagen</th>
        </thead>
        <tbody>
        <?php
            foreach($animes as $anime){ ?>
            <tr>
                <td><a href="anime.php?mal_id=<?php echo $anime["mal_id"]?>"><?php echo $anime["title"] ?></a></td>
                <td><?php echo $anime["score"] ?></td>
                <td>
                    <img src="<?php echo $anime["images"]["jpg"]["image_url"] ?>" alt="">
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <form action="" method="GET">
            <!--He intentado hacer la paginación pero yendo a contrarreloj no he podido xd-->
        <?php 
            if(isset($page)){
                if($page > 1 && $page != ""){ 
                   echo  "<input type='submit' name='page' value='Anterior <'>";
                }
            }
        ?>
        <input type="submit" name="page" value ="Siguiente >">
    </form>
    
</body>
</html>