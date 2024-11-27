<?php
require 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $descripcion = $_POST['descripcion'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $lugar = $_POST['lugar'];

    // Sentencia SQL para insertar datos en la tabla `eventos`
    $sql = "INSERT INTO eventos (descripcion, fecha, hora, lugar) VALUES (?, ?, ?, ?)";

    // Preparar la sentencia
    if ($stmt = $conn->prepare($sql)) {
        // Vincular los parámetros
        $stmt->bind_param("ssss", $descripcion, $fecha, $hora, $lugar);

        // Ejecutar la sentencia
        if ($stmt->execute()) {
            // Mostrar pop-up y redirigir
            echo "<script>
                    alert('Evento registrado correctamente.');
                    window.location.href = 'gestionEventos.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Error al registrar el evento.');
                    window.location.href = 'gestionEventos.php';
                  </script>";
        }

        // Cerrar la sentencia
        $stmt->close();
    } else {
        // Si la preparación de la sentencia falla
        echo "<script>
                alert('Error al preparar la consulta.');
                window.location.href = 'gestionEventos.php';
              </script>";
    }
}

// Cerrar la conexión
$conn->close();
?>