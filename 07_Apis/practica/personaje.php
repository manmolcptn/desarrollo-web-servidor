<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personaje</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php 
        error_reporting(E_ALL);
        ini_set ("display_errors", 1);

    ?>
</head>
<body>
    <?php
        $id = $_GET["id"];
        $url = "https://dragonball-api.com/api/characters/$id";
        
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
    ?>
    <div class="container">
        <h1 class="text-center"><?php echo $datos["name"]?></h1>
        <div class="row mb-5">
            <div class="col">
                <h2>Raza</h2>
                <p><?php echo $datos["race"]?></p>
            </div>
            <div class="col">
                <h2>Género</h2>
                <p><?php echo $datos["gender"]?></p>
            </div>
       </div>
       <div class="row">
            <div class="col-6">
                <img style="width: 200px" src="<?php echo $datos["image"]?>" alt="">
            </div>
            <div class="col-6">
                <h2>Descripcion</h2>
                <p><?php echo $datos["description"]?></p>
            </div>
       </div>
       <div class="row">
            <div class="text-center">
                <h2>Transformaciones</h2>
                <table class="table table-dark col-12">
                    <thead>
                        <th>Nombre</th>
                        <th>Imagen</th>
                    </thead>
                    <tbody>
                    <?php 
                        $transformaciones = $datos["transformations"];
                        foreach($transformaciones as $transformacion){ ?>
                            <tr>
                                <td class="col-6"><?php echo $transformacion["name"]?></td>
                                <td class="col-6"><img style="width: 100px" src="<?php echo $transformacion["image"]?>" alt="" srcset=""></td>
                            </tr>
                        <?php }
                    ?>
                    </tbody> 
                </table>
            </div>
       </div>
       <div class="row">
        <a class="btn btn-primary col-1 mb-3" href="index.php">Volver</a>
       </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>