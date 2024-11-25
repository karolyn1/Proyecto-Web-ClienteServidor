<?php
// Conexión a la base de datos
include 'conexion.php';

$id_animal = $_GET['ID_Animal'];

try {
    $sql = "SELECT Imagen FROM animal WHERE ID_Animal = :ID_Animal";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':ID_Animal', $id_animal, PDO::PARAM_INT);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row && $row['Imagen']) {
        // Enviar encabezado apropiado para la imagen
        header("Content-Type: image/jpeg"); // Cambia el MIME según el tipo de imagen almacenada
        echo $row['Imagen']; // Mostrar contenido binario
    } else {
        echo "Imagen no encontrada.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
