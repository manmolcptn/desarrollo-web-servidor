<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php 
        error_reporting(E_ALL);
        ini_set ("display_errors", 1);
    ?>
</head>
<body>
    <?php
        include("conexion_pdo.php");

        $url = "http://localhost/Ejercicios/06_Bases_de_datos/animes/api/api_estudios.php";
        
        if(isset($_GET["ciudad"]) and !empty($_GET["ciudad"])){
            $ciudad = $_GET["ciudad"];
            $url = $url . "?ciudad=$ciudad";
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

        $estudios = json_decode($respuesta, true);
    ?>
    <table>
        <thead>
            <th>Nombre</th>
            <th>Ciudad</th>
            <th>Año fundación</th>
        </thead>
        <tbody>
            <form action="" method="get">
                <label>Ciudad</label>
                <input type="text" name="ciudad">
                <input type="submit" value="Enviar">
            </form>
            <br><br>
            <?php
                foreach ($estudios as $estudio) {
                    echo "<tr>";
                    echo "<td>" . $estudio["nombre_estudio"] . "</td>";
                    echo "<td>" . $estudio["ciudad"] . "</td>";
                    echo "<td>" . $estudio["anno_fundacion"] . "</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</body>
</html>