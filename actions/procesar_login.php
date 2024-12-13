<?php
session_start();
include("conexion.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recoger los valores del formulario
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Verificar que ambos campos no estén vacíos
    if (!empty($email) && !empty($password)) {
        // Consultar la base de datos para comprobar el usuario
        $query = "SELECT * FROM usuario WHERE correo = '$email'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            
            // Verificar la contraseña usando password_verify
            if (password_verify($password, $row['Password'])) { // Asegúrate de que el campo en la base de datos es 'Password' (mayúscula 'P')
                // Establecer variables de sesión
                $_SESSION['usuario_id'] = $row['ID_Usuario']; // Usar el campo correcto para el ID
                $_SESSION['usuario_nombre'] = $row['Nombre'];
                $_SESSION['usuario_correo'] = $row['Correo'];

                // Redirigir al usuario a la página principal
                header("Location: ../index.php");
                exit();
            } else {
                // Si la contraseña no coincide
                header("Location: ../login.php?error=1");
                exit();
            }
        } else {
            // Si no se encuentra el usuario
            header("Location: ../login.php?error=1");
            exit();
        }
    } else {
        // Si los campos están vacíos
        header("Location: ../login.php?error=1");
        exit();
    }
} else {
    // Si no es un POST request
    header("Location: ../login.php?error=1");
    exit();
}
?>