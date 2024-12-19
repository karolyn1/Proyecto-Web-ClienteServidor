<?php
include('conexion.php');
session_start();

if (!empty($_POST)) {
    // Recibir datos
    $nombre = $_POST['nombre'];
    $apellido1 = $_POST['apellido1'];
    $apellido2 = $_POST['apellido2'];
    $provincia = $_POST['provincia'];
    $canton = $_POST['canton'];
    $distrito = $_POST['distrito'];
    $direccionExacta = $_POST['direccion_exacta'];
    $correo = $_POST['correo'];
    $password = $_POST['password'];
    $hash_password = password_hash($password, PASSWORD_BCRYPT);

    // Verificar si el correo ya está registrado
    $sql = "SELECT * FROM `usuario` WHERE `Correo` = '$correo'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<script>
                alert('Lo sentimos. El correo indicado ya existe en nuestra base de datos. Inicia Sesión o Regístrate con uno nuevo');
                window.location.href = '../login.php'; // Redirige al login
              </script>";
        exit();
    } else {
        // Insertar datos en la base de datos
        $sql = "INSERT INTO `usuario`(`Nombre`, `Apellido1`, `Apellido2`, `Correo`, `Password`, `Estado`) 
                VALUES ('$nombre', '$apellido1', '$apellido2', '$correo', '$hash_password', 'Activo')";
        
        if ($conn->query($sql) === TRUE) {
            $idUsuario = $conn->insert_id;  
            $direccion = "INSERT INTO `direccion`(`Provincia`, `Canton`, `Distrito`, `Direccion_Exacta`, `ID_Usuario`) 
                          VALUES ('$provincia', '$canton', '$distrito', '$direccionExacta', $idUsuario)";
            
            if ($conn->query($direccion) === TRUE) {
                $rol = "INSERT INTO `roles`(`Rol`, `ID_Usuario`) VALUES ('cliente', $idUsuario)";
                if ($conn->query($rol) === TRUE) {

                    
                    echo "<script>
                            alert('Bienvenido a Casa Natura. Ya puedes iniciar sesión con tus credenciales.');
                            window.location.href = '../login.php';
                          </script>";
                    exit(); 
                } else {
                    echo "Error al insertar el rol.";
                }
            } else {
                echo "Error al insertar la dirección.";
            }
        } else {
            echo "Error al registrar el usuario.";
        }
    }
}
?>