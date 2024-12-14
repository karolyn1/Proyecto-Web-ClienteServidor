

<!-- <?php
 //NO SE ESTA USANDO, SE CAMBIO POR EL DE ACCIONES_USUARIO
require 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $apellido1 = $_POST['apellido1'];
    $apellido2 = $_POST['apellido2'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $contraseña = password_hash($_POST['password'], PASSWORD_BCRYPT); // Encriptar la contraseña
    $rol = $_POST['rol'];

    // Validar datos
    if (empty($nombre) || empty($apellido1) || empty($apellido2) || empty($correo) || empty($telefono) || empty($contraseña) || empty($rol)) {
        echo "<script>
                alert('Por favor, completa todos los campos.');
                window.location.href = '../gestionUsuarios.php';
              </script>";
        exit;
    }

    // Sentencia SQL para insertar datos en la tabla `usuario`
    $sql = "INSERT INTO usuario (nombre, apellido1, apellido2, correo, telefono, contraseña, rol) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    // Preparar la sentencia
    if ($stmt = $conn->prepare($sql)) {
        // Vincular los parámetros
        $stmt->bind_param("sssssss", $nombre, $apellido1, $apellido2, $correo, $telefono, $contraseña, $rol);

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

        // Cerrar la sentencia
        $stmt->close();
    } else {
        // Si la preparación de la sentencia falla
        echo "<script>
                alert('Error al preparar la consulta.');
                window.location.href = '../gestionUsuarios.php';
              </script>";
    }
}

// Cerrar la conexión
$conn->close();
?> -->