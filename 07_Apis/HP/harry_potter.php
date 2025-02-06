<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anime</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
    @font-face {
        font-family: "Harry Potter";
        src: url("./fonts/HARRYP__.TTF");
    }

    body {
        background-color: #212529;
    }

    .title {
        font-family: "Harry Potter";
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
        font-family: "Harry Potter";
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

            if($page < 1 || $page > 3) $page = 1;
            
            $url = "https://potterapi-fedeperin.vercel.app/es/characters?max=10&page=$page";
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
    ?>
    <nav class="navbar bg-dark border-bottom border-body ">
        <div class="container-fluid">
            <a class="navbar-brand title">Harry Potter</a>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-warning" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <div class="container">
        <div class="row mt-3">
            <h1 class="text-center subtitle mt-3">Characters</h1>
        </div>
        <table class="table table-dark mt-3 border-less text-center align-middle">
            <thead>
                <tr>
                    <th class="col-3">Name</th>
                    <th class="col-3">Image</th>
                    <th class="col-3">Birth Date</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $contador = 0;
                    foreach($datos as $character){ ?>
                <tr>
                    <td><?php echo $character["fullName"]?></td>
                    <td><img style="max-width: 100px" src="<?php echo $character["image"]?>" alt="">
                    </td>
                    <td><?php echo $character["birthdate"]?></td>
                </tr>
                <?php } ?>

            </tbody>
        </table>

        <?php
                $next = $page + 1;
                $back = $page - 1;
            ?>
        <?php if($page == 1){?>

        <a class="btn btn-warning col-1" href="harry_potter.php?page=<?php echo $next?>">Next</a>
        <?php } elseif($page == 3){ ?>
        <a class="btn btn-warning col-1" href="harry_potter.php?page=<?php echo $back?>">Back</a>
        <?php }else{ ?>
        <a class="btn btn-warning col-1 float-end" href="harry_potter.php?page=<?php echo $next?>">Next</a>
        <a class="btn btn-warning col-1" href="harry_potter.php?page=<?php echo $back?>">Back</a>
        <?php } ?>

    </div>
    <div class="row bg-black mt-5">
        <p class="text-center text-white align-content-center "><br>© 2025 Miguel Ángel Molina <br></p>
    </div>

</body>

</html>