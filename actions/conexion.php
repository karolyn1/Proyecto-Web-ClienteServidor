<?php
    $servername = "localhost"; 
    $username = "root";
    $password = "";
    $dbname = "casanatura";

    try {
       
        $conexion = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
        
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
      
    } catch (PDOException $e) {
    
        echo "Error en la conexión: " . $e->getMessage();
        exit();
    }
?>
