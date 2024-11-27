<?php
// Incluir la conexión a la base de datos
include("conexion.php");

// Comprobar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $apellido1 = $_POST['apellido1'];
    $apellido2 = $_POST['apellido2'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $monto = $_POST['monto'];
    $metodo_pago = $_POST['metodo'];

    // Comprobar si los campos requeridos están vacíos
    if (empty($nombre) || empty($apellido1) || empty($correo) || empty($telefono) || empty($monto) || empty($metodo_pago)) {
        echo '<div class="alert alert-danger">Por favor, complete todos los campos del formulario.</div>';
        exit;
    }

    // Iniciar la transacción
    $conn->begin_transaction();

    try {
        // Insertar el usuario en la tabla 'usuarios'
        $stmt = $conn->prepare("INSERT INTO usuarios (nombre, apellido1, apellido2, correo, telefono) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $nombre, $apellido1, $apellido2, $correo, $telefono);
        $stmt->execute();

        // Obtener el ID del último usuario insertado
        $usuario_id = $conn->insert_id;

        // Insertar la donación en la tabla 'donaciones'
        $stmt2 = $conn->prepare("INSERT INTO donaciones (id_usuario, monto, metodo_pago) VALUES (?, ?, ?)");
        $stmt2->bind_param("ids", $usuario_id, $monto, $metodo_pago);
        $stmt2->execute();

        // Confirmar la transacción
        $conn->commit();

        // Redirigir con mensaje de éxito
        echo '<div class="alert alert-success">¡Donación exitosa! Gracias por tu apoyo.</div>';
    } catch (Exception $e) {
        // Si ocurre un error, deshacer la transacción
        $conn->rollback();
        echo '<div class="alert alert-danger">Hubo un error al procesar la donación: ' . $e->getMessage() . '</div>';
    }
}
?>