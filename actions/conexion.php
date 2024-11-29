<?php
    $servername = "localhost"; 
    $username = "root";
    $password = "";
    $dbname = "casanatura";

    try {
        // Crear la conexión con mysqli
        $conn = new mysqli($servername, $username, $password, $dbname);
    
        // Verificar si hubo un error en la conexión
        if ($conn->connect_error) {
            throw new Exception("Error en la conexión: " . $conexion->connect_error);
        }
    
       // echo "Conexión exitosa.<br>";
    } catch (Exception $e) {
        // Capturar errores y mostrar el mensaje
        echo "Error en la conexión: " . $e->getMessage();
        exit();
    }
?>
