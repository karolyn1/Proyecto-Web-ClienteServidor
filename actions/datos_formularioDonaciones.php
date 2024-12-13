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
    $monto = ($_POST['monto'] == 'otra') ? $_POST['otra_cantidad'] : $_POST['monto'];  // Si es otra cantidad, usamos el valor ingresado
    $metodo_pago = $_POST['metodo'];

    // Comprobar si los campos requeridos están vacíos
    if (empty($nombre) || empty($apellido1) || empty($apellido2) || empty($correo) || empty($telefono) || empty($monto) || empty($metodo_pago)) {
        echo '<div class="alert alert-danger">Por favor, complete todos los campos del formulario.</div>';
        exit;
    }

    // Iniciar la transacción
    $conn->begin_transaction();

    try {
        // Insertar el usuario en la tabla 'usuario'
        $stmt = $conn->prepare("INSERT INTO usuario (nombre, apellido1, apellido2, correo, telefono) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssi", $nombre, $apellido1, $apellido2, $correo, $telefono);
        $stmt->execute();

        $stmt->execute();
        if ($stmt->error) {
            echo "Error al insertar usuario: " . $stmt->error;
            exit();
        }

        // Obtener el ID del último usuario insertado
        $usuario_id = $conn->insert_id;

        // Insertar la donación en la tabla 'donaciones'
        $fecha = date('Y-m-d');  // Fecha actual
        $stmt2 = $conn->prepare("INSERT INTO donaciones (id_usuario, monto, fecha, metodo_pago) VALUES (?, ?, ?, ?)");
        $stmt2->bind_param("iiss", $usuario_id, $monto, $fecha, $metodo_pago);
        $stmt2->execute();

        

        $stmt2->execute();
        if ($stmt2->error) {
            echo "Error al insertar donación: " . $stmt2->error;
            exit();
        }


        // Redirigir o mostrar un mensaje de éxito
        try {
            $conn->beginTransaction();
            
            $conn->commit();
        
            // Mostrar mensaje de éxito
            echo '<div class="alert alert-success">¡Gracias por tu donación!</div>';
        
            // Redirigir al formularioDonaciones después de 3 segundos
            header("Refresh: 3; url=formularioDonaciones.php");
            exit;
        
        } catch (Exception $e) {
            // En caso de error, revertir la transacción
            $conn->rollback();
        
            // Mostrar mensaje de error
            echo '<div class="alert alert-danger">Hubo un error al procesar tu donación. Por favor, intenta nuevamente.</div>';
        }
}
?>