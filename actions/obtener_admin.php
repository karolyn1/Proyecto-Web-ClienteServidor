<?php
session_start();
require 'conexion.php'; // Archivo con la conexión a la base de datos

try {
    $id = $_SESSION['usuario_id'];
    // Consulta para obtener los datos del administrador
    $sql = "SELECT u.nombre, u.apellido1, u.apellido2, u.telefono, u.correo 
            FROM usuario u 
            INNER JOIN roles r ON u.ID_Rol = r.ID_Rol 
            WHERE u.ID_Usuario = '$id'";
    
    // Preparar la consulta
    $result = $conn->query($sql);

    // Verificar si se obtuvo algún resultado
    if ($result->num_rows > 0) {
        // Obtener los datos
        $admin = $result->fetch_assoc();
    } else {
        echo "<script>
                alert('No se encontraron datos del administrador.');
                window.location.href = 'gestionUsuarios.php'; // Redirige si no hay datos
              </script>";
        exit();
    }
} catch (mysqli_sql_exception $e) {
    echo "Error al obtener los datos del administrador: " . $e->getMessage();
    exit();
}
?>