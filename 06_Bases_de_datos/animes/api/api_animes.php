<?php 
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );

    header("Content-type: application/json");
    include("conexion_pdo.php");

    $metodo = $_SERVER["REQUEST_METHOD"];
    $entrada = json_decode(file_get_contents("php://input"), true);
    
    switch($metodo){
        case "GET":
            manejarGet($_conexion);
            break;
        case "POST":
            manejarPost($_conexion, $entrada);
            break;
        case "PUT":
            manejarPut($_conexion, $entrada);
            break;
        case "DELETE":
            manejarDelete($_conexion, $entrada);
            break;
        default:
            echo json_encode(["mensaje" => "Petición no válida"]);
    } 

    function manejarGet($_conexion) {
        /* echo json_encode(["metodo" => "get"]); */
        if (isset($_GET["nombre_estudio"])){
            $sql = "SELECT * FROM animes WHERE nombre_estudio = :nombre_estudio";
            $stmt = $_conexion -> prepare($sql);
            $stmt -> execute([
                "nombre_estudio" => $_GET["nombre_estudio"]
            ]); 
        } else{
            $sql = "SELECT * FROM animes";
            //stmt es statement
            $stmt = $_conexion -> prepare($sql);
            $stmt -> execute();
        }
        $resultado = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($resultado); 
    }
    function manejarPost($_conexion, $entrada) {
        /* echo json_encode(["metodo" => "post"]); */
        $sql = "INSERT INTO 
            animes (titulo, nombre_estudio, anno_estreno, num_temporadas, imagen) VALUES 
            (:titulo, :nombre_estudio, :anno_estreno, :num_temporadas, :imagen)";
        
        $stmt = $_conexion -> prepare($sql);
        $stmt -> execute([
            "titulo" => $entrada["titulo"],
            "nombre_estudio" => $entrada["nombre_estudio"],
            "anno_estreno" => $entrada["anno_estreno"],
            "num_temporadas" => $entrada["num_temporadas"],
            "imagen" => $entrada["imagen"]
        ]);
        if($stmt) {
            echo json_encode(["mensaje" => "El anime se ha creado"]);
        } else{
            echo json_encode(["mensaje" => "error al crear el estudio"]);
        }
    }
    function manejarPut($_conexion, $entrada) {
        echo json_encode(["metodo" => "put"]);
    }
    function manejarDelete($_conexion, $entrada) {
        echo json_encode(["metodo" => "delete"]);
    }
?>