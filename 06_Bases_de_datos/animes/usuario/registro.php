<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
        crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
 
        require('../conexion.php');
    ?>
</head>
<body>
    <?php 
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $usuario = $_POST["usuario"];
            $password = $_POST["password"];

            $password_cifrada = password_hash($password, PASSWORD_DEFAULT);
            
            $sql = "INSERT INTO usuarios VALUE ('$usuario', '$password_cifrada')";
            $_conexion -> query($sql);
        }
    ?>
    <div class="container">
        <h1>Formulario de Registro</h1>
        <form action="" method="post" class="col-6" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <input name="usuario" class="form-control" type="text">
            </div>
            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input name="password" class="form-control" type="password">
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value="Registrarse">
            </div>
        </form>
        <h3>Si ya tienes una cuenta, inicia sesión</h3>
        <a href="iniciar_sesion.php" class="btn btn-secondary">Iniciar sesión</a>
    </div>
    <script 
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
        crossorigin="anonymous">
    </script>
</body>

</html>