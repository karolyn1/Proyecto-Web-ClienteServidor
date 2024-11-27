<?php
require 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $especie = $_POST['especie'];
    $raza = $_POST['raza'];
    $fecha_ingreso = $_POST['fecha_ingreso'];
    $estado_salud = $_POST['estado_salud'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];

    // Sentencia SQL para insertar datos en la tabla `animal`
    $sql = "INSERT INTO animal (nombre, especie, raza, fecha_ingreso, estado_salud, fecha_nacimiento) 
            VALUES (?, ?, ?, ?, ?, ?)";

    // Preparar la sentencia
    if ($stmt = $conn->prepare($sql)) {
        // Vincular los parámetros
        $stmt->bind_param("ssssss", $nombre, $especie, $raza, $fecha_ingreso, $estado_salud, $fecha_nacimiento);

        // Ejecutar la sentencia
        if ($stmt->execute()) {
            // Mostrar pop-up y redirigir
            echo "<script>
                    alert('Animal registrado correctamente.');
                    window.location.href = 'gestionAnimales.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Error al registrar el animal.');
                    window.location.href = 'gestionAnimales.php';
                  </script>";
        }

        // Cerrar la sentencia
        $stmt->close();
    } else {
        // Si la preparación de la sentencia falla
        echo "<script>
                alert('Error al preparar la consulta.');
                window.location.href = 'gestionAnimales.php';
              </script>";
    }
}

// Cerrar la conexión
$conn->close();
?>