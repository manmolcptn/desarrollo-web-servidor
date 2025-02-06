<?php 
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    
    $_servidor = "localhost"; // ó "127.0.0.1" (loopback)
    $_usuario = "estudiante";
    $_contrasena = "estudiante";
    $_base_de_datos = "animes_bd";

    try {
        $_conexion = new PDO("mysql:host=$_servidor;dbname=$_base_de_datos",
        $_usuario,
        $_contrasena);
        $_conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e){
        die("Conexion fallida: ". $e -> getMessage());
    }
?>