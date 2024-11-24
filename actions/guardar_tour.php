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

    try {
        $sql = "INSERT INTO tours (descripcion, fecha, hora, precio_boleto, tickets_disponibles) 
                VALUES (:descripcion, :fecha, :hora, :precio_boleto, :tickets_disponibles)";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':fecha', $fecha);
        $stmt->bindParam(':hora', $hora);
        $stmt->bindParam(':precio_boleto', $precio_boleto);
        $stmt->bindParam(':tickets_disponibles', $tickets_disponibles);

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
    } catch (PDOException $e) {
        echo "<script>
                alert('Error: " . $e->getMessage() . "');
                window.location.href = 'gestionTours.php';
              </script>";
    }
}
?>