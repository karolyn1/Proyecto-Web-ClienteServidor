<?php
require 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $apellido1 = $_POST['apellido1'];
    $apellido2 = $_POST['apellido2'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $contraseña = password_hash($_POST['contraseña'], PASSWORD_BCRYPT); // Encriptar la contraseña
    $rol = $_POST['rol'];

    try {
        // Sentencia SQL para insertar datos en la tabla `usuario`
        $sql = "INSERT INTO usuario (nombre, apellido1, apellido2, correo, telefono, contraseña, rol) 
                VALUES (:nombre, :apellido1, :apellido2, :correo, :telefono, :contraseña, :rol)";
        $stmt = $conexion->prepare($sql);

        // Asignar valores a los parámetros
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido1', $apellido1);
        $stmt->bindParam(':apellido2', $apellido2);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':contraseña', $contraseña);
        $stmt->bindParam(':rol', $rol);

        // Ejecutar la sentencia
        if ($stmt->execute()) {
            echo "<script>
                    alert('Usuario registrado correctamente.');
                    window.location.href = '../gestionUsuarios.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Error al registrar el usuario.');
                    window.location.href = '../gestionUsuarios.php';
                  </script>";
        }
    } catch (PDOException $e) {
        echo "<script>
                alert('Error: " . $e->getMessage() . "');
                window.location.href = '../gestionUsuarios.php';
              </script>";
    }
}
?>