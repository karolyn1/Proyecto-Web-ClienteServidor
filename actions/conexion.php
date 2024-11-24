<?php
    $servername = "localhost"; 
    $username = "root";
    $password = "";
    $dbname = "casa_natura";

    try {
        $conexion = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Conexión exitosa.<br>";
    } catch (PDOException $e) {
        echo "Error en la conexión: " . $e->getMessage();
        exit();
    }
?>
