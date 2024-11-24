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

    try {
        // Sentencia SQL para insertar datos en la tabla `animal`
        $sql = "INSERT INTO animal (nombre, especie, raza, fecha_ingreso, estado_salud, fecha_nacimiento) 
                VALUES (:nombre, :especie, :raza, :fecha_ingreso, :estado_salud, :fecha_nacimiento)";
        $stmt = $conexion->prepare($sql);

        // Asignar valores a los parámetros
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':especie', $especie);
        $stmt->bindParam(':raza', $raza);
        $stmt->bindParam(':fecha_ingreso', $fecha_ingreso);
        $stmt->bindParam(':estado_salud', $estado_salud);
        $stmt->bindParam(':fecha_nacimiento', $fecha_nacimiento);

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
    } catch (PDOException $e) {
        echo "<script>
                alert('Error: " . $e->getMessage() . "');
                window.location.href = 'gestionAnimales.php';
              </script>";
    }
}
?>