<?php
require 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $descripcion = $_POST['descripcion'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $precio_boleto = $_POST['precio_boleto'];
    $tickets_disponibles = $_POST['tickets_disponibles'];

    // Validar datos
    if (empty($descripcion) || empty($fecha) || empty($hora) || empty($precio_boleto) || empty($tickets_disponibles)) {
        echo "<script>
                alert('Por favor, completa todos los campos.');
                window.location.href = 'agregarTour.php';
              </script>";
        exit;
    }

    // Sentencia SQL para insertar datos en la tabla `tours`
    $sql = "INSERT INTO tours (descripcion, fecha, hora, precio_boleto, tickets_disponibles) 
            VALUES (?, ?, ?, ?, ?)";

    // Preparar la sentencia
    if ($stmt = $conn->prepare($sql)) {
        // Vincular los parámetros
        $stmt->bind_param("ssssd", $descripcion, $fecha, $hora, $precio_boleto, $tickets_disponibles);

        // Ejecutar la sentencia
        if ($stmt->execute()) {
            echo "<script>
                    alert('Tour registrado correctamente.');
                    window.location.href = 'gestionTours.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Error al registrar el tour.');
                    window.location.href = 'gestionTours.php';
                  </script>";
        }

        // Cerrar la sentencia
        $stmt->close();
    } else {
        // Si la preparación de la sentencia falla
        echo "<script>
                alert('Error al preparar la consulta.');
                window.location.href = 'gestionTours.php';
              </script>";
    }
}

// Cerrar la conexión
$conn->close();
?>