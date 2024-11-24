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

    try {
        // Iniciar una transacción
        $pdo->beginTransaction();

        // Insertar el usuario en la tabla 'usuarios'
        $stmt = $pdo->prepare("INSERT INTO usuarios (nombre, apellido1, apellido2, correo, telefono) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$nombre, $apellido1, $apellido2, $correo, $telefono]);

        // Obtener el ID del último usuario insertado
        $usuario_id = $pdo->lastInsertId();

        // Insertar la donación en la tabla 'donaciones'
        $stmt2 = $pdo->prepare("INSERT INTO donaciones (id_usuario, monto, metodo_pago) VALUES (?, ?, ?)");
        $stmt2->execute([$usuario_id, $monto, $metodo_pago]);

        // Confirmar la transacción
        $pdo->commit();

        // Redirigir con mensaje de éxito
        echo '<div class="alert alert-success">¡Donación exitosa! Gracias por tu apoyo.</div>';
    } catch (Exception $e) {
        // Si ocurre un error, deshacer la transacción
        $pdo->rollBack();
        echo '<div class="alert alert-danger">Hubo un error al procesar la donación: ' . $e->getMessage() . '</div>';
    }
}
?>