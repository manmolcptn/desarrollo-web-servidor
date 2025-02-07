<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dragon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
    

    body {
        background-color: #212529;
    }

    .title {
        color: #F4D03F;
        transition: all 300ms;
        font-size: 44px;
    }

    .title:hover {
        color: #F4D03F;
        text-shadow: #FC0 1px 0 10px;
        cursor: default;
    }

    .subtitle {
        color: #F4D03F;
        font-size: 54px;
    }
    </style>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 ); 
    ?>
</head>

<body>
    <?php
            if(isset($_GET["page"])) $page = $_GET["page"];
            else $page = 1;

            if(isset($_GET["limit"])) {
                $cantidad = $_GET["limit"];
                $url = "https://dragonball-api.com/api/characters?limit=$cantidad&page=$page";
            }
            else {
                $cantidad = 5;
                $url = "https://dragonball-api.com/api/characters?limit=$cantidad";
            }

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
            $personajes = $datos["items"];
    ?>
    <nav class="navbar bg-dark border-bottom border-body ">
        <div class="container-fluid">
            <a class="navbar-brand title">Dragon Ball</a>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-warning" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <form action="" method="get" class="form-control mt-5 text-center">
                ¿Cuantos personajes deseas ver? <input type="text" name="limit">
                <input type="submit" value="Enviar">
            </form>
        </div>
        <div class="row mt-3">
            <h1 class="text-center subtitle mt-3">Personajes</h1>
        </div>
        <table class="table table-dark mt-3 border-less text-center align-middle">
            <thead>
                <tr>
                    <th class="col-3">Nombre</th>
                    <th class="col-3">Raza</th>
                    <th class="col-3">Género</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $contador = 0;
                    foreach($personajes as $personaje){ ?>
                <tr>
                    
                    <td><a href="personaje.php?id=<?php echo $personaje["id"]?>"><?php echo $personaje["name"]?></a></td>
                    <td><?php echo $personaje["race"]?></td>
                    <td><?php echo $personaje["gender"]?></td>
                </tr>
                <?php } ?>

            </tbody>
        </table>

        <?php
                $siguiente = $page + 1;
                $anterior = $page - 1;
                $inicio = 1;
                $paginas_totales = intval(58/$cantidad);
                if(58%$cantidad > 0) $paginas_totales += 1;

            
            ?>
                <?php if($page >= 1 && $page < $paginas_totales-2){?>
                <a class="btn btn-warning col-1 mb-5 float-end" href="index.php?page=<?php echo $paginas_totales?>&limit=<?php echo $cantidad?>">Final</a>
                <?php }?>
                <?php if($page >= 1 && $page < $paginas_totales){?>
                    <a class="btn btn-warning col-1 me-3 mb-5 float-end" href="index.php?page=<?php echo $siguiente?>&limit=<?php echo $cantidad?>">Siguiente</a>
                <?php } ?>
                <?php if($page > 1 && $page <= $paginas_totales + 1){?>
                    <a class="btn btn-warning col-1 ms-3 mb-5 " href="index.php?page=<?php echo $anterior?>&limit=<?php echo $cantidad?>">Anterior</a>
                <?php }if($page > 2 && $page <= $paginas_totales + 1 ){?>
                <a class="btn btn-warning col-1 float-start mb-5" href="index.php?page=<?php echo $inicio?>&limit=<?php echo $cantidad?>">Inicio</a>
                <?php }?>
            
    </div>
</body>

</html>