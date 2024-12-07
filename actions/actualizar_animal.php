<?php
// Incluir la conexión
include("conexion.php");

// Verificar si se enviaron los datos desde el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recoger datos del formulario
    $id = $_POST['id']; // ID del animal
    $nombre = $_POST['nombre']; // Nombre del animal
    $especie = $_POST['especie']; // Especie del animal
    $raza = $_POST['raza']; // Raza del animal
    $fecha_ingreso = $_POST['fecha_ingreso']; // Fecha de ingreso
    $fecha_nacimiento = $_POST['fecha_nacimiento']; // Fecha de nacimiento
    $estado_salud = $_POST['estado_salud']; // Estado de salud

    // Validar campos obligatorios
    if (empty($nombre) || empty($especie) || empty($fecha_ingreso)) {
        echo "Por favor, complete todos los campos obligatorios.";
        exit;
    }

    // Preparar la consulta de actualización
    $sql = "UPDATE animales 
            SET nombre = ?, especie = ?, raza = ?, fecha_ingreso = ?, fecha_nacimiento = ?, estado_salud = ? 
            WHERE id = ?";
    
    // Usar prepared statements
    if ($stmt = $conn->prepare($sql)) {
        // Vincular parámetros
        $stmt->bind_param(
            "ssssssi", // Definir el tipo de datos de los parámetros: 6 cadenas (s) y un entero (i)
            $nombre,
            $especie,
            $raza,
            $fecha_ingreso,
            $fecha_nacimiento,
            $estado_salud,
            $id
        );

        // Ejecutar la consulta
        if ($stmt->execute()) {
            // Redirigir al listado con un mensaje de éxito
            header("Location: listadoAnimalesDisponibles.php?success=1");
            exit;
        } else {
            echo "Error al actualizar el registro: " . $stmt->error;
        }

        // Cerrar la declaración
        $stmt->close();
    } else {
        echo "Error en la preparación de la consulta: " . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>
