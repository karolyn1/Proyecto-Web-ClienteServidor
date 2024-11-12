<?php

include('conexion.php'); 

if (isset($_POST['registrar'])) {
    $nombre = $_POST['nombre'];
    $primer_apellido = $_POST['primer_apellido'];
    $segundo_apellido = $_POST['segundo_apellido'];
    $provincia = $_POST['provincia'];
    $cantpn = $_POST['cantpn'];
    $distrito = $_POST['distrito'];
    $direccion = $_POST['direccion'];
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];
    $voluntario = isset($_POST['voluntario']) ? 1 : 0;

    $hash_contraseña = password_hash($contraseña, PASSWORD_DEFAULT);

    $query = "INSERT INTO usuarios (nombre, primer_apellido, segundo_apellido, provincia, cantpn, distrito, direccion, correo, contraseña, voluntario) 
              VALUES ('$nombre', '$primer_apellido', '$segundo_apellido', '$provincia', '$cantpn', '$distrito', '$direccion', '$correo', '$hash_contraseña', '$voluntario')";

    if (mysqli_query($conn, $query)) { // Cambia $conexion por $conn
        header("Location: editarperfil.php");
        exit();
    } else {
        echo "<p style='color: red;'>Error al registrar. Intenta nuevamente.</p>";
    }
}
?>
