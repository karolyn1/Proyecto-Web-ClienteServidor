<?php
// Conexión a la base de datos
include 'conexion.php';

$id_animal = $_GET['ID_Animal'];

try {
    // Sentencia SQL para seleccionar la imagen
    $sql = "SELECT Imagen FROM animal WHERE ID_Animal = ?";
    
    // Preparar la consulta
    if ($stmt = $conn->prepare($sql)) {
        // Vincular el parámetro
        $stmt->bind_param("i", $id_animal); // 'i' es para integer
        
        // Ejecutar la sentencia
        $stmt->execute();
        
        // Obtener el resultado
        $stmt->bind_result($imagen);
        $stmt->fetch();

        // Verificar si se encontró una imagen
        if ($imagen) {
            // Enviar encabezado apropiado para la imagen
            header("Content-Type: image/jpeg"); // Cambia el MIME según el tipo de imagen almacenada
            echo $imagen; // Mostrar contenido binario
        } else {
            echo "Imagen no encontrada.";
        }

        // Cerrar la sentencia
        $stmt->close();
    } else {
        echo "Error en la consulta.";
    }
} catch (mysqli_sql_exception $e) {
    echo "Error: " . $e->getMessage();
}

// Cerrar la conexión
$conn->close();
?>
