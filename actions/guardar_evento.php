<?php
require 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $descripcion = $_POST['descripcion'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $lugar = $_POST['lugar'];

    try {
        // Sentencia SQL para insertar datos en la tabla `evento`
        $sql = "INSERT INTO eventos (descripcion, fecha, hora, lugar) 
                VALUES (:descripcion, :fecha, :hora, :lugar)";
        $stmt = $conexion->prepare($sql);

        // Asignar valores a los parámetros
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':fecha', $fecha);
        $stmt->bindParam(':hora', $hora);
        $stmt->bindParam(':lugar', $lugar);

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
    } catch (PDOException $e) {
        echo "<script>
                alert('Error: " . $e->getMessage() . "');
                window.location.href = 'gestionEventos.php';
              </script>";
    }
}
?>