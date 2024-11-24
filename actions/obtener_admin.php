<?php
require 'conexion.php'; // Archivo con la conexión a la base de datos

try {
    // Consulta para obtener los datos del administrador
    $sql = "SELECT u.nombre, u.apellido1, u.apellido2, u.telefono, u.correo 
            FROM usuario u 
            INNER JOIN roles r ON u.id_rol = r.id_rol 
            WHERE r.nombre_rol = 'Administrador'";
    $stmt = $conexion->prepare($sql);
    $stmt->execute();

    // Obtener los datos
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$admin) {
        echo "<script>
                alert('No se encontraron datos del administrador.');
                window.location.href = 'gestionUsuarios.php'; // Redirige si no hay datos
              </script>";
        exit();
    }
} catch (PDOException $e) {
    echo "Error al obtener los datos del administrador: " . $e->getMessage();
    exit();
}
?>