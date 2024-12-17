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
        $query = "SELECT a.Nombre, a.Apellido1, a.Apellido2, a.Correo, a.ID_Usuario, b.Rol, a.Password, a.Estado, c.Provincia, c.Canton, c.Distrito, c.Direccion_Exacta
        FROM Usuario a
        INNER JOIN roles b
        ON a.ID_Usuario = b.ID_Usuario
        INNER JOIN direccion c ON a.ID_Usuario = c.ID_Usuario
        WHERE a.Correo = '".$email."'";
    
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);

            // Verificar la contraseña usando password_verify
            if (password_verify($password, $row['Password'])) { // Asegúrate de que el campo en la base de datos es 'Password' (mayúscula 'P')
                // Establecer variables de sesión
                if($row['Estado']=='Inactivo'){
                    header("Location: ../login.php?error=2"); // Redirigir con un mensaje de error específico
                    exit();
                } else {
                    $_SESSION['usuario_id'] = $row['ID_Usuario']; // Usar el campo correcto para el ID
                    $_SESSION['usuario_nombre'] = $row['Nombre'];
                    $_SESSION['usuario_apellido1'] = $row['Apellido1'];
                    $_SESSION['usuario_apellido2'] = $row['Apellido2'];
                    $_SESSION['usuario_telefono'] = $row['Telefono'];
                    $_SESSION['usuario_correo'] = $row['Correo'];
                    $_SESSION['usuario_rol'] = $row['Rol'];
                    $_SESSION['usuario_provincia'] = $row['Provincia'];
                    $_SESSION['usuario_canton'] = $row['Canton'];
                    $_SESSION['usuario_distrito'] = $row['Distrito'];
                    $_SESSION['usuario_direccion'] = $row['Direccion_Exacta'];
        
                    // Redirigir al usuario a la página principal
                    header("Location: ../index.php");
                    exit();
                }
               
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