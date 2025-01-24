<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Anime</title>
</head>
<body>
    <?php 
        $url = "https://api.jikan.moe/v4/top/anime";
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
        /* print_r($animes); */
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
                <td><a href="myAnimeList.php?mal_id=<?php echo $anime["mal_id"]?>"><?php echo $anime["title"] ?></a></td>
                <td><?php echo $anime["score"] ?></td>
                <td>
                    <img src="<?php echo $anime["images"]["jpg"]["small_image_url"] ?>" alt="">
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</body>
</html>