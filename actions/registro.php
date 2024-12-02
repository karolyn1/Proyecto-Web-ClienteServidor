<?php
include('conexion.php');
session_start();

if(!empty($_POST)){
    // Recibir datos
    $nombre = $_POST['nombre'];
    $primerApellido = $_POST['primer_apellido'];
    $segundoApellido = $_POST['segundo_apellido'];
    $provincia = $_POST['provincia'];
    $canton = $_POST['canton'];
    $distrito = $_POST['distrito'];
    $direccionExacta = $_POST['direccion'];
    $username = $_POST['correo']; 
    $password = $_POST['password'];
    $hash_password = password_hash($password, PASSWORD_BCRYPT);

   
    $sql = "SELECT * FROM `usuario` WHERE `Correo` = '$username'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        echo "<script>
                alert('Lo sentimos. El correo indicado ya existe en nuestra base de datos. Inicia Sesión o registrate con uno nuevo');
                window.location.href = '/Proyecto-Web-ClienteServidor/login.php'; // Redirige si no hay datos
              </script>";
        exit();
    
    } else {
        $sql = "INSERT INTO `usuario`(`Nombre`, `Apellido1`, `Apellido2`, `Correo`, `Password`, `Donador`, `Estado`) 
                VALUES ('$nombre', '$primerApellido', '$segundoApellido', '$username', '$hash_password', 0, 'Activo')";
        
        if($conn->query($sql) === TRUE){
            $idUsuario = $conn->insert_id;  
            $direccion = "INSERT INTO `direccion`(`Provincia`, `Canton`, `Distrito`, `Direccion_Exacta`, `ID_Usuario`) 
                          VALUES ('$provincia', '$canton', '$distrito', '$direccionExacta', $idUsuario)";
            
            if($conn->query($direccion) === TRUE){
                $rol = "INSERT INTO `roles`(`Rol`, `ID_Usuario`) VALUES ('cliente', $idUsuario)";
                if($conn->query($rol) === TRUE){
                header("Location: /Proyecto-Web-ClienteServidor/index.php");
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