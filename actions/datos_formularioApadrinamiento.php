<?php
    // Incluir el archivo de conexión a la base de datos
    include("conexion.php");

    // Función para registrar los errores
    function logError($error) {
        $file = 'errores.log';
        $date = date('Y-m-d H:i:s');
        file_put_contents($file, "[$date] $error\n", FILE_APPEND);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Obtener y validar los datos del formulario
        $nombre = trim($_POST['nombre']);
        $apellido1 = trim($_POST['apellido1']);
        $apellido2 = trim($_POST['apellido2']);
        $correo = trim($_POST['correo']);
        $telefono = trim($_POST['telefono']);
        $monto = floatval($_POST['monto']);
        $metodo_pago = trim($_POST['metodo']);
        $id_animal = intval($_POST['id_animal']);

        if (empty($nombre) || empty($correo) || empty($telefono) || $monto < 50) {
            echo "Error: Por favor, completa todos los campos correctamente.";
            exit;
        }

        // Verificar si el correo ya existe en la tabla `usuario`
        $stmt_verificar = $conn->prepare("SELECT id FROM usuario WHERE correo = ?");
        $stmt_verificar->bind_param("s", $correo);
        $stmt_verificar->execute();
        $stmt_verificar->store_result();

        if ($stmt_verificar->num_rows > 0) {
            echo "Error: Este correo ya está registrado.";
            exit;
        }
        $stmt_verificar->close();

        // Insertar los datos en la tabla `usuario`
        $stmt_usuario = $conn->prepare("INSERT INTO usuario (nombre, apellido1, apellido2, correo, telefono) VALUES (?, ?, ?, ?, ?)");
        $stmt_usuario->bind_param("sssss", $nombre, $apellido1, $apellido2, $correo, $telefono);

        if ($stmt_usuario->execute()) {
            $usuario_id = $conn->insert_id; // Obtener el ID del usuario recién creado

            // Insertar los datos en la tabla `animal_usuario`
            $stmt_animal_usuario = $conn->prepare("INSERT INTO animal_usuario (id_usuario, id_animal, monto, metodo_pago) VALUES (?, ?, ?, ?)");
            $stmt_animal_usuario->bind_param("iids", $usuario_id, $id_animal, $monto, $metodo_pago);

            if ($stmt_animal_usuario->execute()) {
                echo "<script>alert('¡Apadrinamiento exitoso! Gracias por tu contribución.');</script>";
                echo "<script>window.location.href = 'index.php';</script>";
            } else {
                logError($stmt_animal_usuario->error);
                echo "Error al registrar el apadrinamiento: " . $stmt_animal_usuario->error;
            }
            $stmt_animal_usuario->close();
        } else {
            logError($stmt_usuario->error);
            echo "Error al registrar al usuario: " . $stmt_usuario->error;
        }

        $stmt_usuario->close();
        $conn->close(); // Cerrar la conexión
    }
?>